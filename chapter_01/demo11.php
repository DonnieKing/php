<?php
/**
 * 流程控制之分支结构
 * 1. 分支:单分支,双分支,多分支,switch
 * 2. 分支结构使用脚本具备了简单的人工智能
 */


//声明变量$grade,表示成绩,并在声明时初始化为80
$grade = 70;

//1.单分支
if ($grade >= 60) {
    echo '及格啦~~<br>';
}

//2.双分支
$grade = 50;

if ($grade >= 60) {
    echo '及格啦~~<br>';
} else {
    echo '准备补考吧,骚年~~<br>';
}

echo '<hr>';
//实际上,我们之前已经见过这种分支结构了,不过我们当时使用的是简写语法
//双分支简写: 条件 ? 真 : 假 ;
//将刚才的案例简写
echo ($grade >= 60) ? '及格啦~~<br>' : '准备补考吧,骚年~~<br>';
//在判断某个变量是否定义的时候,非常有用
//例如,如果变量已定义,那么就直接使用,否则就给他一个默认值
//$site = isset($site) ? $site : 'php中文网';
$site = isset($site) ? : 'php中文网';
echo $site;


echo '<hr>';

//3.多分支
$grade = 75;
$grade = 85;
$grade = 95;

if ($grade < 60) {
    echo '准备补考吧,骚年~~<br>';
} elseif (($grade >= 60) && ($grade < 80)) {
    echo '太棒了,这是要成为学霸的节奏呀~~<br>';
} elseif (($grade >= 80) && ($grade < 90)) {
    echo '恭喜,你已经进入到了学霸的行列啦~~<br>';
} else {
    echo '你来教,我走~~<br>';
}

echo '<hr>';

//4.switch
//switch,可以让多分支判断的结构更加的清晰
//下面用switch结构将上面的多分支案例进行重写

$grade = 80;
switch ($grade) {
    case ($grade < 60):
        echo '准备补考吧,骚年~~<br>';
        break;

    case (($grade >= 60) && ($grade < 80)):
        echo '太棒了,这是要成为学霸的节奏呀~~<br>';
        break;

    case (($grade >= 80) && ($grade < 90)):
        echo '恭喜,你已经进入到了学霸的行列啦~~<br>';
        break;

    default:
        echo '你来教,我走~~<br>';
        break;
}


//switch()分支,更多的应用场景是根据一个变量的值,来确定执行哪个分支
$brand = 'Apple';
$brand = 'HUAWEI';
$brand = 'MI';
switch (strtolower($brand)) {
    case 'apple':
        echo '您选择是苹果手机<br>';
        break;

    case 'huawei':
        echo '您选择是华为手机<br>';
        break;

    case 'mi':
        echo '您选择是小米手机<br>';
    //每个分支执行完毕,应该用break进行跳出,否则会顺序执行下去的
    // break;

    case 'oppo':
        echo '您选择是oppo手机<br>';
        break;

    default:
        echo '您选择的手机品牌暂时未收录~~<br>';
        break;
}

?>