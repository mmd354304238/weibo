<?php
return array(
	//设置模版替换变量
	'TMPL_PARSE_STRING' => array(
		'__CSS__'=>__ROOT__.'/Public/'.MODULE_NAME.'/css',
		'__JS__'=>__ROOT__.'/Public/'.MODULE_NAME.'/js',
		'__IMG__'=>__ROOT__.'/Public'.MODULE_NAME.'/img',
	),
	//COOKIE密钥
	'COOKIE_key'=>'www.ycku.com',
	//默认错误跳转对应的模板文件
	'TMPL_ACTION_ERROR' => 'Public/jump',
	//默认成功跳转对应的模板文件
	'TMPL_ACTION_SUCCESS' => 'Public/jump',
);