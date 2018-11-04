<?php
//大小写转换与使用场景分析
//字符串的大小写转换
echo  strtolower('I LOVE YOU').'<br>';
echo  strtoupper('i love you').'<br>';
echo  ucfirst('i love you').'<br>';  //将首字母大写
echo  ucwords('i love you').'<hr>';  //将每个单词首字母大写

//应用1: 将文件名全部转为小写,实现跨平台(linux是区分大小写的)
$arr=['Model.php','View.php','Controller.php'];
//array_walk(&$arr, $callback,附加值(userdata))也可实现
//array_walk($arr,function($m){
//     echo strtolower($m).'<br>';
//});
foreach($arr as $value)
{
    $res[]=strtolower($value);
}
echo '<pre>'.var_export($res,true)."<hr>";

//应用2: 将要判断的字符串统一转为小写或大写,便于比较
$opt = 'Edit'; // EDIT/edit, DELETE/delete/,Select/SELECT/select....
$opt = strtolower($opt);  //全部转为小写,便于统一处理
switch ($opt)
{
    case 'select':
        print '查询操作';
        break;
    case 'edit':
        print '编辑操作';
        break;
    case 'delete':
        print '删除操作';
        break;
    case 'update':
        print '更新操作';
        break;
    default:
        exit('非法操作');

}