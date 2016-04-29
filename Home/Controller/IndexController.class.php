<?php
namespace Home\Controller;

use Think\Controller;


class IndexController extends Controller
{

    public function home()
    {
        $value = session('user');
        if(!empty($value)){
            $this->assign("session",$value);
        }else{
            $this->redirect('/Home/Index/login', 3, '登录超时，页面跳转中...');
        }
        $this->display('home');
    }
    public function login(){
        //先检查是否有session 若session验证成功则进入后台
        $value = session('user');
        if(!empty($value)){
           // $this->success('','home',0);
            $this->assign("session",$value);
            $this->display('home');
        }else{
            //若验证不成功检查表单域若存在帐户名密码者数据库验证登录，保存session
           $loginname=$_POST['username'];
            $password=$_POST['password'];
            $user=M('User');
            $condition['login_name'] = "$loginname";
            $condition['password'] =  "$password";
            $condition['_logic'] = 'AND';
            $result=$user->where($condition)->find();
            if($result){
                session('user',$result);  //设置session
                $this->success('登录成功','home',0);
                $this->assign("session",$result);
            }else{
                //若不存在或验证失败者返回login
                if(empty($loginname)||empty($password)){
                    layout(false);
                    $this->display();
                }else{
                    layout(false);
                    $this->error("登录失败,用户名或密码错误");
                }

            }

        }
   }
    public function logout(){
        $value = session('user');
        if(!empty($value)){
            session('user',null); // 删除user
            $this->success('注销成功','login',3);
        }else{
            $this->success('注销成功','login',3);
        }
    }

}