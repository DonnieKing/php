<?php
/**
 * 一、数组分类
 * 1.数组是由一组有序的值或键值对组成的数据结构
 * 2.数组根据键名类型分为:索引数组 与 关联数组 二大类
 * 3.索引数组:键名是元素的位置索引,默认从0开始,采用系统自动处理可以省略键名
 * 4.关联数组:键名是自定义的字符串,类似于对象中的属性列表
 */

//索引数组: 采用字面量直接定义
$arts = ['亢龙有悔', '飞龙在天', '见龙在田', '鸿渐于陆', '潜龙勿用', '突如其来'];

//关联数组: 采用字面量直接定义
$swordsman = ['name'=>'郭靖','position'=>'金刀驸马','skill'=>'降龙十八掌'];

/**
 * 二、数组定义
 * 1. 整体定义: $arr = [...]
 * 2. 逐个定义: $arr[] = ...
 * 3. 数组元素可以是字面量,也可以变量,甚至还可以是数组,从而创建多维数组
 */

//逐个定义:以添加的方式的来创建数组
$position = '金刀驸马';
$swordsman=[];
$swordsman['name'] = '郭靖';
$swordsman['position'] = $position;
$swordsman['skill'] = '降龙十八掌';

/**
 * 三、数组遍历
 * 1. for()循环:适合遍历索引数组
 * 2. while()循环
 * 3. foreach()循环: 数组专用,强烈推荐
 * 4. list(),each(),while()配合完成的遍历,因为each()已不再推荐,所以不再学习
 * 4. 内部指针
 */

//1.for
$resl = '';
for($i=0;$i<count($arts);$i++)
{
    $resl .=$arts[$i].',';
}
echo rtrim($resl,',').'<hr>';   //去掉最右边留下来的逗号


//2.while
$res2 = '';
$i = 0;
while($i<count($arts))
{
    $res2 .= $arts[$i].'-';
    $i++;
}
echo rtrim($res2,'-').'<hr>';


//3.foreach
foreach ($arts as $key=>$value)
{
    echo $key.'---'.$value.'<br>';
}


/**
 * 4.list(),each(),while()遍历
 * list($var1,$var2,...) = [value1, value2,....]:将索引数组中的值,依次赋给list()中的变量
 * each($arr):将数组中的每个元素,拆分键和值二部分,并分别以索引和关联二种方式返回
 */
//测试each()
$arr = [100,'name'=>'DonnieKing'];
$temp = each($arr);
echo '<pre>';
print_r($temp);
$temp = each($arr);
echo '<pre>';
print_r($temp);
echo '<hr>';


while(list($key,$value) = each($swordsman))
{
    echo $key.'---'.$value.'<br>';
}
echo '<hr>';

/**
 * 5.内部指针
 * (1)current():当前指针指向元素的值
 * (2)key(): 当前指针指向元素的键名/索引
 * (3)next(): 指针后移
 * (4)prev(): 指针前移
 * (5)end(): 指针移到尾部最后一个元素上
 * (6)reset(): 指针复位,指向第一个元素
 */

//指针复位
reset($arts);

//获取第一个元素的键值
echo key($arts),'---',current($arts),'<br>';

//后移一位,获取第二个元素的键值
next($arts);
echo key($arts),'---',current($arts),'<br>';

//前移一位
prev($arts);
echo key($arts),'---',current($arts),'<br>';

//移到最后,获取最后一个元素的键值
end($arts);
echo key($arts),'---',current($arts),'<br>';
echo '<hr>';


//记得先复位数组指针,从头开始遍历
reset($arts);
for($i=0;$i<count($arts);$i++)
{
    echo key($arts).'---'.current($arts) .'<br>';
    next($arts);                   //指针后移一位
}


//使用while循环配置指针进行遍历
echo '<hr>';
reset($arts);

//使用入口判断型,会导致第一招丢失
while(next($arts))
{
   // prev($arts);
  echo key($arts).'---'.current($arts).'<br>';
}

//应该使用出口判断结构: do ~ while()
echo '<hr>';
reset($arts);
do{
    echo key($arts).'---'.current($arts).'<br>';
}while(next($arts)) ;

