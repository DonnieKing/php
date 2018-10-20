<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3 0003
 * Time: 18:38
 */
session_start();
$name = $_POST['name'];
$password = $_POST['password'];
if($remember == 1){
    setcookie('name',$name,time()+3600);
    setcookie('password',$password,time()+3600);
    setcookie('remember',$remember,time()+3600);
}else{
    setcookie('name',$name,time()-3600);
    setcookie('password',$password,time()-3600);
    setcookie('remember',$remember,time()-3600);
}
echo "<a href=\"remember.php\">返回</a>";

?>