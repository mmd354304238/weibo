<?php
return array(
    //'配置项'=>'配置值'
    'MODULE_ALLOW_LIST' => array('Home', 'Admin'),
    //设置默认目录
    'DEFAULT_MODULE' => 'Home',
    //Trace调试
    'SHOW_PAGE_TRACE' => true,

    'DB_TYPE'=>'pdo',
    'DB_USER'=>'root',
    'DB_PWD'=>'',
    'DB_PREFIX'=>'weibo_',
    'DB_DSN'=>'mysql:host=localhost;dbname=weibo;charset=UTF8',
);