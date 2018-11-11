<?php
//pdo 添加操作
//PDOStatement::rowCount — 返回受上一个 SQL 语句影响的行数
//PDOStatement::errorInfo — 获取跟上一次语句句柄操作相关的扩展错误信息

//1.创建PDO对象,连接数据库
$pdo = new PDO('mysql:host=127.0.0.1;dbname=php_edu;charset=utf8','root','123456');

//2.创建预处理对象$stmt
$sql = "INSERT INTO `user` (`name`,`sex`,`age`,`email`,`password`,`status`,`create_time`) VALUES (:name,:sex,:age,:email,:password,:status,:create_time)";
$stmt = $pdo->prepare($sql);

//3.参数绑定
$name='灭绝师太';
$sex = 1 ;
$age = 46;
$email='mjst@php.cn';
$password = sha1('123456');
$status = 1;
$create_time = time();
$stmt->bindParam('name',$name,PDO::PARAM_STR,20);
$stmt->bindParam('sex',$sex,PDO::PARAM_INT,20);
$stmt->bindParam('age',$age,PDO::PARAM_INT,20);
$stmt->bindParam('email',$email,PDO::PARAM_STR,20);
$stmt->bindParam('password',$password,PDO::PARAM_STR,20);
$stmt->bindParam('status',$status,PDO::PARAM_STR,20);
$stmt->bindParam('create_time',$create_time,PDO::PARAM_STR,20);


//3.执行添加
if($stmt->execute())
{
    echo ($stmt->rowCount()>0)?'成功添加了'.$stmt->rowCount().'条记录':'没有记录';
}
else{
    exit(print_r($stmt->errorInfo(),true));
}