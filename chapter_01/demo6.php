<?php
 //1.定义常量
 //函数
 define('FACTION','古墓派');
 //关键字
 const USER_NAME='杨过';

 //2.访问
 echo FACTION.'的大弟子是:',USER_NAME.'<br>';

 //常量的本质就是一个只读变量
 //FACTION = '全真教';
 //unset(FACTION);

 //3.常量的作用域
 function demo() #创建一函数作用域，局部作用域
 {
     return '我是'.FACTION.'的二当家'.USER_NAME.'<br>';
 }

 //访问函数中的常量
 echo demo();

 //4.define 和 const 的区别
 $price = 99;
 //define('BOOK',$price);
 //const BOOK= $price;  //const不可以将变量赋值给常量。但是define可以

//const 它的常量值只允许标准变量：标量：整数、浮点、字符、布尔，必须是字面量
 const BOOK = 'php从入门到精通'.'<br>';
 echo BOOK;

 //const可以声明类常量
    class Test{
        //define('WANGCHU','DonnieKing');
        const WANGCHU = 'DonnieKing';
    }
    echo Test::WANGCHU;
?>