<?php
/**
 * 操作配置
 */
include "common.php ";

if($act == '创建文件')
{
//    var_dump($filename);
    $mes = create_file($path."/".$filename);
    alertMes($mes,$url);
}