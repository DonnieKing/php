<?php
/**
 * static 关键字
 * 1. 定义与访问类静态成员
 * 2. 访问类常量
 * 2. 后期静态绑定(延迟静态绑定)
 */

class MyClass{

    //const 定义类常量
    const DOMAIN = 'www.php.cn';

    //static定义静态属性：被类的所有实例所共享
    public static $desc = '免费公益，海量资源';

    //静态方法
    public static function getDesc()
    {
//        $domain = self::DOMAIN;
        $domain = static::DOMAIN;

//        $desc = self::$desc;
        $desc = static::$desc;
        return '('.$domain.')'.$desc;
    }
}

 //外部访问类中的静态属性
echo MyClass::$desc.'<br>';
echo MyClass::DOMAIN.'<br>';
echo MyClass::getDesc();
