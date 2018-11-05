<?php
/**
 * 字符串查找并替换的二大函数
 * 1.str_replace()
 * 2.substr_replace()
 */

$str = 'Peter Zhu is PHP lecture';
//二、str_replace()
//1.str_replace()
echo str_replace('php','JAVA',$str).'<br>';
//2.删除指定字符:用空字符替换即可
echo str_replace('Zhu','',$str).'<br>';
//3.要被替换的多个子字符串,可以存放到数组中
echo str_replace(['Zhu','PHP'],'王楚',$str).'<br>';
//4.新字符串也可以来自数组,但数量必须要被替换数组相同
echo str_replace(['Zhu','PHP'],['Wang','python'],$str).'<br>';

//类似:str_ireplace()你可能已经猜到了,这是不区分被替换字符串大小写的替换
echo str_ireplace('php','python',$str).'<hr>';



//二、substr_replace($str, $object, $offset, $length),$offset和$length指定了替换的索引区间
//从0开始替换到$str结束,用新字符串:PHP是最好的编程语言
echo substr_replace($str,'php是世界上最好的编程语言',0).'<br>';
//等价于
echo substr_replace($str,'php是世界上最好的编程语言',0,strlen($str)).'<br>';

//在$str中插入字符
//插入后的结果如下: Peter Zhu is PHP中文网的PHP leture
//其中: PHP中文网 是插入的内容, $length=0,表示插入到这个位置
//第四个参数，就是要替换的长度
echo substr_replace($str,'php中文网',13,0).'<br>';

//将PHP替换成JAVA
echo substr_replace($str,'java',13,3 ).'<br>';

//删除指定区间内的字符,将新字符设置为空字符即可
//删除'Zhu'
echo substr_replace($str,'',6,3),'<br>';