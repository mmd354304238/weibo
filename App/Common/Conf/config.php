<?php
return array(
	//设置可访问目录
	'MODULE_ALLOW_LIST'=>array('Home','Admin'),
	//设置默认目录
	'DEFAULT_MODULE'=>'Home',
	//设置模版后缀
	'TMPL_TEMPLATE_SUFFIX'=>'.tpl',
	//设置默认主题目录
	'DEFAULT_THEME'=>'Default',
    'SHOW_PAGE_TRACE' =>true,
	//数据库配置
	'DB_TYPE'=>'pdo',
	'DB_USER'=>'root',
	'DB_PWD'=>'',
	'DB_PREFIX'=>'weibo_',
	'DB_DSN'=>'mysql:host=localhost;dbname=weibo;charset=UTF8',
	//URL模式
	'URL_MODEL'=>2,
);