<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/5
 * Time: 12:30
 */
class  DeviceModel extends \Think\Model{
    protected $fields =array('device_id');
    protected $pk     = 'device_id';
    protected $tableName = 'device';
    protected $tablePrefix = 'cma_';
}