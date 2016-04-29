<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/5
 * Time: 12:30
 */
class  ArticleModel extends \Think\Model{
    protected $fields =array('article_id','title','description','img','content','time','source','position','forum_id');
    protected $pk     = 'article_id';
    protected $tableName = 'article';
    protected $tablePrefix = 'news_';
}