<?php
//封装创建文件方法和删除文件方法

/**
 * 文件创建操作
 * @param $filename //需要创建的文件名
 * @rerurn string  //提示信息
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


/**
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



/**
 * 文件复制操作
 * @param $filename //需要复制的文件名
 * @param $dest   // 目标目录或文件夹
 * @rerurn string 提示信息
 */

 function copy_file($filename,$dest)
 {
     //查询文件是否存在并查询是否可写
     if(!file_exists($filename) || !is_writable($filename))
     {
         return '此文件不可复制';
     }
     //查询目录是否存在
     if(!is_dir($dest))
     {
         mkdir($dest,0777,true);
     }
     //拼接要拷贝到的目录和文件名
     $destname = $dest . "/" . basename($filename);
     //查询目标目录是否有此文件
     if(file_exists($destname))
     {
         return '该目录下此文件已存在';
     }
     //查询并验证
     if(copy($filename,$destname))
     {
         return '文件复制成功';
     }
     return '文件复制失败';
 }

// echo copy_file('text6.txt','text1');


/**
 * 文件重命名操作
 * @param $oldname //需要重命名的文件名
 * @param $newname //目标文件名
 * @reurn string   //提示信息
 * // rename 修改文件名 还可以进行文件的剪切操作
 */

 function rename_file($oldname,$newname)
 {
     //查询文件是否存在并查询是否可写
     if(!file_exists($oldname) || !is_writable($oldname))
     {
         return '此文件不可重命名';
     }
     //获取当前文件的目录
     $path = dirname($oldname);
     //拼接重命名之后的路径以及文件名
     $destname = $path."/".$newname;
     //判断重命名的文件名是否存在
     if(file_exists($destname))
     {
         return '此文件名已存在';
     }
     //重命名操作并验证
     if(rename($oldname,$newname))
     {
         return '文件重命名成功';
     }
     return '文件重命名失败';
 }

// echo rename_file('text5.txt','text/text5.txt');