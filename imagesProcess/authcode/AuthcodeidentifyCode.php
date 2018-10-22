<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/22 0022
 * Time: 17:00
 */
session_start();
//error_reporting(E_ALL & ~E_NOTICE);  //表示提示除去 E_NOTICE 之外的所有错误信息
header("Content-Type:text/html;charset=utf-8");      //设置头部信息

  if(isset($_POST['code'])){
      echo $_SESSION['authcode']."<br>";
      echo $_POST['code']."<br>";
      if(strtolower($_POST['code']) == strtolower($_SESSION['authcode'])){
          echo "<script language=\"javascript\">location.href='welcome.php';</script>";

      }
      else{
          echo "验证码错误";
      }
  }
  else{
      echo "没有信息";
  }
?>