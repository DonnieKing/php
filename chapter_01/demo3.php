<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30 0030
 * Time: 23:26
 */

    //创建一个全局变量
    $thief = '小偷';

    function catching($thief)
    {
        //1.通过声明global关键字
        //global $thief;

        //2.系统会自动将一个全局变量注册到一个系统自定义变量中，[]中的变量不带$符号;
        //$thief = $GLOBALS['thief'];
        return isset($thief)?'抓住'.$thief:'没有抓住';
    }

    echo catching($thief);
    echo "<hr>";

    //3.传参数
    echo catching("强盗");
?>