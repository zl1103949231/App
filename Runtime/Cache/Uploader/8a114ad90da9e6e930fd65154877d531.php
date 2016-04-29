<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
	<link rel="stylesheet" type="text/css" href="/App/Public/dist/jsTree/dist/themes/default/style.css" />
</head>
<body>
<div class="container">
<div class="row" >
	<div class=" text-center,col-md-10,col-sd-10">
		<div class=" demo-columns">
			<div class="col-md-4 col-sd-4">
				<!-- D&D Zone-->
				<div id="drag-and-drop-zone" class="uploader">
					<div>
						拖动图片到此处
					</div>

					<div class="browser">
						<label>
							<span>点击打开文件浏览器</span>
							<input type="file" name="img"
							       title='图片'>
						</label>
					</div>
				</div>
				<!-- /Debug box -->
			</div>
			<!-- / Left column -->

			<div class="col-md-8 col-sd-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							上传
						</h3>
					</div>
					<div class="panel-body demo-panel-files" id='demo-files'>
						<span class="demo-note">还没有文件被选中.</span>
					</div>
				</div>
			</div>
			<!-- / Right column -->
		</div>
	</div>
	<!-- Debug box -->
	<div class="panel panel-default" hidden>
		<div class="panel-heading">
			<h3 class="panel-title">Debug</h3>
		</div>
		<div class="panel-body demo-panel-debug">
			<ul id="demo-debug">
			</ul>
		</div>
	</div>
	<!-- /Debug box -->
</div >

<div class="row">
	<div id="jstree" class="col-md-2">

	</div>
	<div  class="col-md-10">
		<div class="panel panel-default" >
			<div class="panel-heading">
				<h3 class="panel-title">图片</h3>
			</div>
			<div class="panel-body ">
				<div class="title-block" >
					<p id="img_panel_title"></p>

				</div>
				<table  class="table table-hover student-detail table-display" id="img_table" >
					<thead>
					<tr>
						<th>序号</th>
						<th>图片</th>
						<th>地址</th>
						<th>操作</th>
					</tr>
					</thead>


				</table>
			</div>
		</div>
	</div>


</div>
</div>
<script type="text/javascript">
	$(function () {
		// 6 create an instance when the DOM is ready

		$.ajax({
			type: "POST",
			url: '<?php echo U('createTree');?>',
			dataType: 'json',
			success: function(msg){
				appendTree(msg);
			}
		});
	});
	function  appendTree(msg){
	$('#jstree').jstree({

		'core' : {
			"themes" : {
				"responsive" : false
			},
			'data' : msg
		},
		"types" : {
			"default" : {
				"icon" : "fa fa-folder icon-state-warning icon-lg"
			},
			"file" : {
				"icon" : "fa fa-file icon-state-warning icon-lg"
			}
		}
	}) .bind('dblclick.jstree',function(event){
		var eventNodeName = event.target.nodeName;
		if (eventNodeName == 'INS') {
			return;
		} else if (eventNodeName == 'A') {
			var $subject = $(event.target).parent();
			if ($subject.find('ul').length > 0) {
			} else {
				//选择的id值
				//alert($(event.target).parents('li').attr('id'));
				var  $id=$(event.target).parents('li').attr('id');
				//alert($id);

				getImgdata('<?php echo U("listImgs");?>',$id,$("#img_table"));


			}
		}
	});

	}
	function getImgdata(action,ids,$table){
		$("#img_table>tbody").remove();
		$tbody=$("<tbody></tbody>");
		$.post(action,{path: ids},function(data,textStatus){
			var list=data;
			//alert(data);
			$.each(list,function(i,u){

				$tr=$("<tr></tr>").attr("ids",u.path).click(function(){
				});
				$td1=$("<td></td>").html(i).appendTo($tr);
				$td2=$("<td></td>").html("<img src='<?php echo U("getImg");?>?path="+u.path+"'/>").appendTo($tr);
				$td3=$("<td></td>").html("http://"+u.url).appendTo($tr);
				$deleteButton=$("<a class='btn btn-danger'>删除</a>").click(function(){
					alert(u.path);
					var  $this=$(this);

					$.post('<?php echo U("deleteImg");?>',{path:u.path},function(data,textStatus){

						if (data.status=='200'){
							getImgdata(action,ids,$table);
						}else {
							alert("删除失败")
						}
					},"json");
				});

				$tdend=$("<td></td>").append($deleteButton);
				$tdend.appendTo($tr);
				$tbody.append($tr);

			});
			$table.append($tbody);
			initTable($table);
		},"json");

		return $tbody;
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
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/App/Public/js/jquery_uploader/dmuploader.min.js"></script>
<script type="text/javascript" src="/App/Public/js/jquery_uploader/demo.min.js"></script>
<link rel="stylesheet" type="text/css" href="/App/Public/css/jquery_uploader/uploader.css" />
<link rel="stylesheet" type="text/css" href="/App/Public/css/jquery_uploader/demo.css" />
<script type="text/javascript">
	$('#drag-and-drop-zone').dmUploader({
		url: '<?php echo U('upload');?>',
		dataType: 'json',
		allowedTypes: 'image/*',
		/*extFilter: 'jpg;png;gif',*/
		onInit: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'Plugin initialized correctly');
		},
		onBeforeUpload: function(id){
			$.danidemo.addLog('#demo-debug', 'default', 'Starting the upload of #' + id);

			$.danidemo.updateFileStatus(id, 'default', 'Uploading...');
		},
		onNewFile: function(id, file){
			$.danidemo.addFile('#demo-files', id, file);
		},
		onComplete: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');
		},
		onUploadProgress: function(id, percent){
			var percentStr = percent + '%';

			$.danidemo.updateFileProgress(id, percentStr);
		},
		onUploadSuccess: function(id, data){
			$.danidemo.addLog('#demo-debug', 'success', 'Upload of file #' + id + ' completed');

			$.danidemo.addLog('#demo-debug', 'info', 'Server Response for file #' + id + ': ' + JSON.stringify(data));

			$.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

			$.danidemo.updateFileProgress(id, '100%');
		},
		onUploadError: function(id, message){
			$.danidemo.updateFileStatus(id, 'error', message);

			$.danidemo.addLog('#demo-debug', 'error', 'Failed to Upload file #' + id + ': ' + message);
		},
		onFileTypeError: function(file){
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
		},
		onFileSizeError: function(file){
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
		},
		/*onFileExtError: function(file){
		 $.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
		 },*/
		onFallbackMode: function(message){
			$.danidemo.addLog('#demo-debug', 'info', 'Browser not supported(do something else here!): ' + message);
		}
	});
</script>
</body>
</html>