<?php
/**
 * 三个最基本的字符串子串查询函数
 * 1.substr(): 根据位置查找,输入位置,返回字符串
 * 2.strstr(): 根据值查找,返回字符串
 * 3.strpos(): 根据值查找,返回位置
 */



/**
 * 一、substr($str,$offset, $length)
 * 1.功能: 获取指定位置或区间内的字符串
 * 2.参数: $str(必),$offset(必),$length(选)
 * 3.返回: 不指定长度,则返回指定位置之后所有字符串,指定区间则返回指定长度的字符串
 * 4.场景: 适合只知道取串的位置,主要用于精确查询
 */
$str = 'php is tht best progranmming language';
//索引11是'best'字符串开始处,返回'b'之后全部内容
echo substr($str, 11), '<br>';
//设置区间查询
//索引11开始的5个字符: 'best'
echo substr($str, 11,5), '<br>';
//负数，从结尾开始取
echo substr($str,-8).'<br>';
echo substr($str,-8,4).'<br>';
echo '<hr>';


/**
 * 二、strstr($str1, $str2,bool)
 * 1.功能: 查找字符串的首次出现
 * 2.参数: $str1(必),$str2(必)要查询的子串,bool:true,返回前面部分,false返回后面(默认)
 * 3.返回: 返回查到的字符串后面或前台部分字符,没找到返回false
 * 4.场景: 适合只知道查询内容,不知道准确位置的情况下,进行模糊查询
 * 5.提示: 如果仅仅是判断查询的内容是否在字符串,应该用更快的strpos()函数
 * 6.类似: stristr()不区分查找子中的大小写
 */

$email = 'admin@php.cn';
//查询'@'是否存在并返回@以及后面的内容(包括@): @php.cn
echo strstr($email,'@').'<br>';
//查询'@'是否存在并返回@前面的内容(不包括@): admin
echo strstr($email,'@',true).'<br>';
echo strstr($email,'@',true).strstr($email,'@').'<br>';


/**
 * 三、strpos($str1,$str2,$start)
 * 1.功能: 查找字符串首次出现的位置
 * 2.参数: $str1(必),$str2(必)要找的字符串,$start(选)查询起始索引,默认从0开始
 * 3.返回: 目标字符串的起始索引
 **4.场景: 快速判断某个字符串是否存在
 * 5.类似: stripos()查询时不区分大小写
 */

//如果只是想知道是否存在某个字符串,使用subpos()直接返回子串偏移量效率更高
echo strpos($email,'php').'<br>';
if(strpos($email,'.cn'))
{
    echo '存在';
}else{
    echo '找不到';
}