<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function _initialize(){
        $table = M('site');
        $this->siteName = $table->getByPrty_name('site_name')['prty_value'];
    }
    public function index() {
        $table = M('site');
        $dbAdminName = $table->getByPrty_name('admin_username');
        $dbAdminPass = $table->getByPrty_name('admin_password');
        
        if($_SESSION['member']['role'] == 'admin') {
            header("location:".__ROOT__."/Admin/Index");
        } elseif (!$_POST['username']) {
            //unset($_SESSION['member']);
            $this->display();
        } else {
            if(I('post.username') == $dbAdminName['prty_value'] && md5(I('post.password')) == $dbAdminPass['prty_value']) {
                //$data['username'] = $dbAdminName['prty_value'];
                //$data['nickname'] = $table->getByPrty_name('admin_nickname')['prty_value'];
                //session(array('member'=>$data,'expire'=>5));
                ini_set('session.cookie_lifetime', 0); // 可用 print_r(session_get_cookie_params()); 觀察
                ini_set('session.gc_maxlifetime', 5); // 可用 echo ini_get("session.gc_maxlifetime"); 觀察
                $_SESSION['member']['username'] = $dbAdminName['prty_value'];
                $_SESSION['member']['nickname'] = $table->getByPrty_name('admin_nickname')['prty_value'];
                $_SESSION['member']['role'] = 'admin';

                //header("location:".U("/Admin/Index"));
                $this->success("登录成功!");
                header("location:".__ROOT__."/Admin/Index/");
            } else {
                unset($_SESSION['member']);
                $this->error("用户名或密码错误"); 
                $this->display();

            }
        }
        /*
        $table = M('site');
        $falg = false;
        $dbAdminName = $table->getByPrty_name('admin_username');
        $dbAdminPass = $table->getByPrty_name('admin_password');
        if (I('post.username') != $dbAdminName['prty_value'] || md5(I('post.password')) != $dbAdminPass['prty_value']) {
            $flag = false;
            //$this->error("用户名或密码错误");
            $this->display();
        } else {
            $flag = true;
            echo "<script>window.location.href='..';</script>";
        }
        */
        
    }

}