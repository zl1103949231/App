<?php

/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/13
 * Time: 13:01
 */
namespace Uploader\Library\model;

class Article
{
    public $article_id;
    public $title;
    public $description;
    public $img;
    public $content;
    public $source;
    public $forum_id;
    public function __construct($arrticleModel){
        $this->article_id=$arrticleModel['article_id'];
        $this->title=$arrticleModel['title'];
        $this->description=$arrticleModel['description'];
        $this->img=$arrticleModel['img'];
        $this->content=$arrticleModel['content'];
        $this->time=$arrticleModel['time'];
        $this->article_id=$arrticleModel['article_id'];
        $this->article_id=$arrticleModel['article_id'];
    }



}