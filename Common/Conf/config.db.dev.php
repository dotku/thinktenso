<?php
// 添加数据库配置信息
$arrDBDev = array(
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'cnsanjos_tensoJapan', // 数据库名
    'DB_USER'   => 'cnsanjos_tyktj', // 用户名
    'DB_PWD'    => 'rock8196018', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'tns_', // 数据库表前缀
    'DB_PARAMS'    =>    array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL)
);