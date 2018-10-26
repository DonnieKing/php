<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/26 0026
 * Time: 15:57
 */
    class Person{

        public $name;
        private $age;
        public $telphone;

        //构造方法
        function __construct($name,$age,$telphone)
        {
            $this->name = $name;
            $this->age = $age;
            $this->telphone = $telphone;
        }

        private function say()
        {
            echo "我叫".$this->name.",我今年".$this->age.",我的手机号是".$this->telphone."<br>";
        }
         public function  hello()
         {
             $this->say();
         }

        //定义一个公有的获取私有年龄属性的方法，以便于对象能够获取私有的年龄属性，但是这种做法不够灵活
         public function getAge()
         {
             return $this->age;
         }

    }

     $a = new Person("DonnieKing",20,18335661677);

    $a->hello();

    echo $a->name;

    echo $a->getAge();


?>