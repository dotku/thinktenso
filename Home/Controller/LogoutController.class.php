<?php
namespace Home\Controller;
use Think\Controller;
class LogoutController extends Controller {
    public function index(){
        unset($_SESSION['member']);
        dump(!isset($_SESSION['member']));
        // $this->success("登出成功, 欢迎下次再回来!","Admin",3);
    }
}