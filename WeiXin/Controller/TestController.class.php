<?php
namespace WeiXin\Controller;
use Think\Controller;
use WeiXin\Library\Util\NewsUtil;

class TestController extends Controller
{
    public function getHealthyNews(){
     echo  C('BAIDU_APISTORE_APP_KEY');

    }
    public  function getNews_Check(){
        $new=new NewsUtil();
        $msg='823e88d2-9970-4dff';
        $new->getNew_Check();
    }

}