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
<link href="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/css/bootstrap.css" rel="stylesheet">
<link href="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/css/bootstrap-responsive.css" rel="stylesheet">
<link href="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/css/style.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/html5shiv.js"></script>
<![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/ico/favicon.png">
<div id="wrap">
  
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
	<div class="container-fluid">
	  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="brand" href="/toyokou_tenso-japan/tenso/<?php echo (MODULE_NAME); ?>"><?php echo ($siteName); ?>管理后台</a>
	  <div class="nav-collapse collapse">
		<p class="navbar-text pull-right">
		  <a href="#" class="navbar-link" title="进入个人界面(计划中)"><?=$_SESSION['member']['nickname']?>(<?=$_SESSION['member']['username']?>)</a>
      <a href="/toyokou_tenso-japan/tenso/Admin/logout" class="navbar-link" style="" title="退出">[退出]</a>
      <a href="/toyokou_tenso-japan/tenso/Admin/help" class="icon-question-sign icon-white navbar-link" style="margin-top: 4px" title="帮助"></a>
      
      
		</p>
		<ul class="nav">
			<li class="<?php echo ($ifCurrent['Index']); ?>"><a href="/toyokou_tenso-japan/tenso/<?php echo (MODULE_NAME); ?>">后台首页</a></li>
			<li class="<?php echo ($ifCurrent['Tenso']); ?>"><a href="/toyokou_tenso-japan/tenso/<?php echo (MODULE_NAME); ?>/Tenso">查询统计</a></li>
			<li class="<?php echo ($ifCurrent['Tenso']); ?>"><a href="/toyokou_tenso-japan/tenso/<?php echo (MODULE_NAME); ?>/Super">超级后台</a></li>
			<li class="<?php echo ($ifCurrent['Other']); ?>"><a href="/toyokou_tenso-japan/tenso/<?php echo (MODULE_NAME); ?>/Other">其他操作</a></li>
			<li class="dropdown">
				<a href="/toyokou_tenso-japan/tenso/<?php echo (MODULE_NAME); ?>" class="dropdown-toggle" data-toggle="dropdown">快捷菜单 <b class="caret"></b></a>
				<ul class="dropdown-menu">
					
					<?php if(is_array($subMenu)): $i = 0; $__LIST__ = $subMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo['ifCurrent']); ?>"><a href="/toyokou_tenso-japan/tenso/<?php echo (MODULE_NAME); ?>/<?php echo (CONTROLLER_NAME); ?>/<?php echo ($vo['key']); ?>.html#first"><?php echo ($vo['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</li>
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
			<li class="<?=$vo['ifCurrent']?>"><a href="/toyokou_tenso-japan/tenso/<?php echo (MODULE_NAME); ?>/<?php echo (CONTROLLER_NAME); ?>/<?=$key?>.html#first"><?=$vo['name']?></a></li>
		<?php
 } ?>
	</ul>
  </div><!--/.well -->
</div><!--/span-->
      <div class="span9">
        <h2><?php echo ($pageTitle); ?></h2>
        <h3>程序设计</h3>
        <p>本程序由前台 (Home)、管理后台 (Admin)、用户后台 (Panel) 三个部分组成。Home 基于 Server 1.0 的内容来完成，用于客户的浏览了解海淘的相关信息；Admin 用于自己内部的管理使用；Panel 用于用户的操作，比如合箱等。</p>
		<h4>Home 部分 (预计 5 月份完成，6 月份推出)</h4>
		<p><s>Home 部分由 贾德荃 负责设计制作，Jay 来完成部署。</s></p>
		<p>2015.04.26 - 由于计划有变，先推出手机版，Home 2.0 预计 9 月份推出。</p>
        <h4>Admin 部分</h4>
		<p> (预计 5 月份完成核心功能，7~8 月份完成第一期的完整功能)</p>
		<h5>后台操作流程(2015.04.22 更新)</h5>
		<p>1. 仓库登记 </p>
		<p>目前是单管理员功能，后期考虑多管理员功能</p>
		<p>多管理环境下，只有总管理员可以查看收益信息，库存管理员无法查看收益信息</p>
		<p>2. 客户确认</p>
		<p>告知 4 项: 1.客户编号	2.到货编号	3. 客户包裹单号	4.重量</p>
		<p>登记 3 项: 商品内容、邮寄方法、合箱内容</p>
		<p>3. 统计价格</p>
		<p>(包裹数量、邮寄方式、重量; 备注合箱，比如 3 = 2 + 1)</p>
		<p>* 自动邮件发送付款通知</p>
		<p>4. 确认收钱</p>
		<p>需要登记收款日期、金额</p>
		<p>5. 通知仓库发货：</p>
		<p>仓库收到以下信息</p>
		<ul>
			<li>包裹编号
			<li>用户信息：UID、姓名、手机、邮编、地址
			<li>商品信息：商品内容（商品名称、数量、价格（总价、单价））、邮寄方式、合箱内容
		</ul>
		<p>6. 库存填写发货信息</p>
		<ul>
			<li>发货日
			<li>实际邮寄重量
			<li>邮寄金额
			<li>邮寄查询表单号
		</ul>
		<p>7. 总管理确认</p>
		<p>总管理员确认无误后、发送通知给客户</p>
		<p>* 统计（后期加入）</p>
		<h5>功能</h5>
        <p>4 月份计划完成 Admin 的主要功能，包括以下功能:</p>
        <ul>
          <li>货物入库登记
          <li>（待续...）
        </ul>
		<p>5 月份计划完成主要功能，包括以下功能:</p>
		<ul>
			<li>超级后台
			<li>数据备份
		</ul>
		<p>6 月份计划完成主要功能，包括以下功能:</p>
		<ul>
			<li>邮件通知
		</ul>
        <p>使用的技术包括:
        <ul>
			<li>PHP v5.4+
			<li>ThinkPHP v3.2.3
			<li>Bootstrap v2.3.2
			<li>HTML5
			<li>CSS3
			<li>Discuz! X v3.2 (UCenter v1.6)
        </ul>
		<h4>Panel 部分 (预计 5 月份完成，6 月份推出)</h4>
		<p>由于 ThinkPHP 与 Discuz 的调用上的冲突，Panel 通过 Discuz 来实现，预计 6~7 月份完成。</p>
		<p>预计将包含以下功能:</p>
		<ul>
			<li>客户报货，包括: 寄信人、产品类目、物品个数、产品价格、重量</li>
		</ul>
        <h3>5 月份后待完成功能</h3>
        <ul>
			<li>HTTP_REFERER 处理，SESSION 失效页面登记，登陆后，进入失效页面；目前默认下是进入首页。
			<li>支持手机管理操作(支持通过手机方式传送破损图片记录等)
			<li>用户的个人后台(Panel): 功能包括物品追踪、合箱操作、货物交易记录查询与统计
			<li>员工专属代号(昵称)功能
			<li>与 Discuz 的互动功能
        </ul>
      </div><!--/span-->
    </div><!--/row-->
  </div><!--/.fluid-container-->
  <div id="push"></div>
</div>
<footer id="footer">
<hr>
<p>&copy; 丰港转运 2015</p>
</footer>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script-->
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/jquery.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/jquery.scrollTo.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-transition.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-alert.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-modal.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-dropdown.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-scrollspy.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-tab.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-tooltip.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-popover.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-button.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-collapse.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-carousel.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/bootstrap-typeahead.js"></script>
<script src="/toyokou_tenso-japan/tenso/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/tensoJapan.js"></script>
<script>



/**
* 客户信息处理 (request)
*/
/*
var userInfo = '';

$("#formRequest").load(function() {
	$.getJSON(
		"http://www.tenso-japan.com/tenso/api.php/discuz/getMember/" + $("#input_user_id").val(),
		function(data) {
			if (!$("#input_user_id").val()) {
				alert('请输入用户编号(UID)');
			}
			if (!data) {
				alert('无此用户');
			};
		}
	);
});

$("#formRequest #pkg_id").load(function() {
	var uid = $("#pkg_" + $(this).val()).val();
	getReceiver(uid, "#pkg_ship_receiver");
	getAddress(uid, "#pkg_ship_address");
	getPhone(uid, "#pkg_ship_phone");
	getEmail(uid, "#pkg_ship_email");
});

$("#formRequest #pkg_id").change(function() {
	var uid = $("#pkg_" + $(this).val()).val();
	getReceiver(uid, "#pkg_ship_receiver");
	getAddress(uid, "#pkg_ship_address");
	getPhone(uid, "#pkg_ship_phone");
	getEmail(uid, "#pkg_ship_email");
});

// 合箱处理
$("#formRequest #ifMerge").change(function() {
	if($(this).prop("checked")){
		$("#row_ship_pkg_fee").hide();
		$("#row_ifNotice").hide();
		$("#row_ship_user_email").hide();
		$("#row_ship_user_notice").hide();
		$("#pkg_status").val("merge");
	} else {
		$("#row_ship_pkg_fee").show();
		$("#row_ifNotice").show();
		$("#row_ship_user_email").show();
		$("#row_ship_user_notice").show();
		$("#pkg_status").val("payment");
	}
});

// 通知邮件处理
$("#formRequest #ifNotice").change(function() {
	if(!$(this).prop("checked")){
		$("#row_ship_user_email").hide();
		$("#row_ship_user_notice").hide();
	} else {
		$("#row_ship_user_email").show();
		$("#row_ship_user_notice").show();
	}
});

function getReceiver(uid, jqTarget) {
	$.getJSON(
		"http://www.tenso-japan.com/tenso/api.php/discuz/getMember/" + uid,
		function(data) {
			$(jqTarget).val(data.realname);
		}
	);
}

function getAddress(uid, jqTarget) {
var address = '';
console.log(uid);
$.ajax({
		url: "http://www.tenso-japan.com/tenso/api.php/discuz/getMember/" + uid,
		dataType: 'json',
		async: false,
		success: function(data) {
			address = data.address;
			console.log(data);
		}
	});
	console.log(address);
	/*
	$.getJSON(
		"http://www.tenso-japan.com/tenso/api.php/discuz/getMember/" + uid,
		function(data) {
			$(jqTarget).val(data.address);
		}
	);
}

function getPhone(uid, jqTarget) {
	$.getJSON(
		"http://www.tenso-japan.com/tenso/api.php/discuz/getMember/" + uid,
		function(data) {
			$(jqTarget).val(data.mobile);
		}
	);
}

function getEmail(uid, jqTarget) {
	$.getJSON(
		"http://www.tenso-japan.com/tenso/api.php/discuz/getMember/" + uid,
		function(data) {
			$(jqTarget).val(data.email);
		}
	);
}*/

// Checkbox 全选 
$(".checkAll").click(function() { 
    var checkFlag = $(this).prop("checked"); 
    $(this).closest("table").find("input[type='checkbox']").each(function() { 
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

function recycle(type, id) {
	var sMsg;
    $.ajax({
		url: "/toyokou_tenso-japan/tenso/Admin/Tenso/recycle/"+ type + "/" + id,
		dataType: "json",
		success: function(data) {
			alert(data.msg);
			location.reload();
		}
	});
}

function restore(id) {
    $.ajax({
        url: "/toyokou_tenso-japan/tenso/Admin/Tenso/restore/" + id,
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
        url: "/toyokou_tenso-japan/tenso/Admin/Public/getItems",
        dataType: "json",
        success: function(data) {
			console.log(data);
			/*
			for(i = 0; i < data.length; i ++) {
				$sRows += '<tr>'
					+ '<td>' + data[i].pkg_id +'</td>'
					+ '<td>' + data[i].pkg_orig_number + '</td>'
					+ '<td>' + data[i].user_id + '</td>'
					+ '<td>' + data[i].pkg_weight + '</td>'
					+ '<td>' + data[i].clerk_name + '</td>'
					+ '<td>' + data[i].pkg_create_time + '</td>'
					+ '<td><input type="button" value="删除" id="checkAll" onClick="recycle(' + data[i].pkg_id + ')"></td>'
					+ '</tr>';
			}*/
        }
    });
}
</script>