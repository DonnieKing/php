<?php
    // 在继承一个类的同时实现接口
    // extends 和 implements 配合使用

    class D
    {
        public  function c()   //和类名不能相同  D和d也不行
        {
            echo "c";
        }
    }

    interface A
    {
        function a();
    }

    interface B
    {
        function b();
    }

    class C extends D implements A,B
    {
        function a()
        {
            echo "a";
        }
        function b()
        {
            echo "b";
        }
    }

    $c = new C();
     echo $c->a();
     echo $c->b();
     echo $c->c();
?>