<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title><?php echo ($siteName); ?>管理后台</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="丰港转运管理后台">
<meta name="author" content="WEIJING LIN">

<!-- Le styles -->
<link href="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/css/bootstrap.css" rel="stylesheet">
<link href="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/css/bootstrap-responsive.css" rel="stylesheet">
<link href="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/css/style.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/html5shiv.js"></script>
<![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/ico/favicon.png">
<div id="wrap">
  
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
	<div class="container-fluid">
	  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="brand" href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>"><?php echo ($siteName); ?>管理后台</a>
	  <div class="nav-collapse collapse">
		<p class="navbar-text pull-right">
		  <a href="#" class="navbar-link" title="进入个人界面(计划中)"><?=$_SESSION['member']['nickname']?>(<?=$_SESSION['member']['username']?>)</a>
      <a href="/toyokou_tenso-japan/service/Admin/logout" class="navbar-link" style="" title="退出">[退出]</a>
      <a href="/toyokou_tenso-japan/service/Admin/help" class="icon-question-sign icon-white navbar-link" style="margin-top: 4px" title="帮助"></a>
      
      
		</p>
		<ul class="nav">
			<li class="<?php echo ($ifCurrent['Index']); ?> dropdown">
				<a href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>" class="dropdown-toggle" data-toggle="dropdown">后台首页 <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<?php if(is_array($subMenu)): $i = 0; $__LIST__ = $subMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo['ifCurrent']); ?>"><a href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>/<?php echo (CONTROLLER_NAME); ?>/<?php echo ($vo['key']); ?>.html#first"><?php echo ($vo['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</li>
		  <li class="<?php echo ($ifCurrent['Tenso']); ?>"><a href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>/Tenso">转运操作</a></li>
		  <li class="<?php echo ($ifCurrent['Other']); ?>"><a href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>/Other">其他操作</a></li>
		</ul>
	  </div><!--/.nav-collapse -->
	</div>
  </div>
</div>
  <div class="container-fluid mainContainer">
    <div class="row-fluid">
      <div class="span3" id="sidebar">
  <div class="well sidebar-nav affix">
	<ul class="nav nav-list">
		<li class="nav-header"><h4><?php echo ($colTitle); ?></h4></li>
		<?php
 foreach($subMenu as $key => $vo){ ?>
			<li class="<?=$vo['ifCurrent']?>"><a href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>/<?php echo (CONTROLLER_NAME); ?>/<?=$key?>.html#first"><?=$vo['name']?></a></li>
		<?php
 } ?>
	</ul>
  </div><!--/.well -->
</div><!--/span-->
      <div class="span9" style="min-height:600px">
        <div class="hero-unit">
          <h1>前言</h1>
          <p>欢迎来到丰港转运后台帮助页面。通过本页面，您可以了解到后台的开发进度与使用帮助。</p>
          <p>本后台系统用于<a href="http://www.tenso-japan.com">丰港转运</a>的物流库存管理与会员信息管理。如果您在使用中有任何问题，请向小明(Aiming)提出，联系方式: Email <a href="mailto:sheldon@tenso-japan.com">sheldon@tenso-japan.com</a>。</p>
          <p><ul><li>业务设计: 小明设计<li>程序编写: 炎藤(QQ 44219991)</ul></p>
          <p>&copy; 2015 丰港集团股份有限公司</p>
        </div>
        <div class="row-fluid">
          <div class="span4">
            <h2>开发资源</h2>
            <p>本程序采用目前流行的 HTML5 技术规范，基于 ThinkPHP 3.2.3/Bootstrap v2.3.2 框架制作而成，详细的开发相关的技术资源，可以通过炎藤的 OSChina 博客上找到。 </p>
            <a class="btn" href="http://my.oschina.net/wjlin/blog/400669" target="_blank">详情 »</a>
          </div><!--/span-->
          <div class="span4">
            <h2>开发计划</h2>
            <p>丰港转运后台系统是丰港转运 (v1.0 Service) 遗留项目，并根据现有的业务进行编改制作。详情功能与开发安排，请通过以下链接来了解。</p>
             <a class="btn" href="./help/plan.html#">详情 »</a>
          </div><!--/span-->
          <div class="span4">
            <h2>开发日志</h2>
            <p>为便利交流与跟踪本项目的开发情况，特建立项目开发进度日志页面。每日的开发进度即时更新，详情信息，请通过以下链接进入查看。</p>
            <a class="btn" href="./help/log.html">详情 »</a>
          </div><!--/span-->
          
        </div><!--/row-->
      </div><!--/span-->
    </div><!--/row-->
  </div><!--/.fluid-container-->
  <div style="clear:both"></div>
  <div id="push"></div>
</div>
<footer id="footer">
<hr>
<p>&copy; 丰港转运 2015</p>
</footer>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/jquery.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-transition.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-alert.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-modal.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-dropdown.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-scrollspy.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-tab.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-tooltip.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-popover.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-button.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-collapse.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-carousel.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-typeahead.js"></script>
<script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/tensoJapan.js"></script>
<script>
   // Checkbox 全选 
$("#checkAll").click(function() { 
    var checkFlag = $(this).prop("checked"); 
    $("input:checkbox").each(function() { 
        $(this).prop("checked", checkFlag); 
    }); 
});

$("#bundleDelete").click(function() {
	
});
$("#bundleRecycle").click(function() {
	var sMsg = '';
	$(".item").each(function(i, o) {
		if($(o).prop("checked")){
			//alert($(o).prop("checked"));
			recycle($(o).val());
		}
	});
	location.reload();
});

function remove(id) {
    $.post("<?php echo U('/Tenso');?>/delete/"+id);
    location.reload();
}

function recycle(id) {
	var sMsg;
    $.ajax({
		url: "/toyokou_tenso-japan/service/Admin/Tenso/recycle/" + id,
		dataType: "json",
		success: function(data) {
			alert(data.msg);
			location.reload();
		}
	});
}

function restore(id) {
    $.ajax({
        url: "/toyokou_tenso-japan/service/Admin/Tenso/restore/" + id,
        dataType: "json",
        success: function(data) {
            alert(data.msg);
            location.reload();
        }
    });
}

function updateRecord() {
	 $sHTML = '<table class="table table-hover" id="stockRecord"><tr><th>到货编号</th><th>来源编号</th><th title="即 UID">客户编号</th><th>货物重量(g)</th><th>收货员</th><th>登记时间</th><th>操作</th></tr>';
	 $sRows = '';
	 $.ajax({
        url: "/toyokou_tenso-japan/service/Admin/Public/getItems",
        dataType: "json",
        success: function(data) {
			console.log(data);
			/*
			for(i = 0; i < data.length; i ++) {
				$sRows += '<tr>'
					+ '<td>' + data[i].item_id +'</td>'
					+ '<td>' + data[i].item_orig_number + '</td>'
					+ '<td>' + data[i].user_id + '</td>'
					+ '<td>' + data[i].item_weight + '</td>'
					+ '<td>' + data[i].clerk_name + '</td>'
					+ '<td>' + data[i].item_create_time + '</td>'
					+ '<td><input type="button" value="删除" id="checkAll" onClick="recycle(' + data[i].item_id + ')"></td>'
					+ '</tr>';
			}*/
        }
    });
}
</script>