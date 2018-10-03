<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3 0003
 * Time: 18:13
 */
    //在您把用户信息存储到 PHP session 中之前，首先必须启动会话。session_start() 函数必须位于 <html> 标签之前
    session_start();
    $_SESSION['user'] = "wangchu";
    $_SESSION['age'] = 21;
    echo $_SESSION['user']."<br>";
    echo $_SESSION['age']."<br>";

    unset($_SESSION['user']);
    echo $_SESSION['user']."<br>";
    echo $_SESSION['age']."<br>";

    session_destroy();
    echo $_SESSION['age']."<br>";
?>