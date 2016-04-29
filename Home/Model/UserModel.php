<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/5
 * Time: 12:30
 */
class  UserModel extends \Think\Model{
    protected $fields =array('user_id','login_name','password');
    protected $pk     = 'user_id';
    protected $tableName = 'user';
    protected $tablePrefix = 'home_';
}