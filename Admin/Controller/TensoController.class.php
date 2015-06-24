<?php
namespace Admin\Controller;
use Think\Controller;
class TensoController extends Controller {
	public $ifCurrent = array();
	public $icKey = 'recycle';
	
	public function _initialize(){
		// 后台名称
		$table = M('site');
		$map['prty_name'] = 'site_name';
		$this->siteName = $table->where($map)->find()['prty_value'];
    
        $data = M('pkg');
        if(ACTION_NAME != 'index'){
            $this->icKey = ACTION_NAME;
        }

		$this->ifCurrent[$this->icKey] = ' active';
		$this->assign('ifCurrent', $this->ifCurrent);
		$this->assign('colTitle', '转运操作');
        
        // 子菜单
		$subMenu = array();
		$subMenu['receive']['key'] 	= 'receive';
		$subMenu['receive']['name'] = '收货登记';
		
		$subMenu['request']['key'] 	= 'request';
		$subMenu['request']['name'] = '发货确认';
		
		$subMenu['ship']['key'] 	= 'ship';
		$subMenu['ship']['name'] = '用户查询';
        
        $subMenu['recycle']['key'] 	= 'recycle';
		$subMenu['recycle']['name'] = '回收站('.$data->where('ifRecycle = 1')->count().')';
		

		$subMenu[$this->icKey]['ifCurrent'] = ' active';
		$this->assign('subMenu', $subMenu);
		$this->assign('ifCurrent_subMenu', $ifCurrent_subMenu);
	}
	
    public function index() {
        R('Tenso/recycle');
    }
    
    public function stock() {
        $table = M('pkg');
        $this->table = $table->order('pkg_create_time desc')->limit(1)->where('ifRecycle = 0')->select();
        $this->name = $_SESSION['username'];
		$this->display('Tenso/stock');
    }
	
	public function request() {
		$this->display();
	}
    
    public function ship() {
		$this->display();
	}
    
    public function recycle() {
        $tablePkg = M('pkg');
		$tableBox = M('box');
        if (!I('path.2')) {
            $this->tablePkg = $tablePkg->order('pkg_create_time desc')->limit(30)->where('ifRecycle = 1')->select();
			$this->tableBox = $tableBox->order('box_create_time desc')->limit(30)->where('ifRecycle = 1')->select();
            $this->display('Tenso/recycle');
        } else {
            $data['ifRecycle'] = 1;
			switch (I('path.2')) {
				case 'pkg': 
					$tablePkg->where('pkg_id='.I('path.3'))->save($data);
					echo '{"msg": "删除成功"}';
					break;
				case 'box':
					$tableBox->where('box_id="'.I('path.3').'"')->save($data);
					echo '{"msg": "删除成功"}';
					break;
				default:
					echo '{"msg": "删除失败，未知类型"}';
			}
        }
	}
    
    public function insert() {
        $table = M('pkg');
        if ($table->create()) {
           $result = $table->add();
           if ($result) {
               $this->success('操作成功');
           } else {
               $this->error('写入失败');
           }
        } else {
            $this->error($table->getError());
        }
    }
    
    public function restore() {
        if (I('path.2')) {
            $table = M('pkg');
            $row = $table->where('pkg_id='.I('path.2'))->select()[0];
            if ($row['ifRecycle'] == 0) {
                echo '{"msg": "已经还原"}'; 
            } else {
                $data['ifRecycle'] = 0;
                //dump($table->where('pkg_id='.I('path.2'))->select()[0]);
                $result = $table->where('pkg_id='.I('path.2'))->save($data);
                if ($result) {
                    echo '{"msg": "还原成功"}';
                } else {
                     echo '{"msg": "还原失败: '.$table->getError().'"}';
                }
            }
        } else {
             echo '{"msg": "还原失败: 未设定 pkg_id 值"}';
        }
    }
    
    public function delete() {
        $form = M('pkg');
        $form->delete(I('path.2'));
    }
}