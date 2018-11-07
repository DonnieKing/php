<?php
/**
 * 命名空间
 * 1. 空间是放代码的地方,可以是一个独立文件,也可是文件的一部分
 * 2. 命名是动词,就是起个名字
 * 3. 简单理解:命名空间就是给存在代码的地方起个名字,不同的代码放在不同的地方
 * 4. 所以,命名空间是一种代码的组织结构,或者封装方法,类似于操作系统中的文件组织结构
 * 5. 将代码放在对应的空间中,哪怕这些代码的命名是重复的也没问题,因为他们所在空间不同
 * 6. 就如同将同名文件,存放在不同的文件夹中是一样的
 * 7. 例如,合肥有条路叫长江路,这并不影响南京也有一条叫长江路的路名,因为用城市进行了区隔
 * 8. 命名空间适合于之前的有可能命名冲突的全局成员:函数,类与接口,常量
 */

/**
 * 一、定义命名空间
 * 命名空间主要针对:类,函数和常量,因为他们的作用域是全局的,产生命名冲突的可能性很大
 * 1. 关键字: namespace
 *    作用:1. 定义命名空间;  2.显示的访问当前命名空间,类似于self;
 * 2. 常量: __NAMESPACE__: 当前命名空间字符串,全局为空字符
 * 3. 声明空间前不宜有除了declare之前的语句
 */


namespace one;

//常量
const  SITE = 'php中文网';

//函数
function house(){
    return '我家在北京有套300平米的房子';
}

//类
class Hobby
{
    public static $hobby = 'swim';
}

//空间魔术常量  __NAMESPACE__
echo '当前命名空间的名称是：'.__NAMESPACE__.'<br>';

//访问当前空间中的变量
//关键字：namespace 引入了当前空间
echo '站点名称：'.namespace\SITE.'<br>';
echo '站点名称：'.SITE.'<br>';

echo '哈哈哈'.namespace\Hobby::$hobby.'<br>';

//访问函数
echo '访问当前空间的函数：'.house().'<br>';
echo '访问当前空间的函数：'.namespace\house().'<br>';

echo '<hr>';


//可以在一个脚本中创建多个命名空间
namespace two;

const DOMAIN = 'www.php.cn';

class User{
    public static $name = 'admin';
}

echo '当前命名空间的名称是：'.__NAMESPACE__.'<br>';

echo '站点域名:'.namespace\DOMAIN.'<br>';

echo '站点名称'.\one\SITE.'<br>';         //  全局空间用  \  类似于根

//非限定名称
echo User::$name.'<br>';
//非限定名称
echo \two\User::$name.'<br>';


//访问one中hobby的成员,一定要从全局开始： \
echo '我的爱好是:'.\one\Hobby::$hobby;
//echo '我的爱好是:'.one\Hobby::$hobby;  //取不到值


//如何在当前的空间中,访问另一个空间中的成员呢?
//需要使用完整的命名空间名称: 完全限定空间,从全局空间开始,类似于文件根目录
//全局空间使用 : '\' 字符表示