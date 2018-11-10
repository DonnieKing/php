<?php
//数据库连接
//dsn:mysql:host=localhost/127.0.0.1;dbname=userDB;chatset=utf8;
$type = 'mysql';  //数据库类型
$host = '127.0.0.1'; //数据库主机名  linux/macos/unix:localhost
$dbname = 'php_edu';  //数据库名
$charset = 'utf8'; //默认编码
$port = 3306; //可选 默认值3306

//mysql:host=127.0.0.1;dbname=php_edu;charset=utf8;
$dsn = $type.':host='.$host.';dbname='.$dbname.';charset='.$charset;
$user = 'root';  //数据库用户名
$pass = '123456';  //数据库密码

try{
    //连接
    $pdo = new PDO($dsn,$user,$pass);

}catch(PDOException $e){
    exit($e->getMessage());
}
