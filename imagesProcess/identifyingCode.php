<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/20 0020
 * Time: 9:22
 */
header('content-type:text/html;charset=utf-8;');
error_reporting(E_ALL & ~E_NOTICE);  //表示提示除去 E_NOTICE 之外的所有错误信息
check_code();
    function check_code($width=100,$height=50,$num=4,$type='jpeg'){

        $img =  imagecreate($width,$height);
         $string ='';

          for($i=0;$i<=$num;$i++)
          {
              $rand = mt_rand(0,2);
              switch($rand)
              {
                  case 0:
                      $ascii = mt_rand(48,57); //0-9
                      break;
                  case 1:
                      $ascii = mt_rand(65,90); //A-Z
                      break;
                  case 2:
                      $ascii = mt_rand(97,122); //a-z
                      break;
              }
              $string  .= sprintf('%c',$ascii); //把4个字符累加起来
          }

            //背景颜色
            imagefilledrectangle($img,0,0,$width,$height,randBg($img));

           //画干扰元素
           // 我们可以随机的在图片中画上50个像素点。最小的位置为0，0。最大的位置为最大的宽或者最大的高。
           //然后使用mt_rand(0,最大宽)、mt_rand(0,最大高)。再使用randPix针对我们创建的画布来分配颜色。
              //bool imagesetpixel ( resource $image , int $x , int $y , int $color )   在指定的坐标处绘制像素。
            for($i=0;$i<50;$i++){
                imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),randPix($img));
            }

             //写字
            //PHP imagechar - 写出横向字符
        //bool imagechar ( resource $image , int $font , int $x , int $y , string $c , int $color )
        //imagechar() 将字符串 c 的第一个字符画在 image 指定的图像中，其左上角位于 x，y（图像左上角为 0, 0），颜色为 color。如果 font 是 1，2，3，4 或 5，则使用内置的字体（更大的数字对应于更大的字体）
            for($i=0;$i<$num;$i++){
                $x = floor($width/$num)*$i ;
                $y =   mt_rand(0,$height-15);
                imagechar($img,5,$x,$y,$string[$i],randPix($img));
            }

        //imagejpeg
        $func = 'image' . $type;
        $header = 'Content-type:image/' . $type;
        if (function_exists($func)) {
            header($header);
            $func($img);
        } else {
            echo '图片类型不支持';
        }
        imagedestroy($img);
        return $string;
    }


//浅色的背景
// 0-120 低数值是深色系。
//130 - 255 通常为浅色系。RGB
function randBg($img){
        return imagecolorallocate($img,mt_rand(130,255),mt_rand(130,255),mt_rand(130,255));
}
//深色的字或者点这些干扰元素
    function randPix($img){
        return imagecolorallocate($img,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
    }
?>