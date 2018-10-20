<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3 0003
 * Time: 17:37
 */


     setcookie("user","wangchu",time()+3600); //setcookie() 函数必须位于 <html> 标签之前

     echo $_COOKIE['user']."<br>"; // Print a cookie
        print_r($_COOKIE);             // A way to view all cookies
        echo "<br>";

        if(isset($_COOKIE))
        {
            echo "welcome ".$_COOKIE['user']."<br>";
        }
        else{
        echo "welcome guest"."<br>";
    }

   // setcookie("user","",time()-3600);//当删除 cookie 时，您应当使过期日期变更为过去的时间点。
?>