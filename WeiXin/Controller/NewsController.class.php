<?php
namespace WeiXin\Controller;
use Think\Controller;
use WeiXin\Library\Util\NewsUtil;

class NewsController extends Controller
{
    public  function showNews(){
        $news=new NewsUtil();
        $id=$_GET['id'];
        $item= $news->showNews($id);
        $this->assign("item",$item);
        //var_dump($item);
        $this->display();
    }
    public function showCheck_News(){
        $news=new NewsUtil();
        $id=$_GET['id'];
        $item= $news->showCheck_News($id);
        if($item){
            $this->assign("item",$item);
           $this->display();
        }

       // var_dump($item);

    }
}