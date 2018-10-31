<?php
//创建一个变量:帮派, 这是一个全局变量
//全局的变量的作用域是全局的
//所谓全局作用域,就是从脚本的运行,直到这个脚本被关闭,都是有效的,贯穿整个程序的生命周期
$faction = '中北大学';

// php中只有函数作用域,所以,只要声明一个函数,就肯定会创建出一个作用域/(块作用域不存在)
function miss($belle){
    global $faction;
    return $GLOBALS['faction'].'王楚日夜思念着'.$_GET['name'];
}

echo miss('小龙女');

echo '<hr>';

//超全局变量：系统预定义的变量
echo '当前脚本的名称是'.$_SERVER['SCRIPT_FILENAME'];
echo '<hr>';
echo $_GET['name'];

?>