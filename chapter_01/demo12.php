<?php
/**
 * 循环结构
 * 1. 重复的工作认人讨厌,但却是计算机最擅长做的事;
 * 2. 程序中的重复操作是通过循环语句来实现的;
 * 3. 循环分为计数循环与条件循环二种,其实计数也是一种特殊的条件,分开讲是为了更加的清晰
 * 4. 计数循环使用 for() ,与C语言中的语法结构是一致的
 * 5. 条件循环使用 while(),同样也C语言中基本一致
 * 6. 数组遍历循环 foreach() 这是php 中特有的循环
 */

//1. for()计数循环
//做一个简单的1-10个整数的加法
$data = [1,2,3,4,5,6,7,8,9,10];

$res = 0;
for ($i=0; $i<10; $i++) {
    $res = $res + $data[$i];
}

echo $res, '<hr>';

//将以上案例进行优化,使其更加通用
$min = 1;
$max = 10;
// $data = range(1,10);
$data = range($min,$max);
$count = count($data);
$res = 0;

for ($i=0; $i<$count; $i++){
    $res = $res + $data[$i];
}
echo $res, '<hr>';

//为什么要这样改写呢?主要是为了函数化,因为这样的操作,可能会在很多地方用到
function accu($min, $max)
{
    $data = range($min,$max);
    $count = count($data);
    $res = 0;

    for ($i=0; $i<$count; $i++){
        $res = $res + $data[$i];
    }
    return $res;
}

//这样的话,直接调用这个函数,并传入二个参数就可以了

echo accu(1,10), '<hr>';


//2. while() 条件循环
//下面我们用while()条件循环来实现同样的功能

//生成一个1-20个整数组成的数组
$data = range(1,10);
//声明循环变量初始值
$i=0;
//声明结果变量并初始化
$res = 0;
//只要未到数组未尾,就执行累加的循环操作
while($i<count($data)) {
    //执行累加操作
    $res = $res + $data[$i];

    //关键步骤,在循环体中必须要有循环条件的更新语句,否则就会进入死循环
    $i++;
}
//输出1-20的累加结果
echo $res, '<hr>';

//与while()循环类似还有一个do~while()循环,与while()循环唯一差别是条件判断的位置,它是在出口判断
//而while()是在循环入口判断,所以,如果条件不成立,while()一定都不会执行,但do~while()至少会执行一次

$i=0;
$res = 0;
do {
    $res = $res + $data[$i];
    $i++;
} while($i<count($data));
echo $res, '<hr>';



//3. foreach() 遍历循环
//foreach()是专门用来循环遍历数组的
//声明一个数组
$data = range(1,10);

//$key是数组元素的键名或索引,$value是对应的数组元素的值
foreach($data as $key=>$value) {
    echo $key.'=>'.$value.'<br>';
}






