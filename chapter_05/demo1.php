<?php
//如何使用PDO来正确连接数据库?
/**
 * PDO对象
 * pdo($dsn,$user,$pass)
 * dsn:mysql:host=localhost/127.0.0.1;dbname=userDB;charset=utf8;
 */
/**
 * 使用PDO对象操作数据库
 * 1. PDO 是数据库访问的抽象层
 * 2. PDO 向所有的数据库提供了一套统一的访问规则
 *
 * PDO教学为了强调实用性,我们做以下约定
 * 1. 全部采用预处理方式操作数据表
 * 2. SQL语句全部采用流行的命名占位符,不再使用传统的问号(?)
 * 3. 涉及的类主要是PDOStatment类,PDO只涉及prepare()方法
 *
 */

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
//    var_dump($pdo);
//    echo '连接成功';

     //操作CURD

    // 关闭连接,只需要注销pdo对象,如果不关闭,系统也会自动关闭
    $dsn = null;
//     unset($dsn);
    var_dump($dsn);

}catch(PDOException $e){
    exit($e->getMessage());
}
