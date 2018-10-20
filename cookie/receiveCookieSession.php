<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/13 0013
 * Time: 16:42
 */
session_start();
header("content-type:text/html;charset=utf-8");
//error_reporting(E_ALL & ~E_NOTICE);  //表示提示除去 E_NOTICE 之外的所有错误信息
echo $_SESSION['uid']."<br>";
// 读取COOKIE的用户名和密码的值即可


echo $_SESSION['name']."<br>";
echo $_SESSION['password'];


?>