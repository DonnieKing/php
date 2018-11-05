<?php
//类属性与类常量的知识
/**
 * 类的属性初始化
 * 类常量的初始化与访问
 */

class Stu{
    //定义时初始化,如果未赋值,默认为null
    //用来初始化类属性的值,必须是编译阶段就可以确定的,不能是在运行时才计算
    //即必须使用字面量,或者由构造方法来初始化,不能使用变量或表达式,对象等
      public $name;
      public $course ;
    //类常量必须是声明的时候直接初始化,也必须使用有确定值的字面量
    //类常量是共享成员,可以被该类的所有对象共享,所以不属于具体的类
    //必须使用类名来访问,在类中引用类名使用关键字:self
    //self后面必须使用范围解析符::(双冒号)来访问类公共成员(如类常量和静态成员)
    //静态成员,还没有学到,后面会有专门的课程学习
      const  NATION = 'CHINA';

    //声明一个未初始化的属性,系统会自动用null进行初始化
    public $test;

    //构造方法:在对象实例化时(被创建时)自动调用,可用该方法对属性初始化
    //构造方法:是一种特殊的方法,用户不需要,也无权访问,只能由系统调用
    //所以,这类访问有一个特殊的名称:魔术方法,定义时必须用双下划线开始,且名称固定
    //类方法中,可以直接访问当前类中的成员
    //非静态成员,可以使用  $this
      public function  __construct($name='过儿',$course='php')
      {
           $this->name = $name;
           $this->course = $course;
          //在类实例化时,会自动执行,从而证明构造方法的执行时机
           echo self::NATION;
      }

      public function getNation(){

          return $this->name.'的国籍是'.self::NATION;
      }

}
$stu = new Stu();  echo '<br>';
echo is_null($stu)?'空':'不空'; echo '<br>';
echo $stu->name.'最喜欢的课程是'.$stu->course.'<hr>';


$stu = new Stu('DonnieKing','php');  echo '<br>';
echo is_null($stu)?'空':'不空'; echo '<br>';
echo $stu->name.'最喜欢的课程是'.$stu->course.'<br>';
echo $stu->getNation().'<hr>';

//类的外部必须使用类名加范围解析符来访问
echo $stu->name.'的国籍是'.Stu::NATION;

//类常量是属于类的,而不是某个具体对象
//用对象是不能访问类常量的
//echo $stu->NATIONAL;  //错误

