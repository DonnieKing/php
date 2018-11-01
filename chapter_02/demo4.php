<?php
/**
 * 数组函数__切割与填充
 * 1.array_slice($arr, $offset, $length, $bool)
 * 2.array_splice(&$arr, $offset, $length)
 * 3.array_chunk($arr,$size,$bool)
 * 4.array_pad($arr,$size,$value)
 */

/**
 * 一、array_slice($arr, $offset, $length, $bool)
 * 1.功能: 从数组中的指定位置,返回指定数量的元素
 * 2.参数: $arr(必),$offset(必)偏移量,$length(选)数量,$bool(选)是否保留键值关系
 * 3.返回: 返回取出的元素组成的新数组
 * 4.场景: 从大数组中截取数据
 */
$arr=[10,20,30,40,50,60];
//从索引0,即第一个元素开始,省略第二个参数,则是返回全部元素
echo '<pre>'.var_export(array_slice($arr,0 ),true).'<br>';

//从索引2开始,返回3个元素:0 => 30, 1 => 40, 2 => 50,
echo '<pre>'.var_export(array_slice($arr,2,3),true).'<br>';

//从索引2开始,length为负数,相当于剩下的总长度减2个元素:0 => 30, 1 => 40, 从返回的结果中删除两个元素
echo '<pre>'.var_export(array_slice($arr,2,-2),true).'<br>';

//功能与上面一样,但返回的数组索引保持不变:2 => 30, 3 => 40 , 保持结果中的键值对应关系，保留键名
echo '<pre>'.var_export(array_slice($arr,2,-2,true),true).'<br>';
echo '<hr>';


/**
 * 二、array_splice(&$arr, $offset, $length,$replace)
 * 1.功能:从数组中移除或替换指定的元素,与array_slice()功能更强大
 * 2.参数:$arr(必),$offset(必)偏移量,$length(选)数量,$replace(选)数组或字符串
 * 3.返回: 返回一个包含有被移除单元的数组
 */
//仅移除:从索引2外移除2个元素,返回值是被移除元素组成的数组,因为是引用传参,原始数组也被更新了
echo '被移除的元素是：'.var_export(array_splice($arr,2,2),true).'<hr>';
echo '原始数组:'.var_export($arr,true).'<hr>';

//移除且替换
$arr = [10,20,30,40,50,60];  //数组还原
echo '被移除的元素是：'.var_export(array_splice($arr,2,2,['php','mysql']),true);
echo '原始数组:'.var_export($arr,true).'<hr>';

//如果单值替换可不用数组传参
$arr = [10,20,30,40,50,60];  //数组还原
echo '被移除的元素是：'.var_export(array_splice($arr,2,1,'php'),true);
echo '原始数组:'.var_export($arr,true).'<hr>';

//移除所有数据,此时原始数组$arr已经为空
$arr = [10,20,30,40,50,60];  //数组还原
echo '被移除的元素是：'.var_export(array_splice($arr,0 ),true).'<br>';
echo '原始数组:'.empty($arr)?'数组为空':'非空数组' ;
echo '<hr>';

/**
 * 三、array_chunk($arr,$size,$bool)
 * 1.功能: 将大数组分为指定大小的若干个小数组
 * 2.参数: $arr(必),$size(必),$bool(选)true保留键值关系
 * 3.返回: 长度一致的小数组(最后一个例外)
 * 4.场景: 超大数组分页输出
 */
//$arr = [1,2,3,4,5,6,7,8,9,10];
//规则数组可以使用range($start, $end, $step)生成指定步长与取值范围的数组
$arr2 = range(1,10);

//将数组元素每3个为一组分成若干个小数组
echo var_export(array_chunk($arr2,3),true).'<hr>';
echo var_export(array_chunk($arr2,3,true),true).'<hr>';


/**
 * 四、array_pad($arr,$size,$value)
 * 1.功能:将数组用指定的数据,填充到指定的长度
 * 2.参数:$arr(必),$size(必)长度, $value(必)值
 * 3.返回:被填充后的数组的副本
 * 4.场景: 填充默认值
 */

$arr3 = [50,60,70];
//将数组长度扩展到6位,剩下位置用99填充
echo '<pre>'.var_export(array_pad($arr3,6,99),true).'<br>';

//被填充的数据也可以是数组
echo '<pre>'.var_export(array_pad($arr3,6,[88,99]),true).'<br>';

//长度可以为负数,指从尾部开始计数(注:数组尾部都是从-1开始计数)
echo '<pre>'.var_export(array_pad($arr3,-5,'php'),true);