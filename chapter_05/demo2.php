<?php
//PDO预处理查询的基本步骤
/**
 * PDO 查询操作之简单查询
 * 1. 预处理对象
 * 2. fetchAll()
 * 3. 获取记录数量
 */

//1.连接数据库,创建pdo对象
require './public/connect.php';

//2.创建预处理对象
/**
2.创建预处理对象,进行查询,这里演示一段最经典,也是最简单的方式

预处理对象是PDOStatment类的实例,他是SQL语句的模板对象,简称stmt对象
stmt对象中保存着数据库操作的所有内容,包括SQL语句,结果集,以及其它常用功能

创建SQL语句,变量部分使用: 命名占位符,注意不要加引号
推荐字段名和表名,全部加上反引号,防止与SQL关键字冲突
 */
//PDOStatement::rowCount — 返回受上一个 SQL 语句影响的行数
//PDOStatement::bindParam — 绑定一个参数到指定的变量名
//PDOStatement::bindColumn — 绑定一列到一个 PHP 变量
//PDOStatement::fetchColumn — 从结果集中的下一行返回单独的一列。
//PDOStatement::bindColumn — 绑定一列到一个 PHP 变量
//PDOStatement::fetch — 从结果集中获取下一行
//PDOStatement::fetchAll — 返回一个包含结果集中所有行的数组（PDO::FETCH_ASSOC，PDO::FETCH_NUM）
//****** PDO::prepare — 准备要执行的SQL语句并返回一个 PDOStatement 对象 (PHP 5 >= 5.1.0, PECL pdo >= 0.1.0)
//PDOStatement::execute — 执行一条预处理语句
//PDOStatement::setFetchMode — 为语句设置默认的获取模式。
//PDOStatement::errorInfo — 获取跟上一次语句句柄操作相关的扩展错误信息


$sql = "SELECT `user_id`,`name`,`email` FROM `user` WHERE `user_id` > :user_id ";
//$stmt是PDOstatement类的对象(prepare准备要执行的SQL语句并返回一个 PDOStatement 对象)
$stmt = $pdo->prepare($sql);

//为语句设置默认的获取模式。（即fetchAll()括号中不需要再填写PDO常量） 默认值是FETCH_BOTH
$stmt->setFetchMode(PDO::FETCH_ASSOC);
//3.执行查询语句:执行查询
if($stmt->execute([':user_id' => 2]))
{
    //4.解析结果集
    $rows = $stmt->fetchAll();  //括号里面是PDO常量
}
else{
     print_r($stmt->errorInfo());die;
}
//5.遍历结果集
//print_r($rows);
foreach ($rows as $row)
{
//    print_r($row) ;
//    echo '<hr>';
    echo print_r($row,true).'<hr>';
}


echo '共有'.count($rows).'条数据满足要求'.'<br>';
//不推荐   返回受上一个 SQL 语句影响的行数,一般用到写操作（删除，更新，添加）
echo '共有'.$stmt->rowCount().'条数据满足要求'.'<br>';


//获取表中的所有记录数据
$stmt = $pdo->prepare("SELECT count(*) AS num  From `user` ");
$stmt->execute();

//方法一：直接获取某列的数据
$num = $stmt->fetchColumn(0);
echo '共有'.$num.'条数据'.'<br>';

//方法二：将查询结果绑定到一个变量上
$stmt->bindColumn('num',$num);
$stmt->fetch(PDO::FETCH_BOUND);
echo '表中共有'.$num.'条数据';










