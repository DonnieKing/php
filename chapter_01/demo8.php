<?php
/**
 * 参数
 * 1. 函数的强大功能离不开外部参数的支持
 * 2. 写在函数名称后面的圆括号内的参数仅仅是占位符,这点一定要当心,无参并不代表没有传参
 * 3. 参数类型没有限制,但强烈建议复合类型的参数必须添加类型提示:array/object,标量可加可不加
 * 4. 如果有默认参数,一定要把默认参数写在必选参数的后面
 */

//1必选参数
function demo1($a,$b)
{
    return $a+$b;
}

echo demo1(15,20), '<hr>';

//2.可选参数: 当参数有默认值时
//有默认值的参数写在最后,没问题
// function demo2($a,$b=10)

//如果将有默认值的参数写在前面就会有问题
function demo2($b=10,$a)
{
    return $a+$b;
}

// echo demo2(15), '<br>';
// 第一个参数有默认值,如果不给第一个值传参,第二个参数就无法获取
// echo demo2(15), '<br>';


//3.无参数，参数列表本质是仅仅是占位符而已
function demo3()
{
    //用函数的方式来获取参数列表
    $a = func_get_arg(0);
    $b = func_get_arg(1);

    $num = func_num_args();

    $res =  print_r(func_get_args(),true);

    //return "$a+$b".'='.($a+$b);
    //return '当前函数参数的个数有'.$num.'个';
    return "<pre>".$res;
}

echo demo3(12,11,11,'php','DonnieKing');
?>