<?php

include "function.php";

$path = 'file';

$data = read_dir($path);

if(!$data)
{
    echo "<script>alert('无文件或目录')</script>";
}