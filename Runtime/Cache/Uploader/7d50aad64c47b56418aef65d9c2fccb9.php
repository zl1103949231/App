<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->

    <link rel="stylesheet" type="text/css" href="/App/Public/dist/dash-ui/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/App/Public/dist/bootStrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/App/Public/dist/dash-ui/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="/App/Public/dist/dash-ui/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/App/Public/dist/dash-ui/css/style-responsive.css" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <link rel="stylesheet" type="text/css" href="/App/Public/dist/dash-ui/css/ie.css" />
    <![endif]-->

    <!--[if IE 9]>
    <link rel="stylesheet" type="text/css" href="/App/Public/dist/dash-ui/css/ie9.css" />
    <![endif]-->

    <!-- start: Favicon -->

    
    <!-- end: Favicon -->

    <!-- start: JavaScript-->

    <script type="text/javascript" src="/App/Public/dist/dash-ui/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/App/Public/dist/dash-ui/js/bootstrap.min.js"></script>


    <!-- end: JavaScript-->


</head>

<body>
<!-- start: Header -->
<div class="navbar" style="border-radius:0;margin-bottom:0;border:0" >
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo U('Home/index/index');?>"><span>Metro</span></a>

            <!-- start: Header Menu -->
            <div class="nav-no-collapse header-nav">
                <ul class="nav pull-right">
                    <!-- start: User Dropdown -->
                    <li class="dropdown">
                        <a class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="halflings-icon white user"></i> {session.name}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li class="dropdown-menu-title">
                                <span>Account Settings</span>
                            </li>
                            <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                            <li><a href="<?php echo U('Home/index/login');?>"><i class="halflings-icon off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <!-- end: User Dropdown -->
                </ul>
            </div>
            <!-- end: Header Menu -->

        </div>
    </div>
</div>
<!-- start: Header -->

<div class="container-fluid-full">
    <div class="row-fluid">

        <!-- start: Main Menu -->
        <div id="sidebar-left" class="span2">
            <div class="nav-collapse sidebar-nav">
                <ul class="nav nav-tabs nav-stacked main-menu">
                    <li><a href="<?php echo U('Home/index/home');?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> &nbsp;&nbsp;首页</span></a></li>
                    <li><a href="<?php echo U('/Uploader/Blog/forumManege');?>"><i class="icon-envelope"></i><span class="hidden-tablet">&nbsp;&nbsp;资讯系统</span></a></li>
                    <li><a href="<?php echo U('/Uploader/Img/listView');?>"><i class="icon-tasks"></i><span class="hidden-tablet">&nbsp;&nbsp;图片系统</span></a></li>
                </ul>
            </div>
        </div>
        <!-- end: Main Menu -->

        <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
        </noscript>

        <!-- start: Content -->
        <div id="content" class="span10">


            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="#">Dashboard</a></li>
            </ul>
            <!--在这里填充主页内容-->
            <div style="min-height: 800px">

                <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<link rel="stylesheet" type="text/css" href="/App/Public/dist/bootStrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/App/Public/dist/dataTables/dist/css/jquery.dataTables.min.css" />
	<script type="text/javascript" src="/App/Public/js/jqueryMobile/js/jquery.js"></script>
	<script type="text/javascript" src="/App/Public/dist/jsTree/dist/jstree.min.js"></script>
	<script type="text/javascript" src="/App/Public/dist/dataTables/dist/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="/App/Public/dist/dataTables/dist/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="/App/Public/js/iframe-autoheight.js"></script>
	<link rel="stylesheet" type="text/css" href="/App/Public/dist/jsTree/dist/themes/default/style.css" />
</head>
<body>
<div class="container" >
	<div  class="col-md-11">
		<div class="panel panel-default" >
			<div class="panel-heading">

				<h3 class="panel-title">图片</h3>

			</div>
			<div class="panel-body ">
				<a class="btn btn-success" href="<?php echo U('edit');?>?forum_id=<?php echo ($forum_id); ?>">发文章</a>
				<div class="title-block" >
					<p id="img_panel_title"> </p>

				</div>
				<table  class="table table-hover student-detail table-display" id="article_table" >
					<thead>
					<tr>
						<th>序号</th>
						<th>标题</th>
						<th>描述</th>
						<th>封面图片</th>
						<th>发布时间</th>
						<th>来源</th>
						<th>操作</th>
					</tr>
					</thead>
					<tbody>
					<?php if(is_array($articleList)): foreach($articleList as $k=>$article): ?><tr id="<?php echo ($article["article_id"]); ?>">
							<td><?php echo ($k); ?></td>
							<td><?php echo ($article["title"]); ?></td>
							<td><?php echo ($article["description"]); ?></td>
							<td><img src="<?php echo ($article["img"]); ?>" height="60px" ></td>
							<td><?php echo ($article["time"]); ?></td>
							<td><?php echo ($article["source"]); ?></td>
							<td><a class="btn btn-info" href= '<?php echo U("edit");?>?article_id=<?php echo ($article["article_id"]); ?>'> 编辑</a><br>
								<a class="btn btn-warning" href= '<?php echo U("show");?>?article_id=<?php echo ($article["article_id"]); ?>' target="_blank"> 预览</a><br>
								<a class="btn btn-danger" onclick="confrim_delete()" > 删除</a><br>
								<?php if($k == 0): ?><a  disabled="true" class="btn btn-default"> 上移</a><br>
									<?php else: ?>
									<a href= '<?php echo U("movePostion");?>?article_id=<?php echo ($article["article_id"]); ?>&&direction=up'class="btn btn-default"> 上移</a><br><?php endif; ?>
								<?php if($k == count($articleList)-1): ?><a  disabled="true" class="btn btn-default"> 下移</a>&nbsp;&nbsp;
									<?php else: ?>
									<a href= '<?php echo U("movePostion");?>?article_id=<?php echo ($article["article_id"]); ?>&&direction=down' class="btn btn-default"> 下移</a>&nbsp;&nbsp;<?php endif; ?>
								<!--<a href= '<?php echo U("movePostion");?>?article_id=<?php echo ($article["article_id"]); ?>&&up=true'> 上移</a>&nbsp;&nbsp;-->
								<!--<a href= '<?php echo U("movePostion");?>?article_id=<?php echo ($article["article_id"]); ?>&&up=false'> 下移</a></td>-->
						</tr><?php endforeach; endif; ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		initTable($("#article_table"));

	});
	function  confrim_delete(){
		if(confirm("确定删除?")){
			location.href = '<?php echo U("delete");?>?article_id=<?php echo ($article["article_id"]); ?>';
		}
	}
	function initTable($table){

		var length=$("th",$table).length;
		$("th",$table).attr("width",100/length+"%");
		$table.DataTable({
			"bDestroy":true,
			language: {
				"sLengthMenu": "每页显示 _MENU_ 条记录",
				"sZeroRecords": "抱歉， 没有找到",
				"sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
				"sInfoEmpty": "没有数据",
				"sInfoFiltered": "(从 _MAX_ 条数据中检索)",
				"sSearch": "搜索：",
				"oPaginate": {
					"sFirst": "首页",
					"sPrevious": "前一页",
					"sNext": "后一页",
					"sLast": "尾页"

				},
				"sZeroRecords": "没有检索到数据"
			}

		});

	}
</script>
</body>
</html>



            </div>



            <!-- end: Content -->
        </div>


    </div><!--/#content.span10-->
</div><!--/fluid-row-->

<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Settings</h3>
    </div>
    <div class="modal-body">
        <p>Here settings can be configured...</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
    </div>
</div>

<div class="clearfix"></div>

<footer>

    <p>
        <span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>

    </p>

</footer>



</body>
</html>