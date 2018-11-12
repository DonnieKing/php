<?php
//PDO预处理之删除操作详解
/**
 * pdo 删除操作
 */

//1.连接数据库,创建pdo对象
$pdo = new PDO('mysql:host=127.0.0.1;dbname=php_edu;charset=utf8','root','123456');

//2.创建sql语句
$sql = "DELETE FROM `user`  WHERE `user_id`= :user_id  ";

//3.创建预处理对象$stmt
$stmt = $pdo->prepare($sql);

//4.参数绑定
$user_id = 5;

$stmt->bindParam('user_id',$user_id,PDO::PARAM_INT);


//5.执行更新
if($stmt->execute())
{
    echo ($stmt->rowCount()>0)?'成功删除了'.$stmt->rowCount().'条记录':'没有记录被删除';
}
else{
    exit(print_r($stmt->errorInfo(),true));
}