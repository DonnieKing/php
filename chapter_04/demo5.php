<?php
//类的继承与代码复用
/**
 * 类的继承
 * 1. 继承是为了代码复用
 * 2. php只支持单继承
 * 3. 父类也叫超类,基类,子类也叫派生类
 */

//声明一个父类
class ParentClass{

    public $name;
    protected $course;
    private $salary;
    const SITE_NAME = 'china';
    //构造方法
    public function __construct($name,$course,$salary)
    {
        $this->name = $name;
        $this->course = $course;
        $this->salary = $salary;
    }
    public function getCourse()
    {
        //受保护的成员，可以在子类中访问
        return $this->course;
    }

    //访问本类私有成员
    public function getSalary()
    {
        return $this->salary;
    }
}

//创建子类，继承父类ParentClass
class ChildClass extends  ParentClass{
    //什么都不写,仍然可以访问父类中所有除了pravte外的成员

    //子类中允许重写父类中的同名方法， （多态）
    public function getCourse()
    {
        return $this->name.'所学的课程是'.parent::getCourse();
    }
    //访问本类私有成员
    public function getSalary()
    {
        return $this->salary;
    }
}

$child = new ChildClass('小龙女','php',50000);
echo '姓名:'.$child->name.'<br>';
echo '课程:'.$child->getCourse().'<br>';
//echo '工资:'.$child->getSalary().'<br>';  //不可访问，如果子类没有getsalary（）方法，可以直接使用父类的方法访问私有变量
echo ChildClass::SITE_NAME;


/**
 * 继承环境下：
 * protected、public可以在子类中访问，
 * 访问限制符是受到类作用域限制的
 * 类常量，不受限制，可以在子类中直接使用
 */

