<?php
$arrThink = array(
	'DEFAULT_THEME'			=> 'base',
	'DEFAULT_MODULE'		=> 'Home',
	'MODULE_ALLOW_LIST'		=> array('Home', 'Admin', 'Panel', 'API'),
	'DEFAULT_CONTROLLER' 	=> 'Index',
	'URL_CASE_INSENSITIVE' 	=> true,
    'URL_HTML_SUFFIX' => '', // URL伪静态后缀设置 就可以了
);
include_once 'config.db.php';
return array_merge($arrThink, $arrDB);