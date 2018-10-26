<?php
//final 关键字：不仅可以修饰类，还可以修饰方法

//类被final关键字修饰后，该类就不可以被其他类继承，也就是说不能够派生子类。

   final class Animal
   {

   }

   class Dog extends Animal    //不能够继承被final修饰的类
   {

   }

?>