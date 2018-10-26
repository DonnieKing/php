<?php
//接口是一个特殊的抽象类。
//如果一个抽象类中的所有方法都是抽象的，则可以将这个类用另外一种方式来定义，即接口。

    interface Animal
    {
        function shout();
        function run();
    }

    //通过类来实现接口，必须实现接口中所有的抽象方法。
    class Dog implements Animal
    {
        function shout()
        {
            echo "汪汪汪。。。";
        }
        function run()
        {
            echo "小狗在踏青";
        }
    }

    $dog = new Dog();
    echo $dog->shout()."<br>";
    echo $dog->run()."<br>";
?>