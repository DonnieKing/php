<?php
//后期静态绑定（延迟静态绑定）
//定义一个父类
//这就要用到后期静态绑定的技术,所谓后期,是指静态方法的调用者,只有在运行状态下才
//进行动态绑定,使用关键字 static 来实现
//此时, static 就像一个变量,始终与当前的调用类是绑定的


class Father{

        public static $money = 50000;

        //静态方法
        public static function  getClass()
        {
            //返回当前的类名
            return __CLASS__;
        }

        //静态方法: 访问当前类中的其它静态成员
        public static function getMoney()
        {
             // return self::getClass().'=>'.self::$money;
            //后期静态绑定,使用static,在静态继承的上下文中,动态的与调用类绑定(动态设置静态成员的调用者（主体）)
            return static::getClass().'=>'.static::$money;
        }
}


class Son extends Father {

    //覆写父类静态属性
    public static $money = 30000;

    //覆写父类中的静态方法
    public static function getClass()
    {
        return  __CLASS__;
    }

}

 echo Father::$money.'<br>';
//调用父类的静态方法,获取父类类名
 echo Father::getClass().'<br>';
//获取父类中其它静态成员的相关信息
 echo Father::getMoney().'<hr>';


 echo Son::$money.'<br>';

//子类调用父类的静态方法
//Son类覆写了Father类的getClass(),调用子类已重写的方法,返回子类名称
 echo Son::getClass().'<br>';

//因为Son类继承了Father类,所以也可以直接访问父类中的getMoney()方法
//因为没有子类Son中对getMoney()进行覆写,所以访问的还是Father类中的数据
 echo Son::getMoney().'<hr>';

//此时我再用父类调用getMoney(),static 也会自动与 Father类绑定
echo Father::getMoney();


//思考1: 在子类中能否用static ？
//答: 当然可以,因为static 始终与当前调用类绑定,子类也可以调用静态成员。

//思考2: 类中使用static::调用的类静态成员,是不是都可以被覆写?
//当然可以,在子类中不仅可以覆写类静态成员,还包括类常量都可以覆写

//思考3: static 是不是只可以适合于类静态成员?
//是的,也包括类常量,也可以用static进行后期绑定