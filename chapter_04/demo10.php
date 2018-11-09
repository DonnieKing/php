<?php
//Trait特性技术详解

//优先级
//Bus > trait > Auto
/**
 * trait 代码复用机制
 * 1.trait本意是特征,就是给当前类添加一些新特征;
 * 2.而这些新功能,尚不具备形成一个功能完善的类,并且也不方便用一个类进行包装
 * 3.类似于类的插件库,用来扩充当前类的功能,或者在不修改父类功能的前提下,实现功能动态更新
 * 4.它工作在当前类与父类之间(如果有),可覆写同名父类成员
 * 5.trai类之间可以相互组合,也可进行访问控制
 * 6.trait类中也可以有属性(7.0前类中不允许有与之同名属性,7.0后可以,但必须同性同值)
 *      所谓同性同值: 访问限制相同,初始值相同
 * 7.trait类尽管也使用与类一样的语法,但却不是类,所以不能实例化
 * 8.trait类是使用use关键字将自身代码插入到当前工作类中的
 * 9.trait类中的同名成员冲突可以使用替换(insteadof)和别名(as)来解决
 */
trait Func1
{
    //保养
    public function care()
    {
        return '我是Func1中的保养方法';
    }
    //驾驶
    public function drive()
    {
        return '支持无人驾驶';
    }
    //交能事故处理
    public function accident()  //['æksədənt]
    {
        return '汽车会自动报警,你就安静的坐在车里等警察来吧!';
    }
}

trait Func2
{
    //燃料能源
    public function fuel()
    {
        return '新能源汽车';
    }

    //交能事故处理
    public function accident()
    {
        return '只要不起火,电池还能继续使用的,放心吧!';
    }
}

class Auto
{
    public $brand;
    public $purpose;

    public function __construct($brand,$purpose)
    {
        $this->brand = $brand ;
        $this->purpose = $purpose ;
    }

    //保养
    public function care()
    {
        return '请到授权的专业4s店进行保养';
    }

}


class Bus extends Auto
{
    //导入trait类库: Func1, Func2,并声明命名冲突解决方案
//    use Func1;
//    use Func2;
     use Func1,Func2 {
         //当直接访问accident()时,用Func1中的同名方法替换Func2同名方法
         Func1::accident insteadof Func2 ;

         //为防止Func2中的accident()方法无法调用,可以使用别名,来解决冲突
         Func2::accident as Aaccident;
     }

    //保养
    public function care()
    {
        return '我是Bus中的保养方法';
    }

}

$bus = new Bus('奔驰','私家车');

echo $bus->brand.'<br>';
echo $bus->purpose.'<br>';

echo $bus->drive().'<br>';
echo $bus->care().'<br>';

echo '<hr>';

echo $bus->accident().'<br>';
//使用别名访问 Func2中的 accident()方法: 别名是: Func2Acc
echo $bus->Aaccident().'<br>';