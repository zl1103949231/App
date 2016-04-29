<?php

/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2016/3/13
 * Time: 13:01
 */
namespace WeiXin\Library\Util;


class MenuUtil
{

    public function __construct()
    {

    }
    public function createMenu($api){
        $menu="{
     \"button\":[
     {
          \"name\":\"查询\",
          \"sub_button\":[
            {
               \"type\":\"click\",
               \"name\":\"最近数据\",
               \"key\":\"DATA_RECENT\"
            },
            {
               \"type\":\"view\",
               \"name\":\"历史数据\",
               \"url\":\"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2d4261125d94f08f&redirect_uri=http://".C('CMA_SERVER_HOST')."/App/index.php/WeiXin/Record/getHistory&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect\"
             }]
      },
      {
          \"name\":\"资讯\",
          \"sub_button\":[
            {
               \"type\":\"click\",
               \"name\":\"每日提醒\",
               \"key\":\"NEWS_DAY\"
            },
            {
               \"type\":\"click\",
               \"name\":\"孕检提醒\",
               \"key\":\"NEWS_CHECK\"
            },
            {
               \"type\":\"click\",
               \"name\":\"健康资讯\",
               \"key\":\"NEWS_HEAHTH\"
            }]
      },
      {
           \"name\":\"服务\",
           \"sub_button\":[
           {
               \"type\":\"view\",
               \"name\":\"完善信息\",
                \"url\":\"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2d4261125d94f08f&redirect_uri=http://".C('CMA_SERVER_HOST')."/App/index.php/WeiXin/User&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect\"
            },
           {
               \"type\":\"scancode_waitmsg\",
               \"name\":\"绑定设备\",
                \"key\":\"BIND_DEVICE\"
            },
            {
               \"type\":\"click\",
               \"name\":\"了解新产品\",
                \"key\":\"NEW_PRODUCTS\"
            },
            {
               \"type\":\"view\",
               \"name\":\"关于我们\",
               \"url\":\"http://v.qq.com/\"
            },
            {
               \"type\":\"view\",
               \"name\":\"产品帮助\",
                \"url\":\"http://www.baidu.com/\"
            }]
       }
      ]
 }";

        $api->create_menu($menu,FALSE);
        @error_log('创建了菜单',0);
		  @error_log('access_token::'.S('wechat_token'),0);

    }

}