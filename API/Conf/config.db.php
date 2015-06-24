<?php
// 添加数据库配置信息
$arrDB = array(
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'thinkdiscuz', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'admin123', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'pre_', // 数据库表前缀
    'DB_PARAMS'    =>    array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL)
);
/*
$_config['db']['1']['dbhost'] = 'db388300900.db.1and1.com';
$_config['db']['1']['dbuser'] = 'dbo388300900';
$_config['db']['1']['dbpw'] = 'admin888';
$_config['db']['1']['dbcharset'] = 'utf8';
$_config['db']['1']['pconnect'] = '0';
$_config['db']['1']['dbname'] = 'db388300900';
$_config['db']['1']['tablepre'] = 'pre_';
*/