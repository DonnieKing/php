<?php
/**
 * 数组函数__键值操作
 * 1.array_values($arr): 返回元素值组成的新数组(索引)
 * 2.array_column($arr,$col, $index): 返回多维数组中的一列,可指定键或索引
 * 3.array_keys($arr,$val,$bool): 返回键名组成的新数组
 * 4.in_array($val, $arr, $bool): 根据元素值判断值是否在数组中,返回布尔值
 * 5.array_search($val, $arr,$bool): 查找指定值,并返回该值的键名,否则返回false
 * 6.array_key_exists($key,$arr): 根据键名判断元素是否在数组中
 * 7.array_flip($arr): 键值互换
 * 8.array_reverse(): 数组元素顺序翻转
 */

$arr1=['id'=>'10','name'=>'杨过','sex'=>'male','salary'=>8800];
/**
 * 预备: 数组输出的二个函数
 * 1. print_r($arr,$bool) 格式化输出变量
 * 2. var_dump($arr1,$arr2...)  可输出多个变量的详细信息
 * 3. var_export($arr,true)  输出变量的字符串表示,其实就是php语句
 */

echo gettype(print_r($arr1,true));  //加上返回值true，相当于变成了一个字符串
echo '<pre>'.print_r($arr1,true);
var_dump($arr1,true);
var_export($arr1);    //加上返回值true变字符串


echo '<hr>';
$arr2 = array (
    'id' => '100',
  'name' => '杨康',
  'sex' => 'male',
  'salary' => 500,
);
echo '<pre>'.print_r($arr2,true);
echo '<pre>'.var_export($arr2,true);   //相当于变成string类型（加true之后）
echo '<hr>';


//1.array_values($arr)  返回元素值组成的新数组(索引)
echo 'array_values($arr)'.'<br>';
$arr3 = array_values($arr2);
print_r($arr3);
echo '<pre>'.var_export(array_values($arr1),true);
echo '<hr>';


//2.array_column($arr,$col, $index): 返回多维数组中的一列,可指定键或索引
//$arr4=[
//    ['id'=>'10','name' => '杨过','sex' => '男','salary' => 8000],
//    ['id'=>'100','name' => '杨康','sex' => '男','salary' => 4000],
//    ['id'=>'1000','name' => '郭靖','sex' => '男','salary' => 2000],
//    ['id'=>'1','name' => '小龙女','sex' => '女','salary' => 9000],
//];
//追加数组方式
$arr4=[];
$arr4[]=['id'=>'10','name' => '杨过','sex' => '男','salary' => 8000];
$arr4[]=['id'=>'100','name' => '杨康','sex' => '男','salary' => 4000];
$arr4[]=['id'=>'1000','name' => '郭靖','sex' => '男','salary' => 2000];
$arr4[]=['id'=>'1','name' => '小龙女','sex' => '女','salary' => 9000];
echo '<pre>'.var_export(array_column($arr4,'salary'),true);
echo '<pre>'.var_export(array_column($arr4,'salary','name'),true);
echo '<hr>';

//3.array_keys($arr,$val,$bool): 返回当前数组的键名组成的新数组
echo '<pre>'.var_export(array_keys($arr1),true);
//返回指定值所对应的键名
echo '<pre>'.var_export(array_keys($arr1,'male'),true);
echo '<hr>';


//4.in_array($val, $arr, $bool): 根据元素值判断值是否在数组中,返回布尔值
echo in_array(8800,$arr1)?'存在':'不存在';
echo '<br>';
//5.array_search($val, $arr,$bool): 查找指定值,并返回该值的键名,否则返回false
$res = array_search('male',$arr1);
echo $res?:'没有找到';
echo '<br>';
echo $arr1[$res];

//6.array_key_exists($key,$arr)  功能: 判断数组中是否存在指定的键名
echo '<hr>';
echo array_key_exists('name',$arr1)?'键名存在':'键名不存在';

//7.array_flip($arr)  .功能: 键值互换
echo '<pre>'.var_export($arr1,true).'<hr>';

//8.array_reverse($arr)  功能: 数组元素顺序反转
echo '<pre>'.var_export(array_reverse($arr1),true);