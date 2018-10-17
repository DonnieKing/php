<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17 0017
 * Time: 20:17
 */
header("content-type:text/html;charset=utf-8");
$string = file_get_contents('config.php');

foreach($_POST  as $key=>$val)
{
    //定义正则来查找内容，这里面的key为form表单里面的name
    $yx="/define\('$key','.*?'\);/";

    //将内容匹配成对应的key和修改的值
    $re="define('$key','$val');";

    //替换内容
    $string=preg_replace($yx,$re,$string);
}

file_put_contents('config.php',$string);
echo '写入成功';
?>