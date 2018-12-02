<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=php_edu;charset=utf8','root','123456');
$sql = "SELECT * FROM user";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
#$rows=[];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php if(count($rows)>0):   ?>
     <table border="1" cellspacing="0" cellpadding="5" width="60%" align="center">
         <caption><h2>用户信息表</h2></caption>
        <tr bgcolor="#7fffd4">
            <th>id</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>邮箱</th>
            <th>创建时间</th>
        </tr>
         <?php foreach($rows as $row): ?>
         <tr>
             <td><?php echo $row['user_id']?></td>
             <td><?php echo $row['name']?></td>
             <td><?php echo $row['sex']?"女":"男" ?></td>
             <td><?php echo $row['age']?></td>
             <td><?php echo $row['email']?></td>
             <td><?php echo date('Y年m月d日',$row['create_time'])?></td>
         </tr>
         <?php endforeach; ?>
     </table>
    <?php else: ?>
    <h2 style="color: red">暂无数据</h2>
    <?php endif; ?>
</body>
</html>

//使用Smarty模板引擎进行改写
{foreach $rows as $row}
<tr>
    <td>{$row.user_id}</td>
    <td>{$row.name}</td>
    <td>{$row.sex}</td>
    <td>{$row.age}</td>
    <td>{$row.email}</td>
    <td>{$row.create_time|date_format:"%Y %m %d"}</td>
</tr>
{foreachelse}
<h2 style="color: red">暂无数据</h2>
{/foreach}
