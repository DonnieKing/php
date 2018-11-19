<?php
/**
 * 配置文件
 */

include "function.php";

$path = 'file';

$data = read_dir($path);

if(!$data)
{
    echo "<script>alert('无文件或目录')</script>";
}


//判断点击操作
@$act = $_REQUEST['act'];
//接受创建的文件名
@$filename = $_REQUEST['filename'];

@$url = "index.php?path={$path}";