<?php
$arrThink = array(
	'DEFAULT_THEME'			=> 'base',
	'DEFAULT_MODULE'		=> 'Home',
	'MODULE_ALLOW_LIST'		=> array('Home', 'Admin', 'Panel', 'API'),
	'DEFAULT_CONTROLLER' 	=> 'Index',
	'URL_CASE_INSENSITIVE' 	=> true,
    'URL_HTML_SUFFIX' => '', // URL伪静态后缀设置 就可以了
	
	'SUPER_PASS' => 'admin123'
);
include_once 'config.db.local.php';
include_once 'config.db.dev.php';
include_once 'config.db.prod.php';
include_once 'config.db.setting.php';
return array_merge($arrThink, $arrDB);