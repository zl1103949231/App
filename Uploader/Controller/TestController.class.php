<?php
namespace Uploader\Controller;
use Think\Controller;
class TestController extends Controller {
    public function index(){

        $article = M("Article");
       var_dump($article->max('position'));

     }
}
