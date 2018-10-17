<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17 0017
 * Time: 17:10
 */
error_reporting(E_ALL & ~E_NOTICE);  //表示提示除去 E_NOTICE 之外的所有错误信息
header("content-type:text/html;charset=utf-8");
    $handle = tmpfile();                             //创建临时文件
    $fp = fwrite($handle,"写入临时文件");
    fclose($handle);
    echo '向临时文件中写入了'.$fp.'个字节';
?>