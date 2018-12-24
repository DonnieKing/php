<?php
/**
 * 配置文件：适用于整个数组
 * 用php数组的方式返回
 */

return [

    //应用配置
    'app' => [
        //调试开关
        'debug' => true,
    ],

    //路由配置
    'route'=>[

        //默认模块
        'module' => 'admin',

        //默认控制器
         'controller' => 'Index',

        //默认操作
         'action' => 'index',
    ],

    //数据库配置
    'db' => [
        //数据库类型
        'database_type' => 'mysql',
        //数据库名称
        'database_name' => 'frame',
        //服务器
        'server' => '127.0.0.1',
        //数据库用户名
        'username' => 'root',
        //数据库密码
        'password' => '123456',

        //可选
        'charset' => 'utf8',
        'port' => '3306',
    ],

];