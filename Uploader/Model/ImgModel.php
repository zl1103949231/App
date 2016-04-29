<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/5
 * Time: 12:30
 */
class  ImgModel extends \Think\Model{
    protected $fields =array('img_id','filename','path','uploadTime');
    protected $pk     = 'img_id';
    protected $tableName = 'img';
    protected $tablePrefix = 'news_';
}