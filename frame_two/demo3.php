<?php
/**
 * 测试模板引擎：Plates
 */

//使用Composer自动加载器
require __DIR__.'/vendor/autoload.php';

use League\Plates\Engine;

$template = new Engine(__DIR__.'/app/demo/view');

echo $template->render('index/welcome',['hello'=>'框架也可以这么玩！']);