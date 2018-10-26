<?php
//多个接口的实现

    interface A
    {
        function a();
        function b();
    }

    interface B
    {
        function c();
    }

// 一个类可以实现多个接口，并且这些接口之间用逗号（,）分隔开
//  //通过类来实现接口，必须实现接口中所有的抽象方法。
    class D implements A,B
    {
        function a()
        {
            echo "a";
        }
        function b()
        {
            echo "b";
        }
        function c()
        {
            echo "c";
        }
    }

    $d = new D();
    echo $d->a();
    echo $d->b();
    echo $d->c();
?>