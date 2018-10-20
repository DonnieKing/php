<?php
ob_start();
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/20 0020
 * Time: 18:47
 */

//打开目标图片
$m = 'http://img.php.cn/upload/course/000/000/002/5833ebba648cf229.png';
$dst = imagecreatefrompng($m);

//打开Logo来源图片
$logo='http://img.php.cn/upload/course/000/000/002/5833ebe90cc11285.png';
$src = imagecreatefrompng($logo);

//得到目标图片的宽高
$dst_info = getimagesize($m );

//得到logo图片的宽高
$src_info = getimagesize($logo);

//放到最右下脚可得出图片水印图片需要开始的位置即：
//x点位置：需要大图的宽 - 小图的宽；
//y点位置：放大图的高 - 小图的高

$dst_x = $dst_info[0] - $src_info[0];

$dst_y = $dst_info[1] - $src_info[1];

//要将图片加在右下脚
imagecopymerge($dst, $src, $dst_x, $dst_y, 0, 0, $src_info[0], $src_info[1], 100);

header('Content-type:image/png');
imagepng($dst);

imagedestroy($dst);

imagedestroy($src);


?>