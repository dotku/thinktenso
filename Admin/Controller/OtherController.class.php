<?php
namespace Admin\Controller;
use Think\Controller;
class OtherController extends Controller {
	public $ifCurrent = array();
	public $icKey = 'index';
	
	public function _initialize(){
    // 判断权限
    if (!isset($_SESSION['member'])) {
      header("location:".U('/login'));
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
		$this->assign('colTitle', '其他操作');
		
		// 子菜单
		$subMenu = array();
		$subMenu['index']['key'] 	= 'index';
		$subMenu['index']['name'] = '其他首页';

		$subMenu[ACTION_NAME]['ifCurrent'] = ' active';
		$this->assign('subMenu', $subMenu);
		$this->assign('ifCurrent_subMenu', $ifCurrent_subMenu);
	}
	
    public function index(){
        $this->display();
    }
	
	public function fluid(){
		$this->display();
	}
}