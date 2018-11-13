<?php
//文件写入相关函数

//fopen打开文件
//$file = fopen('text/text.txt','rb+');
//
// fwrite写入文件 写入文件内容 写入操作时会覆盖对应字符数量的字符(一个中文代表三个字符)
//var_dump(fwrite($file,'哈哈哈mm'));
//var_dump(fwrite($file,'php是世界上最好的语言！'));
// fwrite($file,''.PHP_EOL);
//var_dump(fwrite($file,'我是谁！'));
//fputs($file,'小龙女');
//fputs($file,'我是杨过啊');


//fclose($file);
//关闭文件之后不能写入
//var_dump(fwrite($file,'我到底是谁？'));

// 使用w写入内容，如果文件不存在则会自动创建，如果存在则清空文件内容再写入
//$file = fopen('text/test.txt','wb+');
//echo ftell($file);
//var_dump(fwrite($file,'php是世界上最好的语言'));
//echo ftell($file).'<br>';
//rewind($file);
//echo ftell($file).'<br>';


$file = fopen('text/test.txt','ab+');

var_dump(fputs($file,'PHP中文网'));
fputs($file,'HTML');
echo '<br>';
//echo ftell($file);
rewind($file);
echo fread($file,filesize('text/test.txt'));

