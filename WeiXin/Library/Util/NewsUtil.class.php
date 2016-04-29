<?php

/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/13
 * Time: 13:01
 */
namespace WeiXin\Library\Util;

class NewsUtil
{
    public function __construct()
    {

    }
    public function replayHeahtyNews(){
        $ch = curl_init();
        if(S('last_news')){
            $url = 'http://www.tngou.net/api/lore/news?classify=6&rows=5&id='.S('last_news');
        }else{
            $url = 'http://www.tngou.net/api/lore/news?classify=6&rows=5';
        }

        $header = array(
            'apikey: '.C('BAIDU_APISTORE_APP_KEY')
        );
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        $obj=json_decode($res);
       // var_dump(json_decode($res));
        $respose=array();
        $list=$obj->list;
       //var_dump($list);
        foreach($list as $item){
            $title=$item->title;
            $description=$item->description;
            $url=$_SERVER['HTTP_HOST']."/App/index.php/WeiXin/News/showNews?id=".$item->id;

            $img=$item->img;
            if($this->isdefault($img)){
                array_push($respose,array(
                    'title' => $title,								//可选
                    'description' =>  $description,						//可选
                    'url' => $url
                ));
            }else{
                array_push($respose,array(
                    'title' => $title,								//可选
                    'description' =>  $description,						//可选
                    'picurl' => C('TIAN_GOU_IMG_SERVER').$img,	//可选
                    'url' =>$url
                ));
            };

        }
        S('last_news',$list[count($list)-1]->id);
        //echo  S('last_news');
       //var_dump($respose);
        return $respose;

    }
public  function showNews($id){
    $ch = curl_init();
    $url = 'http://apis.baidu.com/tngou/lore/show?id='.$id;
    $header = array(
        'apikey: '.C('BAIDU_APISTORE_APP_KEY')
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);
    $news=json_decode($res);
    if($this->isdefault($news->img)){
        $news->img=null;

    }else{
        $news->img= C('TIAN_GOU_IMG_SERVER').$news->img;
    }
    return $news;


}
    private  function isdefault($str){
        $default='*default.*';
       return preg_match($default,$str);
    }

    public function getNew_Check($msg,$wechat){
        $User=M('User');
        $openId=$msg->FromUserName;
        $user= $User->where("id='$openId'")->find();

        if(!$user){
            $wechat->reply("请先绑定设备");
        }
        $pragnent_day=$user['pragnent_day'];
		@error_log('pragnent_day:'.$pragnent_day,0);
        if($pragnent_day){
            $pragnent_day_time=strtotime($pragnent_day);
        }else{
           $wechat->reply("请先完善信息");
        }

        $days=ceil((time()-$pragnent_day_time)/3600/24) ;
        $week=ceil($days/7);
        $position=0;
        if($week<=11){
            $position=1;
        }elseif(11<$week&&$week<=12){
            $position=2;
        }elseif(12<$week&&$week<=16){
            $position=3;
        }elseif(20<$week&&$week<=24){
            $position=5;
        }elseif(24<$week&&$week<=28){
            $position=6;
        }elseif(28<$week&&$week<=32){
            $position=7;
        }elseif(22<$week&&$week<=35){
            $position=8;
        } elseif(35<$week&&$week<=36){
            $position=9;
        }elseif(36<$week&&$week<=37){
            $position=10;
        }elseif(37<$week&&$week<=42){
            $position=11;
        }elseif($week>42){
            $position=11;
        }
        $ch = curl_init();
        $url =C('CMA_NEWS_SERVER')."?forum_id=". C('CMA_NEWS_CHECK_FORUM')."&&position=".$position;

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        $result=json_decode($res);
        if($result->status=='200') {
            $article=$result->data;
            var_dump($article);
            $contentUrl=$_SERVER['HTTP_HOST']."/App/index.php/WeiXin/News/showCheck_News?id=".$article->article_id;
            $respose=array(
                'title' => $article->title,								//可选
                'description' =>  $article->description,						//可选
                'picurl' =>$article->img,	//可选
                'url' => $contentUrl
                );
            return $respose;
        }else{
            return FALSE;
        }
    }
    public  function showCheck_News($id){
        $ch = curl_init();
        $url =C('CMA_NEWS_SERVER_ARTICLE')."?id=".$id ;
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        $result=json_decode($res);
        if($result->status=='200') {
            $article=$result->data;
            return $article;

        }else{
            return FALSE;
        }
    }
}