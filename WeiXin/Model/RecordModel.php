<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/5
 * Time: 12:30
 */
class  RecordModel extends \Think\Model{
    protected $fields =array('id','deviceId','cm_count','max_count','record_time','point_second','during_time','content','modify_value','upload_time');
    protected $pk     = 'id';
    protected $tableName = 'record';
    protected $tablePrefix = 'cma_';
}