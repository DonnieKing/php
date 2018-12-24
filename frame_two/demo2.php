<?php
/**
 * 数据库框架
 */

/**
 * Composer准备工作
 * 1、加载Composer类库自动加载器：vendor/autoload.php
 * 2、配置一下Medoo
 */

//使用composer自动加载器
require __DIR__.'/vendor/autoload.php';


$config = require __DIR__.'/pig/config.php';

use \Medoo\Medoo;

$db = new Medoo($config['db']);

$rows = $db->select('user',['id','name','dept','art','email']);

echo '<pre>'.print_r($rows,true).'</pre>';