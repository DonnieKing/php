<?php
/**
 * 类成员访问限制(成员可见性)
 */
/**
 * 封装的概念
 * 1. 类属性,除非必要,否则都应该声明为私有或受保护的,屏蔽外部直接访问
 * 2. 为类成员属性提供访问访问接口,在接口方法中对外部访问进行过滤,保护数据
 */
class Staff{

    //public: 公开,在类的内部,外部都可以访问
     public $name;

    //protected: 受保护,仅在类的内部,以及子类中的访问
     protected $dept;

    //private: 私有,仅在本类内部访问,外部以及子类均不能访问
     private $salary;

     //构造方法
    public function __construct($name,$dept,$salary)
    {
        $this->name = $name;
        $this->dept = $dept;
        $this->salary = $salary;
    }

    //对于外部禁止访问的成员,可以提供一个接口(方法)
    public function getDept()
    {
//        一个方法或函数有一个以上的return语句是一个不好的编程风格
//        if ($this->name == 'peter') {
//            return  '该员工在保密部门工作!'
//        }
//        return $this->dept;

        $res = $this->dept;
        if($this->name == 'Donnie')
        {
            $res = '该员工在保密部门工作，不可查';
        }
        return $res;           //protected 在类内部可以访问
    }

    //私有成员访问接口
    public function getSalary()
    {
        $res = $this->salary;
        if($this->dept == '财务部')
        {
            $res =  '财务部的人你都敢查？不想混了?';
        }
        return $res;
    }



}

$staff = new Staff('Donnie','财务部',8000);
echo '姓名:'.$staff->name.'<br>';
//echo '部门:'.$staff->dept.'<br>';    //类外不能访问受保护成员
echo '部门:'.$staff->getDept().'<br>';
echo '<hr>';


$staffs = new Staff('小龙女','财务部',10000);
echo '姓名:'.$staffs->name.'<br>';
echo '部门:'.$staff->getDept().'<br>';      //使用公共接口访问受限成员
echo '工资:'.$staffs->getSalary().'<br>';   //使用公共接口访问私有成员