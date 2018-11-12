<?php
//PDO预处理之更新操作详解
/**
 * pdo 更新操作
 */

//1.连接数据库,创建pdo对象
$pdo = new PDO('mysql:host=127.0.0.1;dbname=php_edu;charset=utf8','root','123456');

//2.创建sql语句
$sql = "UPDATE `user` set `email` = :email,`create_time` = :create_time WHERE `user_id`= :user_id  ";

//3.创建预处理对象$stmt
$stmt = $pdo->prepare($sql);

//4.参数绑定
$user_id = 4;
$email = 'xln@qq.com';
$create_time = time();
$stmt->bindParam('user_id',$user_id,PDO::PARAM_INT);
$stmt->bindParam('email',$email,PDO::PARAM_STR,100);
$stmt->bindParam('create_time',$create_time,PDO::PARAM_STR,100);

//5.执行更新
if($stmt->execute())
{
    echo ($stmt->rowCount()>0)?'成功更新了'.$stmt->rowCount().'条记录':'没有记录被更新';
}
else{
    exit(print_r($stmt->errorInfo(),true));
}