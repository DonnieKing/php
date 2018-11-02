<?php
/**
 * 数组与数据结构
 * 一、堆栈操作
 * 栈:仅允许在一端进行插入和删除的线性表结构,即先入后出,如同弹夹
 * 1.array_push()在尾部插入
 * 2.array_pop()在底部删除
 *
 * 二、队列操作
 * 队列:仅允许在头部删除,尾部插入的线性表结构,即先入先出,如同排队
 * 1.array_unshift()在头部插入
 * 2.array_shift()在头部删除
 */

/**
 * 一、堆栈操作(尾部增删除元素)
 * 1.array_push($arr,$val...) 入栈   （然后返回新数组的长度）
 * 2.array_pop($arr)出栈,返回栈顶元素,仅一个(返回数组的最后一个值。如果数组是空的，或者非数组，将返回 NULL。)
 */

//必须先定义一个空数组
$arr = [];

echo '<pre>'. '入栈'.array_push($arr,'赵丽颖') .'个元素'.'<br>';
echo '<pre>'.var_export($arr,true).'<br>';
echo '<pre>'. '入栈'.array_push($arr,'刘亦菲','王楚') .'个元素'.'<br>';
echo '<pre>'.var_export($arr,true).'<br>';
echo '<pre>'. '入栈'.array_push($arr,['杨幂','唐嫣']) .'个元素'.'<br>';
echo '<pre>'.var_export($arr,true).'<br>';
echo '<hr>';

echo '<pre>'. '出栈元素是'.var_export(array_pop($arr),true) .'<br>';
echo '<pre>'.var_export($arr,true).'<br>';
echo '<pre>'. '出栈元素是'.var_export(array_pop($arr),true) .'<br>';
echo '<pre>'.var_export($arr,true).'<br>';
echo '<pre>'.'出栈元素是'.var_export(array_pop($arr),true).'<br>';
echo '<pre>'.var_export($arr,true);
echo '<hr>';

/**
 * 二、头部增删除操作
 * 1. array_unshift($arr,$var....):头部插入 (该函数会返回数组中元素的个数。)
 * 2. array_shift($arr): 头部删除   (返回从数组中删除元素的值，如果数组为空则返回 NULL。)
 */
$arr = [];
//入队
echo '入队'.array_unshift($arr,'郭德纲').'个元素<br>';
echo '入队'.array_unshift($arr,'小崔').'个元素<br>';
echo '入队'.array_unshift($arr,'小刚').'个元素<br>';
echo var_export($arr,true).'<br>';

//头部删除元素
echo '删除了'.array_shift($arr).'<br>';
echo var_export($arr,true).'<br>';
echo '<hr>';

//其实队列应该是插入与删除在数组的两端进行,而不是像堆栈那样在数组的一端进行
//所以实现队列操作,应该是array_push()和array_shift()配合完成
//入队 array_push()
array_push($arr,'冰冰');
echo var_export($arr,true).'<br>';
//出队: array_shift()
array_shift($arr);
echo var_export($arr,true).'<br>';