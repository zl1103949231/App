<?php

/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/13
 * Time: 13:01
 */
namespace WeiXin\Library\Util;

class DeviceUtil
{
    public function __construct()
    {

    }
    public  function bindDevice($msg,$wechat){
	@error_log('bindDevice..in',0);
        $user = M('User');
         try{
            $data= $user->where("id='$msg->FromUserName'")->find();
             @error_log('搜索到的用户：：'.strval($data),0);
            if(!$data||$data==null){
                @error_log('新用户添加。。。',0);
                $user->id=strval($msg->FromUserName);
                $user->add(); 
            }else{
                @error_log('用户已创建，不重复创建',0);
            }

        } catch (Exception $e) {
        
        }
        $device=M('Device');
        $bind_data=$msg->ScanCodeInfo->ScanResult;
        $list=$device->where("device_id='$bind_data'")->find();
        if(!$list){
            $wechat->reply('非法设备');
            @error_log('没有找到',0);
        }else{
            $user_device=M('UserDevice');
            $id=$msg->FromUserName;
            $result=$user_device->where("openId='$id' And deviceId='$bind_data'")->find();
            if($result){
                $wechat->reply('重复绑定');
            }else{

                try{
                    $addDevice=M('UserDevice');
                    @error_log('插入id'.$msg->FromUserName,0);
                    @error_log('插入device_id'.$list['device_id'],0);

                    $data["openId"]=strval($msg->FromUserName);
                    $data["deviceId"] =$list['device_id'];
                    $addDevice->add($data);
                    $wechat->reply('绑定成功');
                }catch(Exception $e){
                    $wechat->reply('绑定失败');
                }
            }



        }
    }

}