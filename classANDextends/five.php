<?php
//静态成员是指使用 static 关键字修饰的成员
//静态成员不属于任何对象，只属于类！

//定义一个学生类  Student
//构造函数不是必须的，当一个类被实例化的时候构造函数（如果有）会被调用，它具体做什么视需求而定。
//构造函数就是在实例化类的时候就被运行的函数，可以有参数，也可以没有参数。构造函数主要用来在创建对象时初始化对象 即为对象成员变量赋初始值，比如说你的MyPc类，定义了$name，那么如果没有构造函数你在初始化MyPc类的时候$name的值就是空的，你可以定义一个构造函数来给$name一个值，因为很多时候我们并不允许某些对象变量的值是空的
    class Student{

         public static $schoolName="中北大学";

          public static function show()
          {
                return self::$schoolName;
          }
    }

        echo Student::$schoolName."<br>";

        echo Student::show();

?>