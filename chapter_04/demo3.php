<?php
/**
 * 类的自动加载
 */

//require 与 include 的功能一样，但出错时的处理机制不同
//inclde:没有导入成功，只给出警告，脚本仍然执行
//require:直接退出
//require = include + exit/die ;

//require './public/Car.php'; // class Car
//require './public/Mobile.php'; // class Mobile

//include './public/Car.php';
//include './public/Mobile.php';
//include_once:仅允许导入一次



//php标准库,提供了一个函数,可以向系统注册自动类加载函数
//自动加载器 ：该函数最主要的参数就是一个回调,回调可能是匿名的,参数只需要一个:要加载的类名
spl_autoload_register(function($className){
//    var_dump($className);
    include __Dir__.'/public/'.$className.'.php';
});


$car = new Car('丰田','汉兰达',350000);

$moblie = new Moblie('华为','Mate20 pro',8800);

echo $car->brand.$car->model.'的价格是'.$car->price.'<br>';

echo $moblie->brand.$moblie->model.'的价格是'.$moblie->price.'<br>';

//echo __Dir__;


//大家脑洞大开一下,如果要在当前脚本中引入10个类,50个类,甚至上百个类,怎么办?
//你可能会说,怎么会有这么多,肯定会的,随着项目复杂度的提升,这种情况很可能出现
//难道还是这样一个个的require吗?
//有没有这样一种机制,我只要在代码中直接使用这个类,那么系统就会自动的帮我加载到当前脚本中呢?
//这种想法,很大胆,但也现实
//好消息是:这种类自动加载机制是可以实现的~~
//坏消息是:这种类自动加载机制要借助命名空间,将类名与类文件的路径进行映射才可以实现
//又要学习新知识了,又增加了学习成本
//没办法,带给方便的同时,适当付出一些代价是值得的
//命名空间非常重要,我们会在以后的课程中详细介绍,目前先忽略