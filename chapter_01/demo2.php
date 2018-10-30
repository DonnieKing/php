<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30 0030
 * Time: 23:14
 */

    //参数列表中声明的变量是局部变量
    function demo1($str1,$str2)
    {
         $str1 = func_get_arg(0);
         $str2 = func_get_arg(1);
         return $str1.'和'.$str2;
    }

    echo demo1("小龙女","杨过");

?>