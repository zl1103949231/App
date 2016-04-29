<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<title>Title</title>
</head>
<body>

<form action="<?php echo U('add');?>"
        method="post" class="form-horizontal" id="form_acticle">
	<input type="hidden" name="forum_id" value="<?php echo ($forum_id); ?>"/>
	<input type="hidden" name="article_id" value="<?php echo ($article_id); ?>"/>
	<div class=" row form-group">
		<label for="title" class="col-md-2 control-label" value="标题:">标题：</label>


		<div class="col-md-10">
			<input type="text" name="title" class="form-control" id="title"
			       placeholder="文章标题" value="<?php echo ($article->title); ?>" required/>
		</div>
	</div>
	<div class=" row form-group">
		<label  for="description" class="col-md-2 control-label" value="文章简述:">文章简述:</label>
		<div class="col-md-10">
			<input type="text" name="description" class="form-control"
			       id="description" placeholder="文章简述" value="<?php echo ($article->description); ?>"  required/>
		</div>
	</div>
	<div class="row form-group">
		<label  for="img" class="col-md-2 control-label" >封面图片</label>
		<div class="col-md-10">
		<input type="url" id="img" name="img" class="form-control" value="<?php echo ($article->img); ?>" placeholder="封面图片链接" required>
		</div>
	</div>
	<div class="row form-group">
		<label  for="source" class="col-md-2 control-label" >文章来源</label>
		<div class="col-md-10">
			<input type="text" id="source" name="source" class="form-control" value="<?php echo ($article->source); ?>" placeholder="文章来源" required >
		</div>
	</div>
	<div class="row form-group">
		<lable for="content" class="col-md-2 control-label">
			正文:
		</lable>
		<div class="col-md-10">
			<textarea id="content" name="content" form="form_acticle"   value="" class="col-md-12" rows="20" required><?php echo ($article->content); ?>
			</textarea>
		</div>
	</div>
	<div class="row  form-group">
		<button id="submitBt"
		        class="btn btn-success col-md-3 col-md-offset-4">
			发布
		</button>
	</div>
</form>

</body>
</html>