<?php

//1.标准类型，单值类型，一个变量名对应一个值
//字符串
$name='小龙女';
//2.整数
$age=20;
//浮点数
$salary=10000.1;
//布尔型
$isMarrid=false;

echo gettype($isMarrid);
echo "<hr>";
echo "姓名：",$name,'<br>年龄：',$age,'<br>工资：',$salary,'<br>婚否：',$isMarrid?'没机会了':'还有机会';
echo "<hr>";

//2.符合类型，数组array，对象object
//数组：通过索引来访问
$arts=['木兰回射','浪迹天涯','举案齐眉','锦笔生花'];
echo '玉女剑法第一招：'.$arts[0].'<br>';
echo '玉女剑法最后一招：'.$arts[count($arts)-1].'<br>';
//echo count($arts);
//count($arts)-1;   //数组最后一个元素的索引
echo '<hr>';

//对象：对象是内部封装了属性和方法的抽象类型，属性相当于变量，方法相当于函数
//定义一个对象变量
$belle = new stdClass();

$belle->name='小龙女';
$belle->age=20;
$belle->salary=10000.1;
$belle->isMarrid=false;
echo "姓名：",$belle->name,'<br>年龄：',$belle->age,'<br>工资：',$belle->salary,'<br>婚否：',$belle->isMarrid?'没机会了':'还有机会'.'<br>';

$belle->cooking= function($food){
    return '小龙女会做'.$food;
};

echo ($belle->cooking)('红烧猪蹄').'<br>';  //php7才能用
echo call_user_func($belle->cooking,'红烧大翅膀');


//3.特殊类型 NULL, 资源rosource
//$file;
//echo '<br>';
//echo is_null($file)?'NULL':'不是NULL';
echo '<hr>';

$file=fopen('demo3.php','r') or die ('打开失败');
echo gettype($file);
echo '<br>';
var_dump($file);

?>