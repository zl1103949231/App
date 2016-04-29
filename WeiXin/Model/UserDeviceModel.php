<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/5
 * Time: 12:30
 */
class  UserDeviceModel extends \Think\Model{
    protected $fields =array('openId','deviceId');
    protected $tableName = 'user_device';
    protected $tablePrefix = 'cma_';
}