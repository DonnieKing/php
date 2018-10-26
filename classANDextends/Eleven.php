<?php
//抽象类是一个特殊的类
//当定义一个类时，其中所需的某些方法暂时并不能完全定义出来，而是让其继承的子类来实现，
//此时就可以用到抽象类。比如定义一个动物类，每种动物都有“叫”的方法，而每种动物叫的方式又不同，
//因此可以将动物类定义为一个抽象类。

    abstract class Animal
    {
        //**抽象方法：只有方法声明而没有方法体的方法
        //抽象方法前面需要有 abstract 关键字修饰
        abstract public function shout();
        abstract public function run();
    }

    //	如果一个类继承了某个抽象类，则它必须实现该抽象类的所有抽象方法，除非它自己也声明为抽象类。
    abstract class Dog extends Animal
    {
        //在子类中只实现了父类中的 shout 抽象方法
        public function shout()
        {
            echo "汪汪汪...";
        }
    }

    class Cat extends Animal
    {
        public function shout()
        {
            echo "喵喵……";
        }
        public function run()
        {
            echo "小狗在踏青";
        }

    }

    //抽象类不能被实例化↓
    //$dog = new Dog();

     $cat = new Cat();
     echo $cat->shout()."<br>";
     echo $cat->run()."<br>";



?>