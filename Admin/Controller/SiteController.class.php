<?php
namespace Admin\Controller;
use Think\Controller;

class SiteController extends Controller {
	public $ifCurrent = array();
	public $icKey = 'index';
	public function _initialize() {
    // 判断权限
    
    if (!isset($_SESSION['member'])) {
      header("location:".__ROOT__."/Admin/login");
    } else if ($_SESSION['member']['role'] != 'admin') {
      R('Route/errorRedirect', array('权限认证失败，请重新登录!'));
    }
    
    $table = M('site');
	$tableItem = M('pkg');
    $map['prty_name'] = 'site_name';
    $this->siteName = $table->where($map)->find()['prty_value'];

    $lifeTime = 3600;
    setcookie(session_name(), session_id(), time() + $lifeTime, "/");

		if (ACTION_NAME == 'index') {
			$this->icKey = 'stock';
		} else {
			$this->icKey = ACTION_NAME;
		}
		
		$this->ifCurrent[$this->icKey] = ' active';
		$this->assign('ifCurrent', $this->ifCurrent);
		$this->assign('colTitle', '后台操作');
		
		/*
		// 子菜单
		1. 仓库（多用户管理考虑、入库员与管理员看收益信息）
		2. 客户确认(告知 4 项、登记2项)
		3. 统计价格(包裹数量、邮寄方式、重量; 备注合箱，比如 3 = 2 + 1) * 自动邮件发送
		4. 收钱
		5. 通知仓库发货：
		（包裹编号
			用户信息：UID、姓名、手机、邮编、地址
			商品信息：商品内容（商品名称、数量、价格（总价、单价））、邮寄方式
			邮寄信息：合箱内容
		）
		6. 库存填写发货信息
		7. 总管理确认发货

		统计（后期加入）
		*/
		$subMenu = array();
		$subMenu['stock']['key'] 	= 'stock';
		$subMenu['stock']['name'] = '入库登记('.$tableItem->where('ifRecycle = 0 AND NOT pkg_status = "final"')->count().')';
		
		$subMenu['request']['key'] 	= 'request';
		$subMenu['request']['name'] = '客户处理('.$tableItem->where('ifRecycle = 0 AND pkg_status = "request"')->count().')';
		
		$subMenu['payment']['key'] 	= 'payment';
		$subMenu['payment']['name'] = '支付收款('.$tableItem->where('ifRecycle = 0 AND pkg_status = "payment"')->count().')';
		
		$subMenu['shipping']['key'] 	= 'shipping';
		$subMenu['shipping']['name'] = '发货操作('.$tableItem->where('ifRecycle = 0 AND pkg_status = "shipping"')->count().')';
        
		$subMenu['confirm']['key'] 	= 'confirm';
		$subMenu['confirm']['name'] = '操作确认('.$tableItem->where('ifRecycle = 0 AND pkg_status = "confirm"')->count().')';
		
		$subMenu['final']['key'] 	= 'final';
		$subMenu['final']['name'] = '结单处理('.$tableItem->where('ifRecycle = 0 AND pkg_status = "final"')->count().')';
		
		$subMenu['recycle']['key'] 	= 'recycle';
		$subMenu['recycle']['name'] = '回收管理('.$tableItem->where('ifRecycle = 1')->count().')';

		$subMenu[$this->icKey]['ifCurrent'] = ' active';
		$this->assign('subMenu', $subMenu);
		$this->assign('ifCurrent_subMenu', $ifCurrent_subMenu);
		$this->name = $_SESSION['username'];
	}
	
    public function index() {
        R("Index/stock");
    }
	
	public function siteSetting(){
        $table = M('site');
        
        // 处理更新请求
        if($_POST['site_name']){
            foreach($_POST as $key => $val){
                $data['prty_value'] = $val;
                $map['prty_name'] = $key;
                $table->where($map)->save($data);
            }
        }
        
        // 显示内容
        $map['prty_name'] = array('neq','admin_password');
        $this->table = $table->where($map)->select();
        $this->_initialize();
        $this->display();
    }
	
    public function passReset(){
        $table = M('site');
        
        // 处理更新请求
        if($_POST['site_name']){
            foreach($_POST as $key => $val){
                $data['prty_value'] = $val;
                $map['prty_name'] = $key;
                $table->where($map)->save($data);
            }
        }
        
        // 显示内容
        $map['prty_name'] = 'admin_password';
        $this->table = $table->where($map)->select();
        $this->_initialize();
        $this->display();
    }
	
}