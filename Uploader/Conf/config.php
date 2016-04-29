<?php
return array(
	//'配置项'=>'配置值'

    'DB_TYPE'      =>  'mysql',     // 数据库类型
    'DB_HOST'      =>  'localhost',     // 服务器地址
    'DB_NAME'      =>  'public_news',     // 数据库名
    'DB_USER'      =>  'root',     // 用户名
    'DB_PWD'       =>  'toor',     // 密码
    'DB_PORT'      =>  '3306',     // 端口
    'DB_PREFIX'    =>  'news_',     // 数据库表前缀
    'DB_CHARSET'   =>  'utf8', // 数据库的编码 默认为utf8


    'LOAD_EXT_CONFIG' => 'news_config',

    'AUTOLOAD_NAMESPACE' => array(
    'Lib'     => APP_PATH.'Uploader/Library'
    ),
    'LAYOUT_ON'=>true,
   'LAYOUT_NAME'=>'layout'
);