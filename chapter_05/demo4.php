<?php
/**
 * PDO查询中的二个绑定
 * 1. 参数绑定
 * 2. 列绑定
 */

//操作数据表时,表名是确定
//影响到查询结果行数(水平方向)的,就是查询条件,也就是组成条件的查询参数
//影响到查询结查列数(垂直方向,也叫投影操作),就是列数
//为了更好的操作数据表,PDO提供了可以直接将查询参数绑定到变量,以及结果集中的列绑定到变量的机制
//一条sql语句,参数是用命名占位符表示, 列名是不允许使用占位符的,但可以与变量绑定,来方便遍历结果集


/**
 * 一、参数绑定到变量
 * 参数绑定到变量或值的三种方式
 * 1. bindParam(':占位符', 变量, 类型常量),类型常量默认为字符串
 * 2. bindValue(':点位符', 值或变量,类型常量),如果直接传值,可省略类型常量
 * 3. execute([':占位符'=>值/变量]): 将参数以数组方式与SQL语句的占位符绑定
 */

//1.创建PDO对象,连接数据库
$pdo = new PDO('mysql:host=127.0.0.1;dbname=php_edu;charset=utf8','root','123456');

//2.创建预处理对象$stmt
$sql = "SELECT `user_id`,`name`,`email`,`create_time` FROM `user` WHERE `status` = :status";
$stmt = $pdo->prepare($sql);

//参数绑定
$status = 1;
//bindValue()支持字面量,bindParam()不允许
$stmt->bindParam(':status',$status,PDO::PARAM_INT);
//$stmt->bindValue(':status',1,PDO::PARAM_INT);
//3.执行
$stmt->execute();


//4.遍历结果
$stmt->bindColumn(1,$id,PDO::PARAM_INT);
$stmt->bindColumn(2,$name,PDO::PARAM_STR,20);
$stmt->bindColumn(3,$email,PDO::PARAM_STR,100);
$stmt->bindColumn(4,$createTime,PDO::PARAM_STR,100);

$rows=[];
while ( $stmt->fetch(PDO::FETCH_ASSOC))
{
    //echo $id.'--'.$name.'--'.$email.'--'.$createTime.'<br>';
    //将变量转化为关联数组
    $rows[] = compact('id','name','email','createTime');  //必须写成 $rows[]  带中括号（相当于往数组里添加，如果不带相当于赋值）
//    print_r($rows);
}

//5.释放结果集
$stmt = null;

//6.关闭连接
$pdo = null;

//tr>td*4
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
     <?php foreach ($rows as $row): ?>
     <tr>
         <td><?php echo $row['id'] ?></td>
         <td><?php echo $row['name'] ?></td>
         <td><?php echo $row['email'] ?></td>
         <td><?php echo date('Y/m/d',$row['createTime']) ?></td>
     </tr>
    <?php endforeach; ?>

<!--      --><?php //foreach($rows as $row){
//
//          echo '<tr>';
//          echo '<td>'.$row['id'].'</td>';
//          echo '<td>'.$row['name'].'</td>';
//          echo '<td>'.$row['email'].'</td>';
//          echo '<td>'.date('Y/m/d',$row['createTime']).'</td>';
//          echo '</tr>';
//
//      }
//          ?>
 </table>


