<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/10 0010
 * Time: 17:22
 */
header("content-type:text/html;charset=utf-8");

    setcookie("test","cookie");
    if($_COOKIE['test'] != "cookie")
    {
        echo "请打开浏览器的cookie支持，在浏览本页";
        exit();
    }
?>