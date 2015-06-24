<?php
namespace Admin\Controller;
use Think\Controller;
class HelpController extends Controller {
	public $ifCurrent = array();
	public $icKey = 'index';
	
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

		$this->icKey = CONTROLLER_NAME;
		$this->ifCurrent[$this->icKey] = ' active';
		$this->assign('ifCurrent', $this->ifCurrent);
		$this->assign('colTitle', '帮助');
		
		// 子菜单
		$subMenu = array();
		$subMenu['index']['key'] 	= 'index';
		$subMenu['index']['name'] = '帮助首页';
		
		$subMenu['log']['key'] 	= 'log';
		$subMenu['log']['name'] = '开发日志';

		$subMenu['plan']['key'] 	= 'plan';
		$subMenu['plan']['name'] = '开发计划';
		
		$subMenu['manual']['key'] 	= 'manual';
		$subMenu['manual']['name'] = '使用手册';
		
		$subMenu[ACTION_NAME]['ifCurrent'] = ' active';
		$this->assign('subMenu', $subMenu);
		$this->assign('ifCurrent_subMenu', $ifCurrent_subMenu);
	}
	
  /**
  * 页面内容
  */
  
  public function index(){
      $this->display();
  }
  
  public function log(){
      $this->pageTitle = "开发日志";
      $this->display();
  }
  
  public function plan(){
      $this->pageTitle = "开发计划";
      $this->display();
  }
  
  /**
  * 辅助方法
  */
  
  // ... 
}