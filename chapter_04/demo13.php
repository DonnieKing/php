<?php
// 如何导入外部命名空间
/**
 * 使用别名或引用,导入外部的完全限定名称
 * 1.为外部的   "类"  使用别名
 * 2.为外部导入的  "命名空间"  使用别名
 * 3.导入空间或类别名,使用关键字:use
 * 4.use 可同时导入多个空间或类,但推荐一个use 只导入一个
 *
 * 注意
 * 1. 导入的空间必须是完全限定的,空间前不要添加:\
 * 2. 导入并不是加载文件,当前脚本引用的外部文件仍要单独加载
 * 3.
 *
 */
//导入空间使用的关键字 use

namespace my_space;

require './public/User.php';

use model\User as modelUser;   //导入空间别名，默认从全局开始，不需要再加 \

class User
{

}

echo \model\User::insert().'<br>';   //使用 \  全局下的空间

echo modelUser::insert().'<br>';


//导入有空间名称的函数库，必须是php5.6+
require './public/func.php';

//导入公共函数库空间中的函数delete,并起一个短的别名: del
use function func_lib\delete as del;

echo  del();

