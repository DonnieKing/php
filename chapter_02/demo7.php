<?php
 // 数组的排序技术详解
/**
 //1.根据值排序
 // 忽略键名：升序sort()  降序rsort()  用户自定义usort($arr,$callback)回调
 //保留键名： 升序asort()  降序arsort()  用户自定义uasort($arr,$callback)

 //2.根据键名排序  多用于关联数组
 // 升序ksort()  降序krsort()  用户自定义uksort()
*/

/**
 * 数组函数_排序
 * 数组元素由键名与值二部分组成,所以有二个排序依据
 * 一、根据值排序
 *  1.忽略键名:sort(),rsort(),usort()
 *  2.保留键名:asort(),arsort(),uasort()
 *
 * 二、根据键名排序
 *  1.
 * 记忆规律:
 * 1.函数名有a: 保留键值关系,适合关联数组
 * 2.函数名有r:逆序(降序),由大到小排列
 * 3.函数名有u:自定义回调处理
 */

/**
 * 一、根据数组的值进行排序
 * 第一组: 忽略键名,主要针对索引数组
 * 1.sort($arr) 升序
 * 2.rsort($arr) 降序
 * 3.usort($arr,$callback) 回调
 */

//1.升序
$arr = [45,90,22,10,3,18,33];
sort($arr);    //引用传递,原数组发生变化
echo '<pre>'.var_export($arr,true).'<br>';

//2.降序
rsort($arr);
echo '<pre>'.var_export($arr,true).'<br>';

//回调
$arr = [45,90,22,10,3,18,33];
usort($arr,function($m,$n){
    $k = $m -$n;
    switch ($k)
    {
        case ($k<0):
          //  return -1; //升序
            return 1;     //降序
            break;
        case ($k>0):
           // return 1;  //升序
            return -1;    //降序
            break;
        case ($k=0):
            return 0;
            break;
    }
});
echo '<pre>'.var_export($arr,true).'<hr>';

//其实 usort()更多是与strcmp()配合实现多维数组的排序
//strcmp()函数比较两个字符串
//本函数返回：
//0 - 如果两个字符串相等
//<0 - 如果 string1 小于 string2
//>0 - 如果 string1 大于 string2
// 注意：：：strcmp()比较按ASCII来比较，如果比较数字长度必须相同，有可能出现意想不到的结果  ‘20’ > '108'
$stu = [
    ['name'=>'王楚', 'grade'=>435],
    ['name'=>'范冰冰', 'grade'=>355],
    ['name'=>'左小青', 'grade'=>732],
];

echo '<pre>'.var_export($stu,true).'<hr>';
//根据用户自定义回调来进行排序
usort($stu,function($m, $n){
    return strcmp($m['grade'], $n['grade']);
});
echo '<pre>'.var_export($stu,true).'<hr>';


/**
 * 一、根据数组的值进行排序
 * 第二组: 保留键值关系,主要针对关联数组
 * 1.asort($arr) 升序
 * 2.arsort($arr) 降序
 * 3.uasort($arr,$callback) 回调
 */

//1.升序,键值保留
$price = ['合肥'=>18000, '上海'=>36000, '南京'=>25000,];  //房价排行榜
asort($price);
echo '<pre>'.var_export($price,true).'<br>';

//2.降序,键值保留
$price = ['合肥'=>18000, '上海'=>36000, '南京'=>25000,];  //房价排行榜
arsort($price);
echo var_export($price,true), '<hr>';

//3.回调,案例请参考usort(),基本思路是一致的;
$stud = [
    ['name'=>'王楚', 'grade'=>435],
    ['name'=>'范冰冰', 'grade'=>355],
    ['name'=>'左小青', 'grade'=>732],
];
//根据用户自定义回调来进行排序
uasort($stud,function($m, $n){
    return strcmp($m['grade'], $n['grade']);
});
echo '<pre>'.var_export($stud,true).'<hr>';



/**
 * 二、根据键名排序
 * 1. ksort()
 * 2. krsort()
 * 3. uksort()
 */

//1.按键名升序
$lang = ['html'=>'标记语言','css'=>'样式表','javascript'=>'前端脚本','php'=>'后端脚本'];
ksort($lang);
echo '<pre>'.var_export($lang,true).'<br>';

//2.按键名降序
$lang = ['html'=>'标记语言','css'=>'样式表','javascript'=>'前端脚本','php'=>'后端脚本'];
krsort($lang);
echo var_export($lang,true), '<hr>';

//3.自定义回调对键名排序
//根据键名的第二个字母进行排序
//substr(string,start,length)           substr() 函数返回字符串的一部分。
$lang = ['html'=>'标记语言','css'=>'样式表','javascript'=>'前端脚本','php'=>'后端脚本'];
uksort($lang,function($m,$n){
    $a = substr($m,1,1);
    $b = substr($n,1,1);
    return strcmp($a,$b);
});
echo var_export($lang,true), '<hr>';