<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/10 0010
 * Time: 17:12
 */
    setcookie("mycookie['one']","one");
    setcookie("mycookie['two']","two");
    setcookie("mycookie['three']","three");

    if(isset($_COOKIE['mycookie']))
    {
     foreach($_COOKIE['mycookie'] as $name => $value)
        {
            echo "$name  $value <br>" ;
        }
    }
?>