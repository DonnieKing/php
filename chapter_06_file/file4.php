<?php
//文件内容相关函数

header('content-type:image/jpeg'); //设置图片编码

//打开文件
$file = fopen('text/123.jpg','rb');
//读取文件内容
echo fread($file,filesize('text/123.jpg')).'<br>';

//ftell()获取文件指针当前所在位置
//echo '指针当前所在位置为：'.ftell($file).'<br>';
////reweind()将指针回到开始位置
//echo rewind($file).'<br>';
//echo '指针当前所在位置为：'.ftell($file).'<br>';


fclose($file);

//echo fread($file,filesize('text/text.txt')).'<br>';
