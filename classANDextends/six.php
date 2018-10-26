<?php
//继承
//类的继承是指在一个现有类的基础上去构建一个新的类，构建出来的新类被称作子类，现有类被称作父类，子类会自动拥有父类所有可继承的属性和方法。

//定义一个动物类  Animal

    class Animal
    {
        public $name;
        private $age;

        public function shout()
        {
            return $this->name."正在叫";
        }
    }

     //定义一个猫科动物继承
    class Cat extends Animal
    {
        public function printName()
        {
            return "我是".$this->name;
        }
    }
    //定义一个狗动物继承
    class Dog extends Animal
    {
        public function printName()
        {
            return "我是".$this->name;
        }
    }

    $cat = new Cat();
    $cat->name = "加菲猫";
    echo $cat->printName()."<br>";
    echo $cat->shout()."<br>";

    $dog = new Dog();
    $dog->name = "安倍晋三";
    echo $dog->printName()."<br>";
    echo $dog->shout();
?>