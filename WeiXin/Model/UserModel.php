<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/5
 * Time: 12:30
 */
class  UserModel extends \Think\Model{
    protected $fields =array('id','pragnent_day');
    protected $pk     = 'id';
    protected $tableName = 'user';
    protected $tablePrefix = 'cma_';
}