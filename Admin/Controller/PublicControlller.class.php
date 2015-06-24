<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
	public function getItems() {
		$tableItem = M('pkg');
		$tableTemp = $table->order('create_time desc')->limit(10)->where('ifRecycle = 0')->select();
	}
}