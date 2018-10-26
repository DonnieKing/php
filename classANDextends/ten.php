<?php
//final 关键字：不仅可以修饰类，还可以修饰方法

//当一个类中的方法被 final 关键字修饰后，这个类的子类将不能重写该方法。

      class Animal
    {
        final public function shout()
        {
            echo "汪汪汪。。。";
        }
    }

    class Dog extends Animal    //不能够继承被final修饰的类
    {
        public function shout()             //报错，不能够重写
        {
            echo "哈哈哈";
        }
    }

    $dog = new Dog();

      echo $dog->shout();
?>