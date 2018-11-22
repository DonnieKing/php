<?php
/**
 * mysqli函数连接、关闭数据库
 */

header("Content-Type:text/html;charset=utf-8");


 //连接数据库   加 @ 隐藏错误
 $db = @mysqli_connect('127.0.0.1','root','123456','php_edu','3306');
  if(!$db)
  {
      //连接错误，抛出异常
      exit('数据库报错：'.mysqli_connect_error());
  }

  //设置数据库编码
  mysqli_set_charset($db, "utf8");

  //获取当前时间戳
  $add_time = time();
  $sql = "INSERT INTO `director` (`name`,`phone`,`country`,`add_time`) VALUES ('李安','18855556666','中国','{$add_time }')";
  echo insert($db,$sql);





  //关闭数据库
  mysqli_close($db);


  //插入数据
  function insert($db,$sql)
  {
      //执行插入
      $return = mysqli_query($db,$sql);
      if($return)
      {
          $return = mysqli_insert_id($db);
      }
      return $return;
  }
