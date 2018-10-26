<?php
//调用父类中被重写的方法

//定义一个动物类  Animal

 class Animal
 {
     public $name;
     public function shout()
     {
         echo "动物正在叫";
     }
 }
//定义一个狗类 Dog 来继承 Animal 类
 class Dog extends Animal
 {
     public function shout()
     {
         parent::shout();
         return "汪汪";
     }
 }

    $dog = new Dog();
    echo $dog->shout();

?>