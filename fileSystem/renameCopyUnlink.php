<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17 0017
 * Time: 17:23
 */
    header("content-type:text/html;charset=utf-8");

    $filename="test.txt";
    $filename2="wangchu.txt";
    rename($filename,$filename2); //重命名

    $filename3 = "newwangchu.txt";
    copy($filename2,$filename3);  //复制文件

    if(unlink($filename3))          //删除文件
    {
        echo "删除成功 $filename3\n";
    }
    else{
        echo "删除失败 $filename3\n";
    }
?>