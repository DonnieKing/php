<?php
/**
 * 重载: 动态的创建类属性和方法
 * 传统的重载,其实是指多态,即同名类方法,通过传参不同实现不同的功能
 * 1.主要是通过魔术方法来实现
 * 2.魔术方法的调用者是系统,而不是用户
 * 3.魔术方法不能引用传参
 * 4.重载根据类成员不同,分为属性重载与方法重载
 */

/**
 * 一、属性重载
 * 1.__set($name,$value):当给不可访问属性赋值时自动调用
 * 2.__get($name):当访问不可访问属性的值时自动调用
 * 3.__isset($name):当对不可访问属性调用isset()或empty()时自动调用
 * 4.__unset($name):当对不可访问属性调用unset()时自动调用
 */

const IS_ISSET = true;
const IS_SET = true;
const IS_GET = true ;
const IS_UNSET = false;

class Visited{

    protected $data = [];

    public function __isset($name)
    {
        return  IS_ISSET  && isset($this->data[$name])  ;
    }

    public function __get($name)
    {
         return IS_GET ? $this->data[$name]: '非法访问';
    }

    public function __set($name, $value)
    {
        IS_SET ? $this->data[$name]=$value:'禁止赋值';
    }

    public function __unset($name)
    {
        if(IS_UNSET)
        {
            unset($this->data[$name]);
        }else{
             echo  '禁止销毁';
        }
    }

}

$visited = new Visited();

if(isset($visited->table))
{
    echo $visited->table.'<br>';
}
else
{
    $visited->table = 'table_staff';
}

//访问
echo $visited->table.'<br>';

//更新
$visited->table = 'table_food';

unset($visited->table);

echo $visited->table.'<br>';

echo '<hr>';
/**
 * 二、方法重载
 * 1.__call($method,array $args):访问对象中不可访问的方法时,自动调用
 * 2.__callStatic($method,array $args):在静态上下文中调用一个不可访问方法时调用
 * method: 方法名, $args: 枚举数组,里面存放着传递给方法的参数
 */

//导入本例要跨类调用的方法所属类文件
require './public/Site.php';

class Web
{
    public function __call($method, $arguments)
    {
         // return '方法是：'.$method.'<br>参数列表：'.var_export($arguments,true);

        //方法重载更多的用在跨类的方法调用上,将这个魔术方法当做跳板('类名创建对象'，'方法')
         return call_user_func_array([(new Site),'show'],$arguments);

    }

    //当访问一个不存在或不可访问的静态方法时自动调用 ('类名'，'方法')
    public static function __callStatic($method, $arguments)
    {
        // 同样,我们也跨类静态调用一个静态方法
         return call_user_func_array(['Site','add'],$arguments);
    }
}

$web = new Web();

//访问一个不存在的动态方法
echo $web->show('php中文网','海量资源.免费公益').'<hr>';

//访问一个不存在的静态方法
echo Web::add(30,90);


//方法重载：


//__call($method,array $args):访问对象中不可访问的方法时,自动调用
//
//使用   call_user_func_array([(new Site),'show'],$arguments);
//
//注意 ： ('创建类对象'，'方法')


//__callStatic($method,array $args):在静态上下文中调用一个不可访问方法时调用
//
//  注意： ('类名'，'方法')
//
//method: 方法名, $args: 枚举数组,里面存放着传递给方法的参数