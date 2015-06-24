<?php
namespace Admin\Controller;
use Think\Controller;
class APIController extends Controller {
	public function _initialize(){
		// 判断权限
		if (!isset($_SESSION['member'])) {
		  $this->error("请登陆后台", __ROOT__."/Admin/login", 3);
		} else if ($_SESSION['member']['role'] != 'admin') {
		  R('Route/errorRedirect', array('权限认证失败，请重新登录!'));
		}
		
		$table = M('site');
		$map['prty_name'] = 'site_name';
		$this->siteName = $table->where($map)->find()['prty_value'];

		$lifeTime = 3600;
		setcookie(session_name(), session_id(), time() + $lifeTime, "/");
	}
  
  public function index(){
      $this->show("Welcome to Admin API!");
  }
  
	public function getGoods() {
		$arrResult = array();
		$arrResult['msg'] = "读取失败: 请输入包裹ID";
		if (I("path.2")) {
			$tableGoods = M("goods");
			$arrResult = $tableGoods->where('pkg_id = '.I("path.2"))->select();
			$arrResult['msg'] = "读取成功";
		}
		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}
	
	public function getPkg() {
		$arrResult = array();
		$arrResult['msg'] = "读取失败: 请输入包裹ID";
		if (I("path.2")) {
			$tablePkg = M("pkg");
			$arrResult = $tablePkg->where('pkg_id = '.I("path.2"))->select()[0];
			//$arrResult['pkgId'] = '000';
			//$arrResult['msg'] = "读取成功";
		}
		// dump($arrResult);
		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}
}