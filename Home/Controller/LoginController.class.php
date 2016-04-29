<?php
namespace Home\Controller;

use Think\Controller;


class IndexController extends Controller
{
    public function index()
    {
        \Think\Log::record('测试日志信息，这是警告级别','WARN');
    echo "hellow Home";

    }
    public function footer(){
        $this->display();
    }
    public function header(){
        $this->display();
    }
}