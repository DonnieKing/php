<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/10 0010
 * Time: 17:59
 */
header("content-type:text/html;charset=utf-8");
error_reporting(E_ALL & ~E_NOTICE);  //表示提示除去 E_NOTICE 之外的所有错误信息

// 读取COOKIE的用户名和密码的值即可
if($_COOKIE['name'] != "")
    {
        $CKNAME = $_COOKIE['name'];
    }
    if($_COOKIE['password']!= "")
    {
        $CKPASS = $_COOKIE['password'];
    }

    echo $CKNAME."<br>";
    echo $CKPASS;


?>

<form action="" method="post">
    用户名：<input type="text" name="name" id="name" value="<?php echo $CKNAME; ?>"><br>
    密码：<input type="text" name="password" id="password" value="<?php echo $CKPASS; ?>"><br>
    <input type="checkbox" name="remember" id="remember" value="1" <?php if($CKNAME !=""){ ?>  checked="checked" <?php } ?> >记住我<br>
    <input type="submit" name="button" id="button" value="登录"><br>
</form>

<?php
    //登录，将用户名和密码存入到COOKIE
    if($_POST['button'] != "")
    {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];
    if($remember == 1)
    {
        setcookie("name","$name",time()+60*60*24*30);
        setcookie("password","$password",time()+60*60*24*30);
    }
    }
?>
