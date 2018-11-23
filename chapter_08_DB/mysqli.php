<?php
/**
 * mysqli方法库
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
  $sql_1 = "INSERT INTO `director` (`name`,`phone`,`country`,`add_time`) VALUES ('李安','18855556666','中国','{$add_time }');";
  $sql_2 = "UPDATE `director` set name = '黄渤',phone='15566662222' WHERE tid = 4 ;";
  $sql_3 = "DELETE FROM `director` WHERE tid = 6;";
  $sql_4 = "INSERT INTO `users` (name,phone,country,birthday,weight,height,add_time) VALUES ('周星驰','16655556666','中国','1965-1-20',140,175,'{$add_time }');";
  $sql_5 = "SELECT * FROM `users` ORDER BY uid DESC LIMIT 0,5;";
  //查询单条数据
  $sql_6 = "SELECT * FROM `users` LIMIT 1;";
  //查询总条数
  $sql_7 = "SELECT COUNT(*) AS count_num FROM `users`;";

   //echo '<pre>'.var_export(find($db,$sql_6),true);
   //echo '<pre>'.var_export(find_one($db,'users','name','uid=5'),true);
   // $res = find_one($db,'users','name','uid=5');
   // $return = mysqli_query($db,$sql_7);
    //$return = mysqli_fetch_assoc($return);

    //传table值的时候，需要用'' ，不能用反引号了
    $return = count_number($db,'users','country="中国"');
    print_r($return);



   //关闭数据库
   mysqli_close($db);

   //统计数量
   function count_number($db,$table,$where)
   {
       $sql = "SELECT COUNT(*) AS count_num FROM ".$table." WHERE ".$where;
       $return = mysqli_query($db,$sql);
       $return = mysqli_fetch_assoc($return);
       return $return['count_num'];
   }

   //查询单个数据
    function find_one($db,$table,$field,$where)
    {
        $sql = "SELECT ".$field." FROM ".$table.' WHERE '.$where.' LIMIT 1';
        //针对成功的 SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询，将返回一个 mysqli_result 对象。针对其他成功的查询，将返回 TRUE。如果失败，则返回 FALSE。
        $return = mysqli_query($db,$sql);
        $return = mysqli_fetch_assoc($return);
        return $return;
    }

   //查询单条数据
   function find($db,$sql)
   {
       $return = mysqli_query($db,$sql);
       $return = mysqli_fetch_assoc($return);
       return $return;
   }

  //查询数据库
  function select($db,$sql)
  {
      //$sql = 'SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY '.$order;;
      //echo $sql;
      $return = mysqli_query($db,$sql);
      if($return)
      {
          //mysqli_fetch_assoc() 函数从结果集中取得一行作为关联数组。
          while($row = mysqli_fetch_assoc($return))
          {
              $rows[] = $row;
          }
          //mysql_free_result() 函数释放结果内存。成功返回true，失败返回false
          mysqli_free_result($return);
      }
      return $rows;
  }
  
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

  //修改数据
  function save($db,$sql)
  {
      $return = mysqli_query($db,$sql);
      return $return;
  }

  //删除数据
   function delete($db,$sql)
   {
       $return = mysqli_query($db,$sql);
       return $return;
   }
