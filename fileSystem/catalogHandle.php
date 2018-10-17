<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17 0017
 * Time: 18:36
 */
header("content-type:text/html;charset=utf-8");
//设置打开的目录是D盘
$dir = "d:/";

//判断是否是文件夹，是文件夹
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {


        //读取到最后返回false，停止循环
        while (($file = readdir($dh)) !== false) {
            echo "文件名为: $file : 文件的类型是: " . filetype($dir . $file) . "<br />";
        }

        closedir($dh);
    }
}

?>