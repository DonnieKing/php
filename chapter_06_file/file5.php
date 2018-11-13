<?php
//文件写入相关函数

//fopen打开文件
$file = fopen('text/text.txt','rb+');
//
// fwrite写入文件 写入文件内容 写入操作时会覆盖对应字符数量的字符(一个中文代表三个字符)
//var_dump(fwrite($file,'哈哈哈mm'));
//var_dump(fwrite($file,'php是世界上最好的语言！'));
// fwrite($file,''.PHP_EOL);
//var_dump(fwrite($file,'我是谁！'));
//fputs($file,'小龙女');
fputs($file,'我是杨过啊');


fclose($file);

//var_dump(fwrite($file,'我到底是谁？'));
