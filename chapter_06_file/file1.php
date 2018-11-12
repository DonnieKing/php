<?php
/**
 * 文件信息相关的函数
 */
header('content-type:text/html;charset=utf-8');
date_default_timezone_set('Asia/Shanghai');

$fileName = 'text.txt';

// filetype() 获取文件的类型
echo filetype($fileName) . '<br>';
// filesize() 获取文件的大小
echo filesize($fileName) . '<br>';
// filectime() 获取文件创建的时间
echo '文件创建的时间为：' . date('Y-m-d H:i:s', filectime($fileName)) . '<br>';
// filemtime() 获取文件修改的时间
echo '文件修改的时间为：' . date('Y-m-d H:i:s', filemtime($fileName)) . '<br>';
// fileatime() 获取文件最后访问的时间
echo '文件最后访问的时间为：' . date('Y-m-d H:i:s', fileatime($fileName)) . '<br>';


//查询文件的权限 is_readable 检查文件的可读性
var_dump(is_readable('text1.txt'));
// 检查文件的可写性 is_writable()
var_dump(is_writable($fileName));
// 检查文件的可执行性 is_executable()
var_dump(is_executable('text.txt'));