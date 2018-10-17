<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17 0017
 * Time: 17:43
 */
header("content-type:text/html;charset=utf-8");
    if(is_executable('readfile.php'))
    {
        echo '可读';
        exit;
    }
    else{
        echo 'NO';
    }

    echo "<br>";
//可以定义一批文件是否存在
$files = [
    'config.php',
    'img/',
    'uploads/',
];

//定义标志位变量
$flag = true;
foreach($files as  $v){
    echo $v;

    //判断是文件还是文件夹

    if(is_file($v)){
        echo '是一个文件    ';
    }else if(is_dir($v)){
        echo '是一个文件夹    ';
    }

    if(is_readable($v)){
        echo ' 可读';
    }else{
        echo '<font color="red">不可读</font>';
    }

    if(is_writeable($v)){
        echo '可写';
    }else{
        echo '<font color="red">不可写</font>';
    }

    echo '<br />';
}

if($flag){
    echo '<a href="step1">下一步</a>';

}else{
    echo '不能进行安装';
}
?>