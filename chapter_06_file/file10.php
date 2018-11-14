<?php
/**
 * 目录常用函数
 */

//打开目录
$dir = opendir('text');

//readdir读取目录
while($row = readdir($dir))
{
    if($row!='.' && $row!='..')
    {
        echo $row.'<br>';
    }
}

//创建目录
//mkdir('create/text',0777,true);

//删除目录
//var_dump(rmdir('create/text'));


closedir($dir);
//
//while($row = readdir($dir))
//{
//    if($row!='.' && $row!='..')
//    {
//        echo $row.'<br>';
//    }
//}
