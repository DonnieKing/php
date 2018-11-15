<?php
//封装创建文件方法和删除文件方法

/*
 * 文件创建操作
 * @param $filename //需要创建的文件名
 * @rerurn string 提示信息
 */

function create_file($filename)
{
    //检查文件是否存在，不存在则创建
    if(file_exists($filename))
    {
        return '文件已存在';
    }
    //检查目录是否存在，不存在则创建
    if(!file_exists(dirname($filename)))
    {
        mkdir(dirname($filename),0777,true);
    }
    //创建文件并判断
    if(touch($filename))
    {
        return '文件创建成功';
    }
    return '文件创建失败';
}
//var_dump(create_file('text6.txt'));
//var_dump(create_file('text/text.txt'));


/*
 * 文件创建操作
 * @param $filename //需要删除的文件名
 * @rerurn string 提示信息
 */

 function del_file($filename)
 {
     if(!file_exists($filename) || !is_writable($filename))
     {
         return '此文件不可删除';
     }
     if(unlink($filename))
     {
         return '文件删除成功';
     }
     return '文件删除失败！';
 }

//echo del_file('text');