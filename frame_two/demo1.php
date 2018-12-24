<?php


//
//function hello($name='小茗同学')
//{
//    echo '<h2>hello,'.$name.',你又调皮了！</h2>';
//}
//
////1、按名调用
//echo hello();
////2、系统内置回调函数call_user_func_array()
//call_user_func_array('hello',['小花同学']);


namespace HA;
class Demo
{
    public function hello($name='悟空')
    {
        echo '<h2>hello,'.$name.',你又调皮了！</h2>';
    }
    public static function getName($name='DonnieKing')
    {
        echo '<h2>听说我'.$name.'是静态方法？</h2>';
    }
}

//3.1调用类中的普通方法
//第一个参数 必须是数组：['类或对象','方法名称']
$demo = new Demo();
call_user_func_array([$demo,'hello'],[]);
call_user_func_array([(new demo()),'hello'],['八戒']);

//3.2调用类中的静态方法
call_user_func_array([__NAMESPACE__.'\Demo','getName'],[]);

/**
 * 从URL中解析出：控制器类和对应方法：$_SERVER['QUERY_STRING']
 * 再调用call_user_func_array(['控制器类'，'操作方法'],['参数列表'])
 */

//测试配置文件
$config = require __DIR__.'/pig/config.php';
echo $config['route']['action'];