<?php
// PDO预处理对结果集的解析与遍历
/**
 * PDO 查询操作
 * 1. 参数绑定: bindParm() 和 bindValue()
 * 2. fetch() 与 while 解析遍历结果集
 * 3. mysql中滚动游标只能用在存储过程中,所以默认只能前进,代码中不要使用滚动模式
 * 4. 如果想精准控制,请把结果集解析到数组处理,调用数组函数,想怎么处理都可以
 * 5. 所以对于mysql来讲,游标是个坑,大家能绕多远绕多远
 */
//1.创建pdo对象，连接数据库
$pdo = new PDO('mysql:host=127.0.0.1;dbname=php_edu;charset=utf8','root','123456');

//2.创建预处理对象stmt
$sql = "SELECT `user_id`,`name`,`email`,`create_time` FROM `user` WHERE `status` = :status";
$stmt = $pdo->prepare($sql);

//3.执行
$stmt->execute([':status'=>1]);

//4.遍历结果
//fetch — 从结果集中获取下一行
//fetchAll — 返回一个包含结果集中所有行的数组（PDO::FETCH_ASSOC，PDO::FETCH_NUM）
//$row = $stmt->fetch(PDO::FETCH_ASSOC);
$rows = [];
while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $rows[] = $row;
}

//5.释放结果集
$stmt = null ;

//6.关闭连接
$pdo = null ;

//print_r($rows);

?>
<style>
    table,th,td{
         border:1px solid #666;

    }
    table{
        width:50%;
        text-align: center;
        margin:30px auto;
        border-collapse: collapse;
    }
    table caption{
        font-size: 1.5em;
        font-weight: bold;
    }
    table tr:first-child{
        background: lightblue;
    }

</style>
 <table>
     <caption>用户信息表</caption>
      <tr>
          <th>用户ID</th>
          <th>姓名</th>
          <th>邮箱</th>
          <th>注册时间</th>
      </tr>
      <?php foreach($rows as $row): ?>
     <tr>
         <td><?php echo $row['user_id'] ?></td>
         <td><?php echo $row['name'] ?></td>
         <td><?php echo $row['email'] ?></td>
         <td><?php echo date('Y/m/d',$row['create_time']) ?></td>
     </tr>
    <?php endforeach ?>
 </table>
