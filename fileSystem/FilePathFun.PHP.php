<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17 0017
 * Time: 19:06
 */

header("content-type:text/html;charset=utf-8");
 $path_parts = pathinfo("D:\wamp\www\php\fileSystem/readfile.php");  // pathinfo ( string $路径) 功能：传入文件路径返回文件的各个组成部份
 echo '文件目录名：'.$path_parts['dirname'].'<br>';
echo '文件全名：'.$path_parts['basename']."<br />";
echo '文件扩展名：'.$path_parts['extension']."<br />";
echo '不包含扩展的文件名：'.$path_parts['filename']."<br />";

$url = 'http://username:password@hostname:9090/path?arg=value#anchor';
 var_dump(parse_url($url));          //mixed parse_url ( string $路径 ) 功能：将网址拆解成各个部份


$data=[
    'username' => 'wangchu',
    'area' => 'gaoping'
];
echo http_build_query($data);  //string http_build_query ( mixed $需要处理的数据) 功能：生成url 中的query字符串

?>