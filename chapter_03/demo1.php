<?php
//字符串输出方式汇总
/**
 * 字符串输出函数总结
 * 1. echo: 语言结构,左值,用于向浏览器输出一个或多个字符串或单值变量
 * 2. print: 功能同echo,但会有一个返回值,成功返回1
 * 3. print_r(): 可视为print的升级版,即可输出标量数据,也可以格式化输出复合数据:数组,对象等
 * 4. var_dump(): 可输出一个或多个任何类型的数据,可视为echo 的升级版
 * 5. var_export():以纯字符串的形式输出任何数据类型,特殊适合于多结果拼装,输出结果类似print_r()
 * 6. printf(): 输出格式化字符串,变量使用格式化占位符,主要用于标量
 */

//1.echo 输出
echo 'Hello ';
$name = 'Peter Zhu';
echo $name;
echo '<br>';
//支持同时输出多个字符串或变量的值
echo 'Hello', $name;
//字符串可以有html标签
echo 'Hello', $name, '<hr>';

//2.print(),成功返回 1,但只能输出单个单值数据
echo print '我是print的返回内容，我的返回值是:','<hr>';

//3.print_r()函数:可以单条输出任何类型的数据
//输出标量
print_r('php中文网'); echo '<br>';
print_r($name); echo '<br>';
//输出复合
print_r([1,4,5,1]);  echo '<br>';   //数组
print_r(new stdClass());  echo '<br>';   //对象
//第二个参数,true,将结果输出到一个变量中保存
$temp = print_r('2018世界杯，除了中国队，其他的都来了',true);
print_r($temp);   echo '<hr>';


//4.var_dump()函数:可以输出多个变量的详细信息,包括类型,长度等
var_dump('www.php.cn'); //字面量
echo '<br>';
$site = 'php中文网';
$domain = 'www.php.cn';
//同时输出多个变量,类似echo
var_dump($site,$domain);
echo '<br>';
//输出数组与对象:复合类型
var_dump([1,3,22,44],new stdClass());
echo '<hr>';

/**
 * 5.var_export()
 * 返回一个变量的合法的字符串表示,也就是返回变量的php语法表示
 * 与print_r类似,接受第二个参数true,将结果暂存到变量中
 */

//标量
echo var_export($site,true), '<br>'; //注意结果二边有单引号定界符
//数组
echo var_export(['佟丽娅','江疏影','关晓彤'],true), '<br>'; //返回结果与创建数组的php数组的语法是一样的

//现在用var_export()来生成一个真正的数组,传入true,不向浏览器输出,将结果保存到一个变量中
$arr = var_export(['佟丽娅','江疏影','关晓彤'],true);
echo gettype($arr);
echo '<hr>';

//6.printf()
printf('来%s学习%s一点也不难 <br>','php中文网','php');
printf('这个月我又涨了%d元工资,好开心~~ <hr>', 500);