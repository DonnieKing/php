<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17 0017
 * Time: 19:48
 */
header("content-type:text/html;charset=utf-8");

//追加方式打开文件
$fp = fopen('message.txt','a');

//设置时间
$time = time();

//得到用户名
$username=trim($_POST['username']);

//得到内容
$content=trim($_POST['content']);

//组合写入的字符串：内容和用户之间分开，使用$#
//行与行之间分开，使用&^
$string = $username.'$#'.$content.$time.'$^';

fwrite($fp,$string);

fclose($fp);

header('location:index.php');
?>