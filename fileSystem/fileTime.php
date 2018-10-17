<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17 0017
 * Time: 18:08
 */
header("content-type:text/html;charset=utf-8");
    $filename='NoALike.txt';
    if(is_file($filename))
    {
        echo '创建的时间是：'.date("Y-m-d h:i:s",filectime($filename));
    }
    else{
        echo '文件不存在';
    }
    /*
     * 文件的时间函数
     *
        函数	功能说明
        filectime	文件创建时间
        filemtime	文件修改时间
        fileatime	文件上次访问时间

     */
?>