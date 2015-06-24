<?php
namespace Admin\Controller;
use Think\Controller;

class RouteController extends Controller {
  public function errorRedirect($sMsg) {
      $this->error($sMsg, __ROOT__."/Admin/login", 3);
  }
}