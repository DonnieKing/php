<?php
require __DIR__.'/config/config.php';

//1.显示单值变量 标量
$name = '小龙女';
//模板赋值
$smarty->assign('name',$name);

//2.索引数组
$course = ['html','css','js','jQuery'];
//模板赋值
$smarty->assign('course',$course);

//3.关联数组
$book = ['name'=>'php从入门到放弃','price'=>'88','publish'=>'2016.10.30'];
$smarty->assign('book',$book);

//4.多维数组
$books = [
    ['name'=>'php从入门到放弃','price'=>'88','publish'=>'2016.10.30'],
    ['name'=>'javaScript经典讲义','price'=>'98','publish'=>'2017.1.30'],
    ['name'=>'html，css入门','price'=>'108','publish'=>'2014.5.10']
];
$smarty->assign('books',$books);

//5.对象
class Test{
    public $site =  'php中文网';
    public function welcome(){
        return '欢迎来到'.$this->site;
    }
}
$test = new Test();
$smarty->assign('test',$test);

//6.自定义函数
function add($a,$b){
    return $a.'+'.$b.'='.($a+$b);
}

//7.常量 不需要赋值（assign）,直接在模板中输出
const NAME='DonnieKing';

//8.系统常量
$_POST['username'] = 'DonnieKing';
$_GET['tel'] = 18335661677;
$_SESSION['pass'] = sha1('123456');

//模板渲染
$smarty->display('demo3.html');