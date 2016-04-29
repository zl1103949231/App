<?php
namespace WeiXin\Controller;

use Think\Controller;
const Graph_Width = 360;
class RecordController extends Controller
{

    public function showRecord()
    {
        $id = $_GET['id'];
       if(empty($id)){
           exit("param error");
       }
        $record = M('Record');
        $result = $record->where("id='$id'")->find();
       if($result===null){
           exit("can't find record");
       }elseif($result===false){
           exit("param invaild");
       }

        $during = $result['during_time'];
        $hour = intval($during / 3600);
        $min = intval($during / 60) - $hour * 60;
        $second = intval($during - $hour * 3600 - $min * 60);
        $duringStr = "";
        if ($hour === 0) {
            if ($min === 0) {
                $duringStr = $duringStr . $second . "秒";
            } else {
                $duringStr = $duringStr . $min . "分钟" . $second . "秒";
            }
        } else {
            $duringStr = $duringStr . $hour . "小时" . $min . "分钟" . $second . "秒";

        }

        $max_count= $result['max_count'];
        if ($max_count<=0) {
            $tip="没有检查到宫缩";
            $staus="notic";
        }else if($max_count<=5){
            $tip="健康状态不错，请继续保持";
            $staus="success";
        }else {
            $tip="宫缩有过频倾向，请注意复查";
            $staus="warning";
        }
        $this->assign("id", $result['id']);
        $this->assign("count", $result['cm_count']);
        $this->assign("max_count", $result['max_count']);
        $this->assign("status", $staus);
        $this->assign("tip", $tip);
        $this->assign("record_time", date("Y年m月d日 h:i:s ", $result['record_time']));
        $this->assign("during", $duringStr);
        $this->display();
    }

    public function createRecord()
    {

        $id = $_GET['id'];
        if(empty($id)){
            exit("param error");
        }
        $record = M('Record');
        $result = $record->where("id='$id'")->find();

        if($result===null){
            exit("can't find record");
        }elseif($result===false){
            exit("param invaild");
        }
        $record_content = $result['content'];
        $record_content = trim($record_content);
        $result = json_decode($record_content);
        $len = count($result);
        $scale = intval($len / Graph_Width);
        $count = intval($len / $scale);

        $arr = array();
        $record_time = $result['record_time'];
        $xarr = array();
        for ($i = 0; $i < $count; $i++) {
            $index = $i * $scale;
            array_push($arr, $result[$index]);

            $min = intval($index / 60);
            $second = intval($index % 60);
            array_push($xarr, $min . ':' . $second);


        }
        //echo var_dump($arr);
        // 引入必要的文件，格式：vendor('Jpgraph文件夹.类名')
        vendor('Jpgraph.jpgraph');   //必须的
        vendor('Jpgraph.jpgraph_line');   //依具体情况引入
        $data1y = $arr;
        // 新建图表
        $width=Graph_Width;
        $height=$width*0.8;
        $graph = new \Graph($width, $height);
        $graph->SetMargin(50, 50, 50, 50);
        $graph->SetScale("textlin");
        $title = iconv("UTF-8", "GB2312//IGNORE", '宫缩记录');
        $graph->title->SetFont(FF_SIMSUN, FS_BOLD); // 设置中文字体
        $graph->title->Set($title);

        $subtitle = iconv("UTF-8", "GB2312//IGNORE", date("Y年m月d日", $record_time));
        $graph->subtitle->SetFont(FF_SIMSUN, FS_BOLD); // 设置中文字体
        $graph->subtitle->Set($subtitle);

        //y轴
        $graph->yaxis->SetPos("min");
        $ytitle = iconv("UTF-8", "GB2312//IGNORE", "宫缩强度");
        $graph->yaxis->title->SetFont(FF_SIMSUN, FS_BOLD); // 设置中文字体
        $graph->yaxis->title->Set($ytitle);


        // 定位 x 轴标注垂直位置应在最下方
        $graph->xaxis->SetPos("min");
        //$graph->xgrid->Show();
        $graph->xaxis->title->SetFont(FF_SIMSUN, FS_BOLD); // 设置中文字体
        $xtitle = iconv("UTF-8", "GB2312//IGNORE", "时间");
        $graph->xaxis->title->Set($xtitle);
        $graph->xaxis->SetTickLabels($xarr);
        $graph->xaxis->SetTextLabelInterval(intval($width/6));

        // Create the linear plot
        $lineplot = new \LinePlot($data1y);
        // Add the plot to the graph
        $graph->Add($lineplot);
        // Display the graph
        $graph->Stroke();
    }
    public function getHistory()
    {
        $openId = $this->getAuth();
       // echo $openId;
       // echo "gethistory";
       // $openId="823e88d2-9970-4dff";
        $user_device = M('UserDevice');
        $list = $user_device->where("openId='$openId'")->select();
      //  echo var_dump($list);
        if ($list != null) {
            $articles = array();
            $devices = array();
            foreach ($list as $result) {
                $device = $result["deviceid"];
               // echo $device;
                array_push($devices, $device);
                @error_log($device, 0);
            }
           // echo var_dump($devices);
            @error_log("设备数组大小：" . count($devices), 0);
            $record = M('Record');
            $map['deviceId'] = array('in', $devices);
            $sql = $record->where($map)->fetchSql(true)->order('record_time desc')->select();
            @error_log($sql, 0);
            $records = $record->where($map)->field('id,deviceId,cm_count,max_count, record_time,point_second,during_time,modify_value,upload_time')->order('record_time desc')->select();

        }
        $this->assign("records",$records);
        //echo count($records);
        $this->display();
    }
    private function getAuth(){
        $code=$_REQUEST['code'];
        $ch = curl_init();
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".C('WEIXIN_APP_ID')."&secret=".C('WEIXIN_APP_SECRET')."&code=$code&grant_type=authorization_code";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output1 = curl_exec($ch);
        $result1=json_decode($output1);
        curl_close($ch);
        $openId=$result1->openid;
        $access_token=$result1->access_token;
        $ch = curl_init();
        $url="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openId&lang=zh_CN";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output2 = curl_exec($ch);
        $result2=json_decode($output2);
        curl_close($ch);
        //封装user 和openId信息
        $this->assign('user',$result2);
        $this->assign('openId',$openId);
        $user=M('user');
        $user->where("id='$openId'")->find();
        $this->assign('except_birthday',$user->except_birthday);
        return  $openId;
    }
}
