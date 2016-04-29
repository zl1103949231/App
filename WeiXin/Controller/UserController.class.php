<?php
namespace WeiXin\Controller;
use Think\Controller;
class UserController extends Controller
{

public  function index(){
  $this->getAuth();

    $this->display();
}
  public function update(){
     @error_log('update  in..',0);
   $pragnent_day=$_POST['pragnent_day'];
    $openId=$_POST['openId'];
	  $post=file_get_contents('php://input', 'r');
    @error_log('post域：：'.$post,0);
    @error_log('$pragnent_day::'.$pragnent_day,0);
    @error_log('$openId::'.$openId,0);
    if(!empty($pragnent_day)){
      $date = date("Y-m-d",strtotime($pragnent_day));
      $user=M('User');
      $user->pragnent_day=$date;
      $user->where("id='$openId'")->save();
	    @error_log('怀孕日期修改成功',0);
      $this->assign('pragnent_day',$date);
      $this->assign('openId',$openId);
      $this->assign('date',$pragnent_day);
    }else{
      $error="预产期为空" ;
    }
    $this->assign('erro_log',$error);

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
    @error_log('getAUTH:::$openId::'.$openId,0);
  $user=M('user');
  $user->where("id='$openId'")->find();
  $this->assign('pragnent_day',$user->pragnent_day);
}

}
