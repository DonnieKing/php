<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/20 0020
 * Time: 12:01
 */
header('content-type:text/html;charset=utf-8;');
error_reporting(E_ALL & ~E_NOTICE);  //表示提示除去 E_NOTICE 之外的所有错误信息
//打开来源图片
$image = imagecreatefrompng('mmm.png');


//定义百分比，缩放到0.1大小
$percent = 0.5;


// 将图片宽高获取到
list($width, $height) = getimagesize('mmm.png');

//设置新的缩放的宽高
$new_width = $width * $percent;
$new_height = $height * $percent;

//创建新图片
$new_image = imagecreatetruecolor($new_width, $new_height);

//将原图$image按照指定的宽高，复制到$new_image指定的宽高大小中
imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

header('content-type:image/jpeg');
imagejpeg($new_image);
?>