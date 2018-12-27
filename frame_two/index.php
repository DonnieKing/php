<?php
/**
 * 框架入口文件
 */

//加载composer自动加载器
require __DIR__.'/vendor/autoload.php';

//加载框架基础类
require __DIR__.'/pig/Base.php';

//定义根目录
define('ROOT_PATH',__DIR__.'/');

//导入配置文件
$config = require __DIR__.'/pig/config.php';

//获取URL中的查询字符串
$queryStr = $_SERVER['QUERY_STRING'];

//启动框架
(new \pig\Base($config,$queryStr))->run();