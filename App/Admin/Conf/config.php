<?php
return array(
	//'配置项'=>'配置值'
    //设置默认主题目录
    'DEFAULT_THEME'=>'Default',
//设置模版替换变量
    'TMPL_PARSE_STRING' => array(
        '__EASYUI__'=>__ROOT__.'/PUBLIC/'.MODULE_NAME.'/easyui',
        '__CSS__'=>__ROOT__.'/PUBLIC/'.MODULE_NAME.'/css',
        '__JS__'=>__ROOT__.'/PUBLIC/'.MODULE_NAME.'/js',
        '__IMG__'=>__ROOT__.'/PUBLIC/'.MODULE_NAME.'/img',
    ),
);