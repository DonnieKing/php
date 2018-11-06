<?php
/**
 * 范围解析符(::)的使用
 * 1.访问类静态成员与类常量
 * 2.类内访问使用关键字:self,parent,static
 * 3.类外使用:类名
 */

class Book{

      //声明一个普通的动态成员属性
      public $name = '《mysql从删库到跑路》';

      //声名静态成员属性
      protected static $author = 'DonnieKing';

      //类常量，不要设置访问限制，本身就是属于类的
      const PRICE = 99;

    //在动态方法中,即可访问动态成员,也可访问静态成员
      public function getInfo1()
      {
          // 静态成员不允许用$this,因为它是属于类的,不属性对象
          //同样,在动态方法中也不推荐访问静态成员
          //普通动态成员
          // return $this->name;
          //静态成员 、类常量都可以访问
          return self::$author.self::PRICE;
      }

      //静态方法
    public static function getInfo2()
    {
        //不能访问 普通动态成员
        //   return $this->name;
        //静态成员 、类常量都可以访问
        return self::$author.self::PRICE;
    }

}

class Study extends Book{

    //子类的静态方法
      public static function getInfo3()
      {
          //可以访问父类的静态成员
          //应当使用当前父类的引用标识符：parent
          return parent::$author;
      }
}

$book = new Book();
//echo Book::getInfo1().'<br>';
//不推荐使用类直接调用动态方法,但仍能访问
//以后会在新版本中废除这种做法
 echo $book->getInfo1().'<br>';

//类外用类名访问静态方法
echo BOOK::getInfo2();
echo '<br>';

$study = new Study();
//用子类访问父类中的静态成员
echo Study::getInfo3();