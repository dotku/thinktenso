<?php
namespace API\Controller;
use Think\Controller;
class DiscuzController extends Controller {
    public function index() {
		$json['msg'] = "Hello World!";
		echo json_encode($json);
    }
	
	public function ifUid() {
		
	}
	
	public function getMember() {
		$table = M('common_member');
		dump($table->limit(10)->select());
	}
}