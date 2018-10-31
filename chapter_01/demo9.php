<?php

//普通函数
function bigger($a,$b)
{
    return $a.'和'.$b.'中，较大的数是'.(($a>$b)?$a:$b);
}
function main($bigger)
{
    //这叫回调，函数注入
    return $bigger(54,36);
}

echo main('bigger').'<hr>';


//匿名函数完成函数注入
$bigger = function($a,$b)
{
    return $a.'和'.$b.'中，较大的数是'.(($a>$b)?$a:$b);
};
function main1($bigger)
{
    //这叫回调，函数注入
    return $bigger(22,15);
}
echo main1($bigger).'<hr>';


/**
 * php内置了两个双胞胎函数，用来执行回调
 * call_user_func(), call_user_func_array()
 */

echo call_user_func($bigger,65,99).'<hr>';
echo call_user_func('bigger',34,34.5).'<hr>';
echo call_user_func_array($bigger,[34,55 ]).'<hr>';


class demo123
{
    public static function getMethod()
    {
        return '方法是:'.__METHOD__;
    }
}
//静态成员是指使用 static 关键字修饰的成员
//静态成员不属于任何对象，只属于类！
//将要调用的类与内部的静态方法,放一个数组中,第一个参数是类名字符串(忽略大小写),第二个参数是静态方法名称字符串
echo call_user_func(['demo123','getMethod']).'<hr>';
//可以简化,直接将类名与方法用范围解析符写在一起
echo call_user_func('demo123::getMethod').'<hr>';
?>