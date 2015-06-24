<?php
namespace Home\Controller;
use Think\Controller;
class LabController extends Controller {
	public $sVar = "hello";
	public function _initialize() {
		$this->sVar = M('box')->select();
	}
    public function index(){
        dump($this->sVar);
    }
}