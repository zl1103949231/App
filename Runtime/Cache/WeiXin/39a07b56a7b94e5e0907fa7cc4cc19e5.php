<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height = device-height, initial-scale=1">
    <title>宫缩记录</title>

    <link rel="stylesheet" type="text/css" href="/App/Public/css/jqueryMobile/css/jquery.mobile.flatui.css" />
    <link rel="stylesheet" type="text/css" href="/App/Public/css/user/record.css" />
    <script type="text/javascript" src="/App/Public/js/jqueryMobile/js/jquery.js"></script>
    <script type="text/javascript" src="/App/Public/js/jqueryMobile/js/jquery.mobile-1.4.0-rc.1.js"></script>
    <script type="text/javascript" src="/App/Public/js/record/record.js"></script>

</head>
<body >
<div data-role="page" id="pageone" data-theme="b">
    <div data-role="header">
        <h1>宫缩记录</h1>
        <a class="ui-btn-right" id="name"><?php echo ($user->nickname); ?></a>
    </div>
    <div data-role="content">

            <ul data-role="listview" data-inset="false">
                <li >
                    <div id="record_img">
                    <img src="<?php echo U('WeiXin/Record/createRecord');?>?id=<?php echo ($id); ?>">
                    </div>
                </li>
                <li>

                        <img src="/App/Public/img/record_count_img.png">
                        <h2 class="record_data" ><?php echo ($count); ?>次</h2>
                        <p class="record_description">本次测量的总宫缩次数</p>

                </li>
                <li>

                        <img src="/App/Public/img/record_record_time_img.png">
                        <h2 class="record_data"><?php echo ($record_time); ?></h2>
                        <p class="record_description">本次测量的开始时间</p>

                </li>
                <li>

                    <img src="/App/Public/img/record_during_img.png">
                    <h2 class="record_data"><?php echo ($during); ?></h2>
                    <p class="record_description">本次测量持续时间.</p>

                </li>
                <li>

                    <img src="/App/Public/img/record_max_count_img.png">
                    <h2 class="record_data"><?php echo ($max_count); ?>次</h2>
                    <p class="record_description">本次测量的20分钟内最大宫缩次数</p>

                </li>
                <li>

                    <img src="/App/Public/img/record_notic_img.png">
                    <h2 class="record_data"><?php echo ($tip); ?></h2>
                    <p class="record_description">根据您的数据我们为您提供一些小建议</p>

                </li>

            </ul>

    </div>

    <div data-role="footer" id="foot" hidden>
    </div>
</div>

</body>
</html>