<?php
/**
 * 类与对象
 * 类的声明与实例化
 * 1. 类声明: class
 * 2. 类实例化: new
 * 总结:  类是对象的模板, 对象是类的实例
 */

/**
 * 一、 类的声明与成员
 * 1.使用关键字: class
 * 2.类名必须是一个php合法标识符:只能以字母或下划线开头,后面也必须是字母数字或下划线
 *      类名建议采用首字母大写,这是行业约定
 * 3.类中成员: 属性和方法
 *      (1)属性:包括变量,类常量,它的值必须是确定的,可以在定义时直接初始化或由构造方法初始化
 *      (2)方法:即函数,可以接受外部传入的参数,访问类中其它成员(包括属性和方法)
 */

/**
 * Class Star 明星类
 */
class Star
{
    //定义类属性
    public $name = '小龙女';
    public $sex = '女';
    public $age = 25;
    public $company = '古墓电影公司';


    /**
     * 拍摄电影
     * @param $film 电影名称
     * @param $type 电影类型
     * @return sring
     */
    public function shoot($type,$film)
    {
        //$this 是伪变量,始终代表着当前类的实例对象
        //$this 用于在类的内部,引用类例化访问对象成员
        $name = $this->name;
        return $name.'正在拍摄一部'.$type.'题材的电影《'.$film.'》~~';
    }


    /**
     * 制造绯闻
     * @param $figure  绯闻人物
     * @param $event    绯闻事件
     * @return string
     */
    public function affair($figure, $event)
    {
        $name = $this->name;
        return $name.'正在和'.$figure.$event;
    }
}

/**
 * 二、类的实例化
 * 1.使用new关键字: new ClassName()
 * 2.返回对象类型的变量
 * 3.对象变量使用->(对象运算符)访问对象公共成员
 *
 */

//实例化类,获取类的实例,即对象
//对象是类的动态表现,保存在内存中,只有在脚本运行时才会创建
//实例化后,类中成员,就自动变成了对象成员
$star = new Star();

//使用对象变量访问对象成员中的属性(变量)
echo '姓名是:', $star->name, '<br>';
echo '所属公司是:', $star->company, '<br>';

echo $star->shoot('爱情动作片','玉女心经').'<br>';

//访问对象方法,方法名后面必须要有一些圆括号,哪怕没有参数,也不能省略,这也访问函数是一样的
echo $star->affair('过儿','因为双十一要不要换手机,正在闹分手呢');

