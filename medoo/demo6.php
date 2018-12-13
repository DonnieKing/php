<?php
/**
 * 其他常用操作
 */

//实例化Medoo框架类
require __DIR__.'/connect.php';

//1、获取一条记录
$row = $db->get('user',['name','sex','age','email'],['user_id[>]'=>6]);
echo print_r($row,true).'<hr>';

//2、判断某个值是否存在？返回布尔值
//案例：验证用户登录，email,password
$res = $db->has('user',['AND'=>['email'=>'974309696@qq.com','password'=>sha1('123456')]]);
echo $res?'<h3>验证通过，登录成功！</h3>':'<h3 style="color: red">邮箱或密码错误</h3>';
echo '<hr>';

//3.获取表中满足条件的记录数量
echo '表中共有'.$db->count('user').'条记录'.'<hr>';
//设置查询条件
echo '表中共有'.$db->count('user',['sex'=>1]).'个女用户'.'<hr>';


//4.使用原生sql语句查询
$sql  = "SELECT `user_id`,`name`,`email` FROM `user` WHERE `status`=1 ORDER BY `age` DESC LIMIT 3";

//用query方法执行原生，返回的还是一个预处理对象
//$stmt = $db->query($sql);
//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rows = $db->query($sql)->fetchAll();
foreach ($rows as $row)
{
    echo $row['user_id'].'---'.$row['name'].'---'.$row['email'].'<br>';
}

echo '<hr>';

//Medoo提供一个pdo属性，就是一个PDO对象
//可以直接使用pdo属性进行原生pdo查询
$stmt = $db->pdo->prepare("SELECT * FROM `user` WHERE `age`>:age");
$age = 30;
$stmt->bindParam(':age',$age,PDO::PARAM_INT);
if($stmt->execute())
{
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        if(!empty($row))
        {
            echo print_r($row,true).'<br>';
        }
    }

}
else
{
    die(print_r($stmt->errorInfo(),true));
}




