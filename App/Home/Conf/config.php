<?php
return array(
	//'配置项'=>'配置值'
    'DEFAULT_THEME'=>'Default',
    //设置模版替换变量
    'TMPL_PARSE_STRING' => array(
        '__CSS__'=>__ROOT__.'/Public/'.MODULE_NAME.'/css',
        '__JS__'=>__ROOT__.'/Public/'.MODULE_NAME.'/js',
        '__IMG__'=>__ROOT__.'/Public/'.MODULE_NAME.'/img',
    ),
);