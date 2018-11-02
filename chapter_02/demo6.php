<?php
//数组元素的遍历与回调处理
/**
 * 数组函数__回调处理
 * 1.array_filter($arr, $callback):用回调过滤数组
 * 2.array_walk(&$arr, $callback($val,$key,$data),$data的值)
 */

/**
 * 一、array_filter()
 * 1.功能: 回调处理每个元素,仅返回结果为true的元素,默认仅对值处理
 * 2.参数: $arr(必),$callback(选),FLAG)
 *      常量参数1:ARRAY_FILTER_USE_KEY,只处理键名
 *      常量参数2:ARRAY_FILTER_USE_BOTH,键名与值都要处理
 * 3.返回: 仅保存过滤过的新元素的数组
 * 4.场景: 过滤非法数据
 */

//1.array_filter($arr, $callback):用回调过滤数组 ,该函数把输入数组中的每个键值传给回调函数。如果回调函数返回 true，则把输入数组中的当前键值返回结果数组中。数组键名保持不变。
//	返回过滤的数组。
$arr1 = [5, 0, '',20, null, 88, false, 'php'];
echo '原始数组为'.'<pre>'.var_export($arr1,true).'<br>';

//1.不传入回调,过滤数组中为false的元素
//返回数组中元素为true的值(自动转换),'',0,null,false,全部转为false
//被转为false类型的元素不会出现在结果数组中,即自动过滤掉了
$arr2 =array_filter($arr1);
echo '新数组'.'<pre>'.var_export($arr2,true).'<hr>';

//2.传入回调,默认将数组的值依次传入回调处理
$arr3 = ['html','css','javascript'];
$arr4 = array_filter($arr3,function($value){
     return ($value!=='css');                       //!== 不会进行类型转换
});
echo '新数组'.'<pre>'.var_export($arr4,true).'<hr>';


/**
 * 二、array_walk(&$arr, $callback,附加值(userdata))
 * 1.功能: 对数组中的每个元素的键值对进行处理
 * 2.参数: 原生支持键值处理,不用常量标识符,附加参数可以扩展功能
 * 3.返回: 可以使用引用传参直接修改原数组
 * 4.场景: 用在对元素进行一些简单业务逻辑的场合
 * **典型情况下 myfunction 接受两个参数。array 参数的值作为第一个，键名作为第二个。
 * **如果提供了可选参数 userdata ，将被作为第三个参数传递给回调函数。
 */

//1.可自定义的遍历数组
$arr5 = ['name'=>'wangchu','email'=>'admin@php.cn'];
 array_walk($arr5,function(&$val,$key){
    echo $key.'---'.$val.'<br>';
});
 echo '<hr>';

//2.传入第三个自定义参数,实现更为强大的功能
array_walk($arr5,function(&$val,$key,$name){
    if($val == $name ){
        exit('你没有权限访问') ;     //exit() 函数输出一条消息，并退出当前脚本。
    }else{
        echo $key.'---'.$val.',mmm<br>';
    }
},'admin');
echo '<hr>';

