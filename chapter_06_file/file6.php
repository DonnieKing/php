<?php
//文件读取其他函数

$file = fopen('text/test.txt','rb+');

// fgetc 从文件中获取一个字符 fgets 从文件中获取一行字符 fgetss 从文件中获取一行字符并且过滤掉html字符
echo fgetc($file).'<br>';

echo fgets($file).'<br>';

echo fgetss($file).'<br>';

rewind($file);
//feof() 函数检测是否已到达文件末尾 (eof)。
//如果文件指针到了 EOF 或者出错时则返回 TRUE，否则返回一个错误（包括 socket 超时），其它情况则返回 FALSE。
while(!feof($file)){
//    echo fgetc($file);
//    echo fgets($file);
    echo fgetss($file).'<br>';
}
// ftruncate 截取文件内容为指定长度
//var_dump(ftruncate($file,10));