<?php
//如何在一个脚本中声明多个命名空间
//同一个脚本中，声明了多个命名空间
namespace first{

    echo __NAMESPACE__.'<br>';

    class A {

         public static function  index()
         {
             return '我的方法名是'.__METHOD__.'<br>';
         }
    }

     function var_dump($name)
     {
         return '我叫'.$name;
     }

     // var_dump()  等价于 \first\var_dump()

     echo \var_dump('王楚').'<br>';       //如果在var_dump()前面加上 \  说明是调用的php函数，否则是自己定义的函数
}


namespace second{

     echo __NAMESPACE__.'<br>';

      class B{

           public static function Metoo()
          {
               return '我在second中，我的方法名是'.__METHOD__.'<br>';
          }
      }
}

namespace {

    class G
    {
        public static function Haaa()
        {
            return __METHOD__;
        }
    }

     echo G::Haaa().'<br>';

     echo __NAMESPACE__.'<br>';

     echo  first\A::index().'<br>';    //first前的  \  可加可不加

    //换个姿势
    //使用关键字:namespace
    echo namespace\first\A::index(), '<br>';

    //使用魔术常量: __NAMESPACE__
    echo __NAMESPACE__.\first\A::index(), '<br>';


     echo  first\var_dump('DonnieKing').'<br>';
}