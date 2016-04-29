<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/5
 * Time: 12:30
 */
class  ForumModel extends \Think\Model{
    protected $fields =array('forum_id','name','count','updateTime');
    protected $pk     = 'forum_id';
    protected $tableName = 'forum';
    protected $tablePrefix = 'news_';
}