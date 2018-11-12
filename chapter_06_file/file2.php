<?php
//文件路径相关函数

$fileName = 'text.txt';
//pathinfo()返回文件的路径信息
var_dump(pathinfo($fileName));

//给pathinfo加上第二个参数PATHINFO_DIRNAME就可以获取文件的目录部分
echo pathinfo($fileName,PATHINFO_DIRNAME).'<br>';
//dirname可以直接获取文件的目录部分
echo dirname($fileName).'<br>';

//给pathinfo加上第二个参数PATHINFO_BASENAME就可以获取文件名
echo pathinfo($fileName,PATHINFO_BASENAME).'<br>';
//basename可以直接获取文件的目录部分
echo basename($fileName).'<br>';

//给pathinfo加上第二个参数PATHINFO_EXTENSION就可以获取文件后缀名
echo pathinfo($fileName,PATHINFO_EXTENSION).'<br>';

 if(file_exists($fileName))
 {
     echo '文件存在';
 }
 else{
     echo '文件不存在';
 }

