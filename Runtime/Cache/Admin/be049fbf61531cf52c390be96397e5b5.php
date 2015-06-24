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
            <h3>入库登记</h3>
            <form class="form" method="post" action="/toyokou_tenso-japan/tenso/Admin/tenso/insert">
    <table class="table table-bordered table-hover">
        <tr>
            <th>字段</th>
            <th>内容</th>
            <th>备注</th>
        </tr>
        <tr>
            <td>入库编号</td>
            <td><?php echo ($newId); ?></td>
            <td>号码仅供参考，最终由系统自动生成，不重复</td>
        </tr>
		<tr>
            <td>来源编号</td>
            <td><input type="text" name="pkg_orig_number" placeholder="请输入来源编号"></td>
            <td>来源快递公司的包裹单号，比如 宅急便 411463699916、佐川 401246817005</td>
        </tr>
        <tr>
            <td>客户编号</td>
            <td><input type="number" id="input_user_id" name="user_id" placeholder="请输入 UID" value="" required="required"></td>
            <td>只需要填写UID号码，省略掉0，比如 UID0000015 就填写 15 就好了。</td>
        </tr>
        <tr>
            <td>重量</td>
            <td><input type="number" name="pkg_weight" placeholder="请输入货物重量(g)" value="" required="required"> g</td>
            <td>以 克(g) 为单位</td>
        </tr>
        <!--tr>
            <td>破损确认</td>
            <td>
                <div><input value="" placeholder="请输入货物完好状态"></div>
                <div><input type="file"></div>
                <div><input type="file"></div>
                <div><input type="file"></div>
            </td>
            <td>描述破损情况，比如无破损、已损坏等，并上传 1~3 张截图<br/>（如有较多截图文件，请 zip 打包）</td>
        </tr-->
        <tr>
            <td>操作员</td>
            <td><input type="text" name="clerk_name" value="" placeholder="输入收货员信息" value="阴先生" required="required"></td>
            <td>输入收货员信息</td>
        </tr>
</table>
	<input type="hidden" name="pkg_status" value="request"/>
	<input type="hidden" name="pkg_id" value="<?php echo ($newId); ?>"/>
    <div style="text-align: center"><input type="submit" value=" 提交 " class="btn"></div>
</form>
            <h3>入库记录</h3>
<table class="table table-hover" id="pkgRecord">
	<caption>包裹记录</caption>
    <tr>
        <th style="width:90px">包裹编号</th>
        <th style="width:156px">来源编号</th>
		<th title="即 UID">客户编号</th>
		
        <th title="单位: g">包裹重量</th>
        <th>收货员</th>
		<th>货物状态</th>
        <th>登记时间</th>
		<th>操作</th>
    </tr>
    <?php if(is_array($tablePkg)): $i = 0; $__LIST__ = $tablePkg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
        <td><?php echo ($vo["pkg_id"]); ?></td>
        <td><?php echo ($vo["pkg_orig_number"]); ?></td>
		<td><?php echo ($vo["user_id"]); ?></td>
		
        <td><?php echo ($vo["pkg_weight"]); ?></td>
        <td><?php echo ($vo["clerk_name"]); ?></td>
		<td><?php echo ($vo["pkg_status"]); ?></td>
		
        <td><?php echo ($vo["pkg_create_time"]); ?></td>
		<td><input type="button" value="删除" id="checkAll" onClick="recycle('pkg', '<?php echo ($vo["pkg_id"]); ?>')"></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table class="table table-hover">
	<caption>合箱记录</caption>
	<tr>
        <th style="width:90px">合箱编号</th>
        <th style="width:156px">包裹编号</th>
		<th title="即 UID">客户编号</th>
		
        <th title="单位: g">合箱重量</th>
        <th>合箱员</th>
		<th>货物状态</th>
        <th>登记时间</th>
		<th>操作</th>
    </tr>
	<?php if(is_array($tableBox)): $i = 0; $__LIST__ = $tableBox;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
        <td><?php echo ($vo["box_id"]); ?></td>
        <td><?php echo ($vo["pkg_ids"]); ?></td>
		<td><?php echo ($vo["user_id"]); ?></td>
        
		<td><?php echo ($vo["box_weight"]); ?></td>
        <td><?php echo ($vo["clerk_name"]); ?></td>
		<td><?php echo ($vo["box_status"]); ?></td>
        <td><?php echo ($vo["box_create_time"]); ?></td>
		<td><input type="button" value="删除" id="checkAll" onClick="recycle('box', '<?php echo ($vo["box_id"]); ?>')"></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table class="table table-hover">
	<caption>物品记录</caption>
	<tr>
        <th style="width:90px">物品编号</th>
		<th style="width:156px">物品名称</th>
        <th style="width:77px">物品数量</th>
		<th style="width:114px">包裹编号</th>
		<th style="width:114px">合箱编号</th>
		
        <th>登记时间</th>
		<th>物品状态</th>
    </tr>
	<?php if(is_array($tableGoods)): $i = 0; $__LIST__ = $tableGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
        <td><?php echo ($vo["goods_id"]); ?></td>
		<td><?php echo ($vo["goods_title"]); ?></td>
		<td><?php echo ($vo["goods_num"]); ?></td>
        <td><?php echo ($vo["pkg_id"]); ?></td>
        <td><?php echo ($vo["box_id"]); ?></td>
		
        <td><?php echo ($vo["goods_create_time"]); ?></td>
		<td><?php echo ($vo["goods_status"]); ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div style="margin-bottom: 20px">
* 以上内容仅显示最新的 10 个记录<br>
* <a href="/toyokou_tenso-japan/tenso/Admin/help/manual#pkg_status">请查看手册来了解包裹状态说明</a><br>
* 物品无法直接删除，只能通过编辑相应的包裹来编辑删除物品
</div>
<div id="newTable"></div>
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
<script type="text/javascript">
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
</script>