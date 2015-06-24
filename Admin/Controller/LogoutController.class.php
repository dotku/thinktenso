<?php
namespace Admin\Controller;
use Think\Controller;
class LogoutController extends Controller {
    public function index(){
        unset($_SESSION['member']);
        $this->success("登出成功, 欢迎下次再回来!",__ROOT__."/Admin/login",3);
    }
}