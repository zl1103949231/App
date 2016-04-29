<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, height = device-height, initial-scale=1">
	<title>宫缩记录</title>

	<link rel="stylesheet" type="text/css" href="/App/Public/css/jqueryMobile/css/jquery.mobile.flatui.css" />
	<link rel="stylesheet" type="text/css" href="/App/Public/css/user/record_getHistroy.css" />
	<script type="text/javascript" src="/App/Public/js/jqueryMobile/js/jquery.js"></script>
	<script type="text/javascript" src="/App/Public/js/jqueryMobile/js/jquery.mobile-1.4.0-rc.1.js"></script>
	<script type="text/javascript" src="/App/Public/js/record/record_banner_show.js"></script>

</head>
<body >
<div data-role="page" id="pageone" data-theme="b">
	<div data-role="header">
		<h1>宫缩记录</h1>
		<a class="ui-btn-right" id="name"><?php echo ($user->nickname); ?></a>
		<div style="text-align: center ">
		<canvas  id="banner" width="240px" height="180px" style="">
		</canvas>
		</div>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-inset="false">
		<li >
		<?php if(is_array($records)): foreach($records as $key=>$record): ?><a  href="<?php echo U('WeiXin/Record/showRecord');?>?id=<?php echo ($record["id"]); ?>">
		<img src="/App/Public/img/record_item.png">
		<h2 class="record_data" ><?php echo ($record["cm_count"]); ?>次</h2>
		<p class="record_description">测量时间：<?php echo ($record["record_time"]); ?></p>
		</a><?php endforeach; endif; ?>

		</li>
		</ul>
	</div>

	<div data-role="footer" id="foot" hidden>
	</div>
</div>

</body>
</html>