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
	  <a class="brand" href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>"><?php echo ($siteName); ?>管理后台</a>
	  <div class="nav-collapse collapse">
		<p class="navbar-text pull-right">
		  <a href="#" class="navbar-link" title="进入个人界面(计划中)"><?=$_SESSION['member']['nickname']?>(<?=$_SESSION['member']['username']?>)</a>
      <a href="/toyokou_tenso-japan/service/Admin/logout" class="navbar-link" style="" title="退出">[退出]</a>
      <a href="/toyokou_tenso-japan/service/Admin/help" class="icon-question-sign icon-white navbar-link" style="margin-top: 4px" title="帮助"></a>
      
      
		</p>
		<ul class="nav">
			<li class="<?php echo ($ifCurrent['Index']); ?>"><a href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>">后台首页</a></li>
			<li class="<?php echo ($ifCurrent['Tenso']); ?>"><a href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>/Tenso">查询统计</a></li>
			<li class="<?php echo ($ifCurrent['Tenso']); ?>"><a href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>/Super">超级后台</a></li>
			<li class="<?php echo ($ifCurrent['Other']); ?>"><a href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>/Other">其他操作</a></li>
			<li class="dropdown">
				<a href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>" class="dropdown-toggle" data-toggle="dropdown">快捷菜单 <b class="caret"></b></a>
				<ul class="dropdown-menu">
					
					<?php if(is_array($subMenu)): $i = 0; $__LIST__ = $subMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo['ifCurrent']); ?>"><a href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>/<?php echo (CONTROLLER_NAME); ?>/<?php echo ($vo['key']); ?>.html#first"><?php echo ($vo['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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
			<li class="<?=$vo['ifCurrent']?>"><a href="/toyokou_tenso-japan/service/<?php echo (MODULE_NAME); ?>/<?php echo (CONTROLLER_NAME); ?>/<?=$key?>.html#first"><?=$vo['name']?></a></li>
		<?php
 } ?>
	</ul>
  </div><!--/.well -->
</div><!--/span-->
        <div class="span9">
          <div class="row-fluid">
            <h3>客户信息</h3>
			<form method="post" id="formRequest">
				<table class="table table-bordered">
					<tr>
						<th>入库货物
						<td>
								<select name="item_id" id="item_id">
									<?php if(is_array($table)): $i = 0; $__LIST__ = $table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["item_id"]); ?>">入库编号: <?php echo ($vo["item_id"]); ?> | 
											来源编号: <?php echo ($vo["item_orig_number"]); ?> |
											客户编号: <?php echo ($vo["user_id"]); ?> |
											货物重量: <?php echo ($vo["item_weight"]); ?>
										</option><?php endforeach; endif; else: echo "" ;endif; ?>
									<option value="">无</option>
								</select>
						</td>
					</tr>
					<tr>
						<th>邮寄方式
						<td>
							<select name="item_ship_way">
								<option value="ems">EMS
								<option value="sal">SAL
								<option value="boat">海运
								<option value="air">空运
							</select>
							<a href="http://www.tenso-japan.com/service/toolbox/?mod=calculator" target="_blank">价格计算器</a>
						</td>
					</tr>
					<tr>
						<th>收件人
						<td>
							<input type="text" id="item_ship_receiver" name="item_ship_receiver" class="input-xxlarge" required="required">
						</td>
					</tr>
					<tr>
						<th>邮寄地址
						<td>
							<input type="text" id="item_ship_address" name="item_ship_address" class="input-xxlarge" required="required">
						</td>
					</tr>
					<tr>
						<th>电话号码
						<td>
							<input type="text" id="item_ship_phone" name="item_ship_phone" class="input-xxlarge" required="required">
						</td>
					</tr>
					<tr>
						<th>货物内容
						<td><textarea name="item_content" class="input-xxlarge"></textarea></td>
					</tr>
					<tr>
						<th>是否合箱
						<td><input type="checkbox" id="ifMerge" name="ifMerge"> 要合箱</td>
					</tr>
					<tr id="row_item_ship_fee">
						<th>价格计算
						<td><input type="text" id="item_ship_fee" name="item_ship_fee" placeholder="请填写最终费用" class="input-xxlarge"> 日元</td>
					</tr>
					<tr id="row_item_ship_email">
						<th>客户邮箱
						<td><input type="email" id="item_ship_email" name="item_ship_email" class="input-xxlarge" placeholder="sample@email.com"></input></td>
					</tr>
					<tr id="row_user_notice">
						<th>邮件通知
						<td>
							<textarea id="user_notice" name="user_notice" class="input-xxlarge" style="height: 200px">您好,
您的包裹信息如下:
  邮寄地址:
  手机号码:
  货物信息:

请尽快支付，支付链接: http://item.taobao.com/item.htm?spm=686.1000925.0.0.vg4okg&id=44809946055&qq-pf-to=pcqq.c2c</textarea></td>
					</tr>
				</table>
				<input type="hidden" name="item_status" value="payment"/>
				<input type="submit" value=" 提交 "/>
			</form>
			<?php if(is_array($table)): $i = 0; $__LIST__ = $table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="hidden" id="item_<?php echo ($vo["item_id"]); ?>" value="<?php echo ($vo["user_id"]); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
	<div id="push"><!--FOR STICK FOOTER--></div>
</div>
<footer id="footer">
<hr>
<p>&copy; 丰港转运 2015</p>
</footer>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<!--script src="/toyokou_tenso-japan/service/Public/<?php echo (MODULE_NAME); ?>/<?php echo (THEME_NAME); ?>/js/jquery.js"></script-->
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

/**
* 货物入库登记 (stock)
*/
$("#input_user_id").blur(function() {
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

/**
* 客户信息处理 (request)
*/
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

$("#formRequest #item_id").change(function() {
	var uid = $("#item_" + $(this).val()).val();
	getReceiver(uid, "#item_ship_receiver");
	getAddress(uid, "#item_ship_address");
	getPhone(uid, "#item_ship_phone");
	getEmail(uid, "#item_ship_email");
});

$("#formRequest #ifMerge").change(function() {
	if($(this).prop("checked")){
		$("#row_item_ship_fee").hide();
		$("#row_item_user_email").hide();
		$("#row_user_notice").hide();
		$("#item_status").val("merge");
	} else {
		$("#row_item_ship_fee").show();
		$("#row_item_user_email").show();
		$("#row_user_notice").show();
		$("#item_status").val("payment");
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
	);*/
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
}

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