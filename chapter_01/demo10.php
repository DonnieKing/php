<?php
//闭包函数生效的两个条件
//1.必须先定义一个匿名函数   2、必须要执行一次匿名函数生成闭包函数


//匿名函数
$demo1 = function($name){
    return $name.'最爱的人是：赵敏';
};
//调用匿名函数
echo $demo1('张无忌').'<hr>';

//匿名函数也有自己的作用域，除了传参，还有什么方式引入外部变量
$belle='周芷若';
$belle='凤姐';
$demo2 = function($name) use ($belle)
{
    return $name.'最爱的人是：'.$belle.'<hr>';
};
echo $demo2('张无忌');

//首先，我们先给闭包下一个简单的定义: 将匿名函数当作一个普通变量,在另一个函数中调用它,就会形成一个闭包,这时,匿名函数的功能,
//就是生成一个闭包,所以,现在把匿名函数,直接称为: 闭包函数, 也是没问题的。

//匿名函数其实就是一个普通的变量  1、普通变量  2、函数参数  3、函数返回值（本质还是一个局部变量）
//1、匿名函数当作局部变量来使用（闭包）
$fun1 = function(){
    $name = '无忌哥哥';
    $test = function () use ($name)
    {
        return $name.'我被另一个函数包围住了，快来救我'.'<hr>';
    };
    //调用，必须要执行一次，才能形成闭包
    return $test();
};
echo $fun1();


//2.将匿名函数当作函数参数来使用
$name='无忌哥哥';
$test = function () use ($name)
{
    return $name.'我又被当作参数了，你还要我吗'.'<hr>';
};
$fun2 = function(callable $test)
{
    return $test() ;
};
echo $fun2($test);


//3.将匿名函数当作函数的返回值来使用
$fun3 = function(){
    $name = '无忌哥哥';
    //在函数中声明一个匿名函数
    $test = function () use ($name)
    {
        return $name.'我又被当作返回值了，真倒霉'.'<hr>';
    };
    //return $test();
    return $test;   //实际上返回的是一个函数的声明，或者匿名函数的定义
};
echo $fun3()();

?>