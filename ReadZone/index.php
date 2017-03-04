<?php
//应用入口文件

if(version_compare(PHP_VERSION, '5.3.0', '<')) die('require PHP > 5.3.0 !');	//检测PHP环境

define('APP_PATH', './Application/');

define('SITE_URL','http://localhost/ReadZone');

define('APP_DEBUG', True);

require './ThinkPHP/ThinkPHP.php';

?>