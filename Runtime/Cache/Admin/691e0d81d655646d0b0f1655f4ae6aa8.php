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
			<h3>合箱处理</h3>
			<p>通过合箱，用户可以把多个包裹合并到一个箱子中以解决国际转运的费用。后期 (预计 7~8 月推出) 将由用户自行操作合箱步骤，后台也可以辅助操作合箱，目前则仅能通过后台来操作合箱步骤。[<a href="#steps">合箱步骤说明</a>]</p>
			<fieldset>
				<legend>选择合箱</legend>
					<table class="table">
					<caption>目标合箱</caption>
					<tr>
						<th>选择
						<th>合箱编号
						<th>用户编号
						<th>合箱状态
						<th>包含包裹
						<th>包含物品
						<th>创建时间
						<th>操作
					</tr>
				<?php if(is_array($tableBox)): $i = 0; $__LIST__ = $tableBox;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td><input class="box-selector" type="checkbox" 
							data-box_id="<?php echo ($vo["box_id"]); ?>"
							data-user_id="<?php echo ($vo["user_id"]); ?>">
						<td><?php echo ($vo["box_id"]); ?>
						<td><?php echo ($vo["user_id"]); ?>
						<td><?php echo ($vo["box_status"]); ?>
						<td><?php echo ($vo["pkg_ids"]); ?>
						<td><?php echo ($vo["goods"]); ?>
						<td><?php echo ($vo["box_create_time"]); ?>
						<td><input type="button" value="删除" onClick="recycle('box', '<?php echo ($vo["box_id"]); ?>')"></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<tr>
						<td colspan="7"><a href="javascript:void(0)" title="新增一个空合箱" onclick="newbox()">新增</a> | 
						下一页 上一页 
					</tr>
				</table>
				<table class="table">
					<caption>来源包裹</caption>
					<tr>
						<th>选择
						<th>包裹编号
						<th>用户编号
						<th>来源编号
						<th>包裹状态
						<th>相关合箱
						<th>入库时间
						<th>操作
					</tr>
				<?php if(is_array($tablePkg)): $i = 0; $__LIST__ = $tablePkg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td><input class="pkg-selector" type="checkbox" 
							data-pkg_id="<?php echo ($vo["pkg_id"]); ?>"
							data-user_id="<?php echo ($vo["user_id"]); ?>">
						<td><?php echo ($vo["pkg_id"]); ?>
						<td class="uid"><?php echo ($vo["user_id"]); ?>
						<td><?php echo ($vo["pkg_orig_number"]); ?>
						<td><?php echo ($vo["pkg_status"]); ?>
						<td class="cell-merge"><?php echo ($vo["merge_ids"]); ?>
						<td><?php echo ($vo["pkg_create_time"]); ?>
						<td><input type="button" value="删除" id="checkAll" onClick="recycle('pkg', '<?php echo ($vo["pkg_id"]); ?>')"></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<tr>
						<td colspan="7"><input type="checkbox" class="checkAll"> 全选 | 下一页 上一页
					</tr>
				</table>
				<div style="margin-bottom: 20px; text-align: center"><input type="button" value=" 进行合箱 " id="button-merge"></div>
			</fieldset>
			<div class="help-block">
			<div>* 请先选择需要合箱的包裹，然后选择对应的目标合箱，点击 "进行合箱" 进行操作[<a href="#steps">详细</a>]</div>
			<div>* 最多只能合并 10 个包裹</div>
			</div>
			
			<form method="post" id="formMerge">
	<fieldset disabled="disabled">
	<legend>合箱编辑</legend>
	<table class="table table-bordered">
		<tr>
			<th>运单编号
			<td>
				<div><input class="form-control-static" 
					id="input_box_id"
					name="box_id"
					value=""
					type="text" readonly></div>
				<div>(* 以上号码仅供参考，最终号码由系统自动生成，可能与该号码有所不同)</div>
			</td>
		</tr>
		<tr>
			<th>包裹编号
			<td>
				<input type="text" id="input_pkg_ids" name="pkg_ids" class="input-xxlarge" required="required" readonly="0">
			</td>
		</tr>
		<tr>
			<th>货物内容
			<td>
				<table class="table table-bordered">
					<tr>
						<th>物品标题
						<th>物品数量
					<tr>
						<td><input type="text" class="input-xxlarge">
						<td><input type="text" class="input-small">
				</table>
			</td>
		</tr>
		<tr>
			<th>收件人
			<td>
				<input type="text" id="pkg_ship_receiver" name="pkg_ship_receiver" class="input-xxlarge" required="required" readonly>
			</td>
		</tr>
		<tr>
			<th>邮寄地址
			<td>
				<input type="text" id="pkg_ship_address" name="pkg_ship_address" class="input-xxlarge" required="required" readonly>
			</td>
		</tr>
		<tr>
			<th>电话号码
			<td>
				<input type="text" id="pkg_ship_phone" name="pkg_ship_phone" class="input-xxlarge" required="required" readonly>
			</td>
		</tr>
		
		<tr class="singleShip">
			<th>邮寄方式
			<td>
				<select name="pkg_ship_way" readonly>
					<option value="ems">EMS
					<option value="sal">SAL
					<option value="boat">海运
					<option value="air">空运
				</select>
				<a href="http://www.tenso-japan.com/service/toolbox/?mod=calculator" target="_blank">价格计算器</a>
			</td>
		</tr>
		<tr class="singleShip" id="row_ship_pkg_fee">
			<th>价格计算
			<td><input type="text" id="pkg_ship_fee" name="pkg_ship_fee" placeholder="请填写最终费用" class="input-xxlarge" readonly> 日元</td>
		</tr>
		<tr class="singleShip" id="row_ifNotice">
			<th>是否通知
			<td>
				<input type="checkbox" id="ifNotice" name="ifNotice" readonly> 要通知 (*点击 提交 时将向客户发送邮件通知)
			</td>
		</tr>
		<tr class="singleShip" id="row_ship_user_email">
			<th>客户邮箱
			<td><input type="email" id="pkg_ship_email" name="pkg_ship_email" class="input-xxlarge" placeholder="sample@email.com" readonly></input></td>
		</tr>
		<tr class="singleShip" id="row_ship_user_notice">
			<th>邮件通知
			<td>
				<textarea id="user_notice" name="user_notice" class="input-xxlarge" style="height: 200px" readonly></textarea></td>
		</tr>
	</table>
	<input type="hidden" name="pkg_status" value="payment"/>
	<input type="submit" value=" 提交 "/>
	</fieldset>
</form>
			<?php if(is_array($table)): $i = 0; $__LIST__ = $table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input class="uid" type="hidden" id="pkg_<?php echo ($vo["pkg_id"]); ?>" value="<?php echo ($vo["user_id"]); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
          </div><!--/row-->
			<div id="steps">
<h4>合箱步骤说明</h4>
<ol>
	<li>首先要创建一个空合箱，如果已经存在一个目标合箱，则不需要创建，进入下一步。
	<li>选择要处理的合箱。
	<li>选择要处理的包裹，可以是多个包裹；一个包裹也可以有多个合箱
	<br>当一个包裹有多个合箱的时候，包裹中的物品随着合箱的状态都更新后，相应的包裹的状态才会被更新。比如，包裹 A 中有产品 A1、A2、A3。合箱 M1 合并了 A1、A2，合箱 M2 合并了 A3。在 M1 和 M2 都更新为 payment (待支付) 状态之后，包裹 A 的状态才会更新为 payment (待支付)。
	<li>点击 "进行合箱" 进入合箱编辑，填写相关的信息。
	<li>点击 "提交"，该合箱进入支付状态，点击 "保存"，仅保存合箱现有信息，比如当有多个包裹要合并到该合箱的时候，就可以通过 "保存" 功能暂缓进入支付步骤。
</ol>
</div>
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
var oDataList = new Object();

/**
* 事件处理
*/

/* 合箱选择页面 */
$("#button-merge").click(function() {
	var iBoxNum = $(".box-selector:checked").length;
	var iPkgNum = $(".pkg-selector:checked").length;
	var iPkgUID = $(".pkg-selector:checked").attr("data-user_id");
	var sMsg = "";
	
	// 检查合箱选择
	if (iBoxNum == 1) {
		boxFlag = true;
	} else if (iBoxNum > 1) {
		sMsg += "一次只能选择一个合箱进行操作\n";
	} else if (iBoxNum == 0) {
		sMsg += "请至少选择一个合箱\n";
	}
	
	// 检查包裹选择
	if (iPkgNum >= 1) {
		pkgFlag = true;
	} else {
		sMsg += "请至少选择 1 个包裹进行操作\n";
	}
	
	// 检查包裹用户
	$(".pkg-selector:checked, .box-selector:checked").each(function(){
		if ($(this).attr("data-user_id") == 0) {
			$(this).attr("data-user_id", iPkgUID);
		} else if ($(this).attr("data-user_id") != iPkgUID) {
			sMsg += "包裹和合箱必须是属于同一个用户\n";
		}
	});
	
	// 进入编辑状态
	if (!sMsg) {
		$("#formMerge fieldset[disabled]").removeAttr("disabled");
		$("#formMerge [readonly]").removeAttr("readonly");
		$(window).scrollTop($("#formMerge").offset().top-52);
		fillForm();
	} else {
		alert(sMsg);
	}
});

/* 合箱编辑页面 */
function fillForm() {
	// 合箱编号
	$("#input_box_id").val($(".box-selector:checked").attr("data-box_id"));
	$("#input_box_id").attr("readonly", "readonly");
	
	// 包裹编号
	var arrPkgIDs = Array();
	$(".pkg-selector:checked").each(function() {
		arrPkgIDs.push($(this).attr("data-pkg_id"));
	});
	$("#input_pkg_ids").val(arrPkgIDs.join(", "));
	$("#input_pkg_ids").attr("readonly", "readonly");
}
// 货物切换
$("#pkg_id").change(function(){
	if ($("#pkg_id").val()) {
		init();
	}
});

// 合箱处理
$("#formRequest #ifMerge").change(function() {
	if($(this).prop("checked")){
		$(".singleShip").hide();
		$("#pkg_status").val("merge");
	} else {
		$(".singleShip").show();
		$("#pkg_status").val("payment");
	}
});
/**
* 函数区
*/
// 页面初始化处理
function init() {
	// 美化表格内容
	$(".cell-merge").each(function(i, o) {
		if ($(o).text() == 0) {
			$(o).text("无内容");
		}
	});
	/*
	$(".uid").each(function(i, o){
		$.ajax({
			url: "http://www.tenso-japan.com/tenso/api.php/discuz/getMember/" + $(o).val(),
			//async: false,
			dataType: 'json',
			success: function(data) {
				eval("oDataList.uid" + data.uid +" = data");
				autoFill(oDataList);
			}
		})
	});
	*/
}
function newbox() {
	$.post("/toyokou_tenso-japan/tenso/index.php/Admin/Index/merge/newbox");
	location.reload();
}
function autoFill(obj) {
	eval("var dataObj = obj.uid" + getUID());
	//console.log(dataObj);
	$("#pkg_ship_receiver").val(dataObj.realname || "");
	$("#pkg_ship_address").val(dataObj.address);
	$("#pkg_ship_phone").val(dataObj.mobile || dataObj.phone || ""); // 手机优先
	$("#pkg_ship_email").val(dataObj.email);
	
	$("#user_notice").val("您好，"+ dataObj.realname +" 先生/女士 \n\n"
		+ "您的包裹已入库，信息如下:\n\n" 
		+ "  收件人名: " + (dataObj.realname || "") + "\n"
		+ "  邮寄地址: " + (dataObj.address) + "\n"
		+ "  手机号码: " + (dataObj.mobile || dataObj.phone || "") + "\n"
		+ "  转运金额: " + "\n\n"
		+ "请尽快支付转运费用 " + "\n"
		+ "支付链接: http://item.taobao.com/item.htm?spm=686.1000925.0.0.vg4okg&id=44809946055" + "\n\n"
		+ "丰港转运客服中心" + "\n"
		+ "QQ 2197143208" + "\n"
		+ "EM support@tenso-japan.com" + "\n"
		+ "WB http://www.tenso-japan.com" + "\n"
		
	);
}

function getUID() {
	return $("#pkg_" + $("#pkg_id").val()).val();
}
</script>