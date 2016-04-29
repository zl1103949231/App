<?php
namespace WeiXin\Controller;

use Gaoming13\WechatPhpSdk\Api;
use Gaoming13\WechatPhpSdk\Wechat;
use Think\Controller;
use Think\Exception;
use Think\Log;
use WeiXin\Library\Util\DeviceUtil;
use WeiXin\Library\Util\MenuUtil;
use WeiXin\Library\Util\NewsUtil;
use WeiXin\Library\Util\RecordUtil;

class IndexController extends Controller
{



    public  function index(){
        //菜单工具类
        $menuUtil=new MenuUtil();
        //设备管理工具类
        $deviceUtil=new DeviceUtil();
        //资讯工具类
        $newUtil= new NewsUtil();
        //宫缩记录工具类
        $recordUtil=new RecordUtil();
        // wechat模块 - 处理用户发送的消息和回复消息
        $wechat = new Wechat(array(
            'appId' => C('WEIXIN_APP_ID'),
            'token' => C('WEIXIN_APP_TOKEN'),
            'encodingAESKey' =>  C('WEIXIN_APP_ENCODE') //可选
        ));
        //$wechat->accessAuth();

        // api模块 - 包含各种系统主动发起的功能
        $api = new Api(
            array(
                'appId' => C('WEIXIN_APP_ID'),
                'appSecret' => C('WEIXIN_APP_SECRET'),
                'get_access_token' => function () {
                    // 用户需要自己实现access_token的返回
					  @error_log("access_token::",S('wechat_token'));
                    return S('wechat_token');
                },
                'save_access_token' => function ($access_token) {
                    // 用户需要自己实现access_token的保存
					 @error_log("access_token::",$access_token);
                    S('wechat_token', $access_token);
                },
                'get_menu_diy' => function(){
                    return menu ;
                 }
            )
        );

       // $menuUtil->createMenu($api);

        $msg= $wechat->serve();
        switch($msg->MsgType){
            case "text":
                $wechat->reply("你好");
                break;
            case "event":
                switch($msg->Event){
                    case 'CLICK':
                      switch($msg->EventKey){
                          case 'DATA_RECENT':
                              $recordUtil->getRecentRecord($msg,$wechat);
                              break;
                          case 'DATA_HISTORY':
                              $wechat->reply("历史数据");
                              break;
                          case 'NEWS_DAY':
                              $wechat->reply("每日提醒");
                              break;
                          case 'NEWS_CHECK':
                              //$wechat->reply("孕检提醒");
                              @error_log('孕检提醒:'."开始",0);
                              $article=$newUtil->getNew_Check($msg,$wechat);
                              @error_log('$article:'.strval($article),0);
                              if($article){
                                  $wechat->reply(array('type' => 'news','articles' => array($article)));
                              }else{
                                  $wechat->reply("功能维护中。。") ;
                              }
                              break;
                          case 'NEWS_HEAHTH':
                            //  $wechat->reply("健康资讯");
                              $articles=$newUtil->replayHeahtyNews();
                              $wechat->reply(array('type' => 'news','articles' => $articles));
                              break;

                          case 'NEW_PRODUCTS':
                              $wechat->reply("了解新产品");
                              break;

                      }
                        break;
                    case 'scancode_waitmsg':
                    switch($msg->EventKey){
                        case 'BIND_DEVICE':
						@error_log('$BIND_DEVICE:',0);
                            $deviceUtil->bindDevice($msg,$wechat);
                            break;
                    }
                    break;


                }


                break;
        }


    }



    public function testURL(){
        echo "testURL";
    }



}