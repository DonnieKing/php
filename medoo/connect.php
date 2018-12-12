<?php

//如果你使用php的依赖安装，可以使用以下方法自动载入
require __DIR__.'/vendor/autoload.php';

use \Medoo\Medoo as Db;

//数据库的参数配置
$config = [
    //必填
    'database_type'=>'mysql', //数据库类型
    'database_name'=>'php_edu',//默认的数据库类型
    'server'=>'127.0.0.1',//默认的数据库服务器
    'username'=>'root',
    'password'=>'123456',
    //可选
    'charset'=>'utf8',
    'post'=>'3306',
];

//实例化medoo类，创建db对象
$db = new Db($config);
//var_dump($db);
