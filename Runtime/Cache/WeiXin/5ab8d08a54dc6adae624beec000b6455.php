<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height = device-height, initial-scale=1">
    <title>完善信息</title>

  <link rel="stylesheet" type="text/css" href="/App/Public/css/weui.min.css" />
    <link rel="stylesheet" type="text/css" href="/App/Public/css/user.css" />
    <link rel="stylesheet" type="text/css" href="/App/Public/css/jqueryMobile/css/jquery.mobile.flatui.css" />
    <script type="text/javascript" src="/App/Public/js/jqueryMobile/js/jquery.js"></script>
    <script type="text/javascript" src="/App/Public/js/jqueryMobile/js/jquery.mobile-1.4.0-rc.1.js"></script>
    </head>
<body >

<div data-role="page" id="pageone" data-theme="b">
    <div data-role="header">
        <h1>完善信息</h1>
        <a class="ui-btn-right" id="name"><?php echo ($user->nickname); ?></a>
    </div>

    <div data-role="content">
        <form method="post" action="<?php echo ($_SERVER['PHP_SELF']); ?>/update" data-ajax="false" >
            <div class="ui-field-contain">
            <label for="pragnent_day">怀孕日期：</label>
            <input type="date" name="pragnent_day"  id="pragnent_day" value="<?php echo ($pragnent_day); ?>" placeholder="<?php echo ($pragnent_day); ?>"/>
                <input type="hidden" name="openId" value="<?php echo ($openId); ?>">
            </div>
            <input type="submit" value="提交按钮">
        </form>
    </div>

    <div data-role="footer" id="foot" hidden>

    </div>
</div>

</body>
</html>