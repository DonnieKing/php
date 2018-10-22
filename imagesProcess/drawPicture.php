<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/20 0020
 * Time: 8:30
 */
 //header('content-type:text/html;charset=utf-8;');
    //创建图片
    $img = imagecreate(500,500);

    //图片创建完成我们需要向图片资源填加颜色，需要使用到函数
    //$颜色变量 = imagecolorallocate ( resource $图片资源 , int $红 , int $绿 , int $蓝 )
    $red = imagecolorallocate($img,255,0,0);
    $green = imagecolorallocate($img,0,255,0);
    $blue = imagecolorallocate($img,0,0,255);
    $pur = imagecolorallocate($img, 255, 0, 255);
    $yellow = imagecolorallocate($img, 121, 72, 0);
    $rand = imagecolorallocate($img,44,50,49);
    //将颜色添加到背景进行填充
    //imagefilledrectangle ( resource $图片资源 , int $点1x轴, int $点1y轴 , int $点2x轴 , int $点2y轴 , int $color )
    imagefilledrectangle($img,0,0,500,500,$green);

    //画对角线
    //imageline($img, 0, 0, 500, 500, $red)
    imageline($img,0,0,500,500,$red);
    imageline($img,0,500,500,0,$blue);

     //画圆
    //bool imagefilledellipse ( resource $图片资源 , int $圆心x , int $圆心y , int $圆的宽 , int $圆的高 , int $圆的颜色 )
    imagefilledellipse($img,250,250,200,200,$yellow);

    //圆中间画矩形
    imagefilledrectangle($img,200,200,300,300,$blue);

    // 添加字符水印  imagestring
     // 添加文字水印
        $font = 'D:\wamp64\www\php\imagesProcess\FZLTCXHJW.TTF';  //最好选用是中文的字体，要不然依然会出现乱码
        $text = "我是王楚";
        imagettftext($img,30,0,100,100,$rand,$font,$text);
    //保存图片，图片名为haha.jpg
    imagejpeg($img,'haha.jpg');

    //输出照片
    echo "<img src='haha.jpg' />";

    //销毁资源
    imagedestroy($img);
?>