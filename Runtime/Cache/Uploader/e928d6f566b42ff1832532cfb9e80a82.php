<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>兰韵科技</title>
	<link rel="stylesheet" type="text/css" href="/App/Public/dist/bootStrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/App/Public/dist/dataTables/dist/css/jquery.dataTables.min.css" />
	<script type="text/javascript" src="/App/Public/js/jqueryMobile/js/jquery.js"></script>
	<script type="text/javascript" src="/App/Public/dist/jsTree/dist/jstree.min.js"></script>
	<script type="text/javascript" src="/App/Public/dist/dataTables/dist/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="/App/Public/dist/dataTables/dist/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/App/Public/dist/jsTree/dist/themes/default/style.css" />
	<style type="text/css">
		body {
			padding-top: 70px
		}

		.showsidebar {
			display: inline;
		}
	</style>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<a class="navbar-brand" href=""> 兰韵科技</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a id="index" class="btn">首页</a></li>
		<li><a id="article" class="btn">文章管理</a></li>
		<li><a id="img" class="btn">图片管理</a></li>
	</ul>
</nav>
<div class="container" id="content">
</div>
</body>
</html>