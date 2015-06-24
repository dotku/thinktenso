<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
	public $ifCurrent = array();
	public $icKey = 'index';
	public $subMenu = array();
	public $modleSite;
	public $modlePkg;
	public $modleBox;
	public $modleGoods;
	
	public $sVar ="string";

	public function _initialize() {
		// 管理权限判断
		if (!isset($_SESSION['member'])) {
		  header("location:".__ROOT__."/Admin/login");
		} else if ($_SESSION['member']['role'] != 'admin') {
		  R('Route/errorRedirect', array('权限认证失败，请重新登录!'));
		}
    
		$this->modleSite = M('site');
		$this->modlePkg = M('pkg');
		$this->modleBox = M('box');
		$this->modleGoods = M('goods');
		
		$map['prty_name'] = 'site_name';
		$this->siteName = $this->modleSite->where($map)->find()['prty_value'];

		$lifeTime = 3600;
		setcookie(session_name(), session_id(), time() + $lifeTime, "/");
		
		// 侧边栏处理
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
		$this->assign('subMenu', $this->genSubmenu());
		$this->assign('ifCurrent_subMenu', $ifCurrent_subMenu);
		$this->name = $_SESSION['username'];
	}
	
    public function index() {
        header("location:".__ROOT__."/Admin/Index/stock");
    }
	
	public function stock() {
		if ($_POST['pkg_status'] == "request") {
			$arrKeys = array(
				'pkg_id', 
				'pkg_orig_number', 
				'user_id',
				'pkg_weight',
				'clerk_name'
			);
			foreach ($arrKeys as $key) {
				$data[$key] = $_POST[$key];
			}
			$this->modlePkg->add($data);
		}
		$lastRow = $this->modlePkg->order('pkg_id desc')->limit(1)->find();
		$this->newId = max($lastRow['pkg_id'] + 1, (int) date('Ymd')."001");
        $this->tablePkg = $this->modlePkg->order('pkg_create_time desc')->limit(10)->where('ifRecycle = 0')->select();
		$this->tableBox = $this->modleBox->order('box_create_time desc')->limit(10)->where('ifRecycle = 0')->select();
		$this->tableGoods = $this->modleGoods->order('goods_create_time desc')->limit(10)->select();
		$this->display();
	}
    
	public function request() {
		switch ($_POST['pkg_status']) {
			case 'merge':
				// 处理 pkg
				$arrKeys = array(
					'pkg_id', 
					'pkg_status'
				);
				foreach ($arrKeys as $key) {
					$data[$key] = $_POST[$key];
				}
				$this->modlePkg->where('pkg_id='.$data['pkg_id'])->save($data);
				
				// 处理 goods
				foreach ($_POST['goods_title'] as $key => $val) {
					$rowGoods = array();
					$rowGoods['goods_title'] = $val;
					$rowGoods['goods_num'] = $_POST['goods_num'][$key];
					$rowGoods['pkg_id'] = $_POST['pkg_id'];
					$this->modleGoods->add($rowGoods);
				}
			case 'payment': 
				$arrKeys = array(
					'pkg_id', 
					'pkg_status',
					'pkg_ship_receiver',
					'pkg_ship_address',
					'pkg_ship_phone',
					'pkg_ship_way',
					'pkg_ship_fee',
					'pkg_ship_ifNotice',
					'pkg_ship_email',
					'pkg_ship_notice'
				);
				foreach ($arrKeys as $key) {
					$data[$key] = $_POST[$key];
				}
				$this->modlePkg->where('pkg_id='.$data['pkg_id'])->save($data);
			default: 
				// do nothing
		}
		
		// update menu and gen content
		$subMenu = $this->genSubmenu();
		$this->tablePkg = $this->modlePkg->order('pkg_create_time desc')->limit(10)->where('ifRecycle = 0 AND pkg_status = "request"')->select();
		$this->display();
	}
	
	// 合箱处理
	public function merge() {
		$lastBox = $this->modleBox->order('box_id desc')->limit(1)->find();
		$this->newID_box = 'M'.max(substr($lastBox['box_id'], 1) +1, (int) date('ymd')."01");
		if (stristr(I('path.2'), 'newbox')) {
			$data['box_id'] = $this->newID_box;
			$data['box_status'] = 'merge';
			$this->modleBox->add($data);
		}
		$sWhere = 'ifRecycle = 0 AND pkg_status = "merge"';
		$this->tablePkg = $this->modlePkg->order('pkg_create_time desc')->limit(10)->where($sWhere)->select();
		$sWhereBox = 'ifRecycle = 0 AND box_status = "merge"';
		$this->tableBox = $this->modleBox->order('box_create_time desc')->limit(10)->where($sWhereBox)->select();
		$this->display();
		dump($this->tableBox);
	}
	
	public function payment() {
		if ($_POST['pkg_status'] == "shipping") {
			$arrKeys = array(
				'pkg_id',
				'pkg_status'
			);
			foreach ($arrKeys as $key) {
				$data[$key] = $_POST[$key];
			}
			$this->modlePkg->where('pkg_id='.$data['pkg_id'])->save($data);
		}
		$subMenu = $this->genSubmenu();
		$this->tablePkg = $this->modlePkg->order('pkg_create_time desc')->limit(10)->where('ifRecycle = 0 AND pkg_status = "payment"')->select();
		$this->tableBox = $this->modleBox->order('box_create_time desc')->limit(10)->where('ifRecycle = 0 AND box_status = "payment"')->select();
		
		$this->rowPkg = $this->tablePkg[0];
		$this->rowBox = $this->tableBox[0];
		$this->display();
		dump($this->sVar);
	}
	
	public function shipping() {

		if ($_POST['pkg_status'] == "confirm") {
			$arrKeys = array(
				'pkg_id',
				'pkg_status'
			);
			foreach ($arrKeys as $key) {
				$data[$key] = $_POST[$key];
			}
			$this->modlePkg->where('pkg_id='.$data['pkg_id'])->save($data);
		}
		$this->tablePkg = $this->modlePkg->order('pkg_create_time desc')->limit(10)->where('ifRecycle = 0 AND pkg_status = "payment"')->select();
		$this->tableBox = $this->modleBox->order('box_create_time desc')->limit(10)->where('ifRecycle = 0 AND box_status = "payment"')->select();
		
		$this->rowPkg = $this->tablePkg[0];
		$this->rowBox = $this->tableBox[0];
		
		$this->display();
	}
	
	public function confirm() {
		$tablePkg = M('pkg');
		if ($_POST['pkg_status'] == "receipt") {
			$arrKeys = array(
				'pkg_id',
				'pkg_status'
			);
			foreach ($arrKeys as $key) {
				$data[$key] = $_POST[$key];
			}
			$this->modlePkg->where('pkg_id='.$data['pkg_id'])->save($data);
		}
		$this->table = $this->modlePkg->order('pkg_create_time desc')->limit(10)->where('ifRecycle = 0 AND pkg_status = "confirm"')->select();
		$this->display();
	}
	
	public function receipt() {
		if ($_POST['pkg_status'] == "confirm") {
			$arrKeys = array(
				'pkg_id',
				'pkg_status'
			);
			foreach ($arrKeys as $key) {
				$data[$key] = $_POST[$key];
			}
			$this->modlePkg->where('pkg_id='.$data['pkg_id'])->save($data);
		}
		$this->table = $this->modlePkg->order('pkg_create_time desc')->limit(10)->where('ifRecycle = 0 AND pkg_status = "receipt"')->select();
		$this->display();
	}
	
	public function recycle() {
		header("location:".__ROOT__."/Admin/Tenso/recycle");
	}
	
	/**
	* 辅助函数
	*/
	public function genSubmenu() {
		$this->modlePkg = M('pkg');
		$subMenu = array();
		
		$subMenu['stock']['key'] 	= 'stock';
		$subMenu['stock']['name'] = '货物入库登记('.$this->modlePkg->where('ifRecycle = 0 AND NOT pkg_status = "final"')->count().')';

		$subMenu['request']['key'] 	= 'request';
		$subMenu['request']['name'] = '客户信息处理('.$this->modlePkg->where('ifRecycle = 0 AND pkg_status = "request"')->count().')';
		
		$subMenu['merge']['key'] 	= 'merge';
		$subMenu['merge']['name'] = '合箱请求处理('.$this->modlePkg->where('ifRecycle = 0 AND pkg_status = "merge"')->count().')';

		$subMenu['payment']['key'] 	= 'payment';
		$subMenu['payment']['name'] = '确认支付收款('.$this->modlePkg->where('ifRecycle = 0 AND pkg_status = "payment"')->count().')';

		$subMenu['shipping']['key'] 	= 'shipping';
		$subMenu['shipping']['name'] = '登记发货信息('.$this->modlePkg->where('ifRecycle = 0 AND pkg_status = "shipping"')->count().')';

		$subMenu['confirm']['key'] 	= 'confirm';
		$subMenu['confirm']['name'] = '通知客户查收('.$this->modlePkg->where('ifRecycle = 0 AND pkg_status = "confirm"')->count().')';

		$subMenu['receipt']['key'] 	= 'receipt';
		$subMenu['receipt']['name'] = '转运结单管理('.$this->modlePkg->where('ifRecycle = 0 AND pkg_status = "receipt"')->count().')';

		$subMenu['recycle']['key'] 	= 'recycle';
		$subMenu['recycle']['name'] = '记录回收站('.$this->modlePkg->where('ifRecycle = 1')->count().')';
		
		$subMenu[$this->icKey]['ifCurrent'] = ' active';
		
		return $subMenu;
	}
}