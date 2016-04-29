<?php

/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/13
 * Time: 13:01
 */
namespace WeiXin\Library\Util;

class RecordUtil
{
    public function __construct()
    {

    }

    public  function getRecentRecord($msg,$wechat){

        $user_device = M('UserDevice');
        $openId = $msg->FromUserName;
        $list = $user_device->where("openId='$openId'")->select();
        // echo var_dump($list);
        if ($list != null) {
            $articles = array();
            $devices = array();
            foreach ($list as $result) {
                $device = $result["deviceid"];
                //   echo $device;
                array_push($devices, $device);
                @error_log($device, 0);
            }
            // echo var_dump($devices);
            @error_log("设备数组大小：" . count($devices), 0);
            $record = M('Record');
            $map['deviceId'] = array('in', $devices);
            $sql = $record->where($map)->fetchSql(true)->order('record_time desc')->limit(5)->select();
            @error_log($sql, 0);
            $records = $record->where($map)->order('record_time desc')->limit(5)->select();

            if($records!=null){
                foreach($records as $result){
                    array_push($articles,array(
                        'title' => strval($result["id"]),								//可选
                        'description' =>  "测量时间".strval($result["record_time"]),						//可选
                        'picurl' => "http://img4.duitang.com/uploads/blog/201307/10/20130710134308_zZ8hS.thumb.600_0.jpeg",	//可选
                        'url' => $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'/Record/showRecord?id='.$result["id"]				//可选
                    ));
                }
                //$wechat->reply("找到数据".strval(count($records)));
                $wechat->reply(array('type' => 'news','articles' => $articles));
            }else{
                $wechat->reply("没有找到数据");
            }
        }else{
            $wechat->reply("你的账号没有绑定设备，请在菜单：“服务-》绑定设备”中绑定");
        }


    }
}