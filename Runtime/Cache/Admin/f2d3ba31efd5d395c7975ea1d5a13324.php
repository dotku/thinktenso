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
<style>
	select {
		width: auto;
	}
</style>
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
    <div class="mainContainer container-fluid">
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
          <div class="row-fluid">
            <h3>客户信息</h3>
			<form method="post">
				<table class="table table-bordered">
					<tr>
						<th>入库货物
						<td>
								<select name="pkg_id" id="input_pkg_id">
									<?php if(is_array($tablePkg)): $i = 0; $__LIST__ = $tablePkg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["pkg_id"]); ?>">入库编号: <?php echo ($vo["pkg_id"]); ?> | 
										客户编号: <?php echo ($vo["user_id"]); ?> | 
										来源编号: <?php echo ($vo["pkg_orig_number"]); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>
									<?php if(is_array($tableBox)): $i = 0; $__LIST__ = $tableBox;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["box_id"]); ?>">合箱编号: <?php echo ($vo["box_id"]); ?> | 
										客户编号: <?php echo ($vo["user_id"]); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>
									<option value="">无</option>
								</select>
						</td>
					</tr>
					<tr class="row-info">
						<th>货物信息
						<td>
							<table class="table table-bordered">
									<tr>
										<th style="width: 100px">入库编号
										<td><?php echo ($rowPkg['pkg_id']); ?>
									<tr>
										<th>客户编号
										<td>UID <span id="info_user_id"><?php echo ($rowPkg['user_id']); ?></span>
									<tr>
										<th>来源编号
										<td><span id="info_pkg_orig_number"><?php echo ($rowPkg['pkg_orig_number']); ?></span>
									<tr>
										<th>货物重量
										<td><span id="info_pkg_weight"><?php echo ($rowPkg['pkg_weight']); ?></span> g
									<tr>
										<th>收件人姓名
										<td><span id="info_pkg_ship_receiver"><?php echo ($rowPkg['pkg_ship_receiver']); ?></span>
									<tr>
										<th>收件人地址
										<td><span id="info_pkg_ship_address"><?php echo ($rowPkg['pkg_ship_address']); ?></span>
									<tr>
										<th>收件人电话
										<td><span id="info_pkg_ship_phone"><?php echo ($rowPkg['pkg_ship_phone']); ?></span>
									<tr>
										<th>邮寄方式
										<td><span id="info_pkg_ship_way"><?php echo ($rowPkg['pkg_ship_way']); ?></span>
									<tr>
										<th>应付金额
										<td><span id="info_pkg_ship_fee"><?php echo ($rowPkg['pkg_ship_fee']); ?></span>
							</table>
						</td>
					</tr>
					<tr>
						<th>付款方式
						<td>
							<select name="pkg_payment_way">
								<option value="taobao">淘宝
								<option value="alipay">支付宝
							</select>
						</td>
					</tr>
					<tr>
						<th>实际支付
						<td><input type="text" name="pkg_user_email" class="input-xxlarge" placeholder="请输入金额(RMB)"></input></td>
					</tr>
				</table>
				<input type="hidden" name="pkg_status" value="shipping"/>
				<input type="submit" value=" 提交 "/>
			</form>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
	<div id="push"><!--FOR STICK FOOTER--></div>
</div>
<div style="display:none">
<?php if(is_array($table)): $i = 0; $__LIST__ = $table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input class="pid" type="hidden" id="pkg_<?php echo ($vo["pkg_id"]); ?>" value="<?php echo ($vo["pkg_id"]); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
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
<script>
/**
* 初始化
*/

var oDataList = new Object();

// 预载操作，获得用户信息
window.onload = function() {
	$(".pid").each(function(i, o) {
		if ($(o).val()) {
			$.ajax({
				url: "/toyokou_tenso-japan/tenso/Admin/API/getPkg/" + $(o).val(),
				dataType: 'json',
				success: function(data) {
					if (data) {
						eval("oDataList.pid" + data.pkg_id +" = data");
					}
				}
			});
		}
	});
}

// 载入操作
$(function(){
	if (!$("#input_pkg_id").val()) {
		$(".row-info").hide();
	}
});

/**
* 事件处理
*/

$("#input_pkg_id").change(function(){
	if ($("#input_pkg_id").val()) {
		updatePkgInfo(oDataList);
		$(".row-info").show();
	} else {
		$(".row-info").hide();
	}
});

/**
* 辅助函数
*/

function updatePkgInfo(obj) {
	if (obj) {
		eval("var dataObj = obj.pid" + getPID());
		for (var key in dataObj) {
			eval('$("#info_" + key).text(dataObj.' + key + ')');
		}
	}
}

function getPID() {
	return $("#input_pkg_id").val();
}
</script>