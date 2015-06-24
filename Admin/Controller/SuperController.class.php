<?php
namespace Admin\Controller;
use Think\Controller;

class SuperController extends Controller {
	public $ifCurrent = array();
	public $icKey = 'index';
	public $subMenu = array();
	
	public function _initialize() {
		// 判断权限
		if (!isset($_SESSION['member'])) {
		  header("location:".__ROOT__."/Admin/login");
		} else if ($_SESSION['member']['role'] != 'admin') {
		  $this->error('权限认证失败，请重新登录!', __ROOT__."/Admin/login", 3);
		}
    
		$table = M('site');
		$tableItem = M('pkg');
		$map['prty_name'] = 'site_name';
		$this->siteName = $table->where($map)->find()['prty_value'];

		$lifeTime = 3600;
		setcookie(session_name(), session_id(), time() + $lifeTime, "/");

		// 侧边栏处理
		if (ACTION_NAME == 'index') {
			$this->icKey = 'index';
		} else {
			$this->icKey = ACTION_NAME;
		}

		$this->ifCurrent[$this->icKey] = ' active';
		$this->assign('ifCurrent', $this->ifCurrent);
		$this->assign('colTitle', '超级后台');

		$this->assign('subMenu', $this->genSubmenu());
		$this->assign('ifCurrent_subMenu', $ifCurrent_subMenu);
		$this->name = $_SESSION['username'];
	}
	public function index() {
		if ($_POST['password'] == C('SUPER_PASS')) {
			$_SESSION['member']['ifSupper'] = true;
		}
		if (!$this->ifSuper()) {
			$this->display('login');
		} else {
			$this->display();
		}
		dump(C('SUPER_PASS'));
	}
	public function edit() {
		$this->checkSuper();
	}
	
	public function sql() {
		$this->checkSuper();
	}
	
	public function dbManager() {
		$this->checkSuper();
	}

	/**
	* 辅助函数
	*/
	public function genSubmenu() {
		$subMenu = array();
		$tableItem = M('pkg');
		
		$subMenu['index']['key'] 	= 'index';
		$subMenu['index']['name'] = '超级首页';
		
		$subMenu['edit']['key'] 	= 'edit';
		$subMenu['edit']['name'] = '高级编辑';

		$subMenu['sql']['key'] 	= 'sql';
		$subMenu['sql']['name'] = 'SQL 查询语句';

		$subMenu['dbManager']['key'] 	= 'dbManager';
		$subMenu['dbManager']['name'] = '导入导出';
		
		$subMenu[$this->icKey]['ifCurrent'] = ' active';
		
		return $subMenu;
	}
	public function ifSuper() {
		return $_SESSION['member']['ifSupper'];
	}
	
	public function checkSuper() {
		if (!$_SESSION['member']['ifSupper']) {
			$this->error('必须获得超级权限', __ROOT__."/Admin/".CONTROLLER_NAME."/index", 3);
		}
	}
}