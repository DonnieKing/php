<?php
//文件操作相关函数

/**
 * 文件操作相关的函数
 */

// touch 可以创一个文件，并且还可以修改一个已经存在的文件访问时间以及修改时间
var_dump(touch('text1.txt'));

// unlink 可以删除文件
//var_dump(unlink('text.txt'));
if (file_exists('text.txt')){
    if (unlink('text.txt')){
        echo '删除成功！';
    }else{
        echo '删除失败！';
    }
}else{
    echo "文件不存在！";
}

// rename 修改文件名 还可以进行文件的剪切操作
var_dump(rename('text1.txt','text/text.txt'));

// copy 拷贝文件 copy不仅仅可以拷贝本地的文件，还可以拷贝远程的文件
// 拷贝远程文件需要开启php.ini中的 allow_url_fopen = On
var_dump(copy('file1.php','text/file1.php'));
var_dump(copy('http://www.php.cn/','text/index.html'));
var_dump(copy('http://img.php.cn/upload/article/000/000/003/5a9675a3b2106284.jpg','text/123.jpg'));