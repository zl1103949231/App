<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>云韵科技管理后台</title>
    <meta name="description" content="云韵科技管理后台">
    <meta name="author" content="云韵科技">
    <meta name="keyword" content="云韵科技">
    <!-- end: Meta -->
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->

    <link rel="stylesheet" type="text/css" href="/App/Public/dist/dash-ui/css/bootstrap.min.css" />

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
            <a class="brand" href="<?php echo U('Home/index/login');?>"><span>云韵科技管理后台</span></a>

            <!-- start: Header Menu -->
            <div class="nav-no-collapse header-nav">
                <ul class="nav pull-right">
                    <!-- start: User Dropdown -->
                    <li class="dropdown">
                        <a class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="halflings-icon white user"></i> <?php echo ($session["login_name"]); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li class="dropdown-menu-title">
                                <span>账户设置</span>
                            </li>
                            <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                            <li><a href="<?php echo U('Home/index/logout');?>"><i class="halflings-icon off"></i> 退出系统</a></li>
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


            <!--<ul class="breadcrumb">-->
                <!--<li>-->
                    <!--<i class="icon-home"></i>-->
                    <!--<a href="index.html">Home</a>-->
                    <!--<i class="icon-angle-right"></i>-->
                <!--</li>-->
                <!--<li><a href="#">Dashboard</a></li>-->
            <!--</ul>-->
            <!--在这里填充主页内容-->
            <div style="min-height: 800px">

                <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <ul class="breadcrumb">
   <li>
    <i class="icon-home"></i>
    <a href="<?php echo U('home');?>">Home</a>
    </li>

    </ul>
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