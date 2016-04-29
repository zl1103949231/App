<?php
namespace Uploader\Controller;
use Think\Controller;
class BlogController extends Controller {

    public function forumManege(){
        $value = session('user');
        if(!empty($value)){

            $this->assign("session",$value);
        }else{
            redirect('/Home/Index/login', 3, '登录超时，页面跳转中...');
        }
        $forum=M('Forum');
        $result=$forum->select();
        //var_dump($result);
        $this->assign("forumList",$result);
        $this->display('forumManege');

    }

}
