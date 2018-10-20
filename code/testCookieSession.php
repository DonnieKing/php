<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3 0003
 * Time: 18:32
 */

    session_start();

?>
<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <form action="receiveCookie.php" method="post">
            用户名：<input type="text" name="name" value="<?php echo $_COOKIE['name'];?>"><br>
            密码：<input type="text" name="password" value="<?php echo $_COOKIE['password']?>">

            <input type="submit" value="提交">
        </form>
</body>
</html>
