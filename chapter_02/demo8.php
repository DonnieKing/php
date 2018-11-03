<?php
/**
 * 数组函数__其它常用函数
 */
//1.range()
//生成指定范围与步长的数组
$arr = range(1,20,2);
echo '<pre>'.var_export($arr,true).'<br>';
$arr1 = range('a','s',2);
echo '<pre>'.var_export($arr1,true).'<hr>';

//2.array_unique()
//去掉数组中元素值重复的元素
$arr2 = [4,10,22,10,30,22]; //10,22是重复的
echo '<pre>'.var_export(array_unique($arr2),true).'<hr>';

//3.array_fill()
//   填充数组
//创建一个有10个元素的数组,并用0进行初始化
//array_fill(起始索引,元素数量,填充值),默认为索引
$arr3 = array_fill(0,10,8);
echo '<pre>'.var_export($arr3,true).'<hr>';


//4.array_rand()
//从数组中随机取出数据,适合于抽奖
$arr = [2,14,19,5,44,10];
//注意:返回的是随机元素的键名,不是值
//返回一个时返回标量的键名,一个以上返回键名数组
$keys = array_rand($arr,3);
foreach ($keys as $key)
{
    //$res[$key] = $arr[$key];  // 类似于 0 => 2,3 => 5,4 => 44,
    $res[] = $arr[$key];          //键名从0开始
}
echo '<pre>'.var_export($res,true).'<hr>';


//5. shuffle();
//将数组顺序随机打乱,直接更新原数组,非常适合验证码
$arr = ['东邪','西毒','南帝','北丐'];
shuffle($arr);
echo '<pre>'.var_export($arr,true).'<hr>';


//6.array_merge($arr1, $arr2);
// 合并多个数组,同键名自动覆盖,返回新数组,适合配置参数的合并
 $db_sys=['host'=>'127.0.0.1','user'=>'root','pass'=>'root'];
 $db_user=['host'=>'localhsot','pass'=>'123456'];
 $arr = array_merge( $db_user,$db_sys);   //数组位置不同，结果不同
echo '<pre>'.var_export($arr,true).'<hr>';
