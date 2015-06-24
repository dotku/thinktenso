<?php
	class Discuz{
		function Discuz(){
			require_once '../source/class/class_core.php';
			return discuz_core::instance();//以下代码为创建及初始化对象
			// $discuz->init();//以上是调用discuz公共执行类等核心代码
			// return $_G;
		}
		function getG(){
			return $_G;
		}
	}