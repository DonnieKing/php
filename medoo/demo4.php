<?php
/**
 * 更新操作 update($table,$data,$where)
 *Medoo框架中，凡是写操作，（insert,update,delete）,都返回的是预处理对象
 */

//1.实例化Medoo框架类
require __DIR__.'/connect.php';

$table = 'user';

//2.更新内容
$data['sex'] = 1;
//你可以修改没有序列化的数组, 并且能使用 [+], [-], [*], [/] 来做运算
$data['age[+]'] = 1; //相当于 age = age+1
$data['status'] = 0;
$data['create_time'] = time();

//更新条件
//$where = ['user_id[=]'=>15];
$where['user_id'] = 17;

//3.执行更新
$stmt = $db->update($table,$data,$where);

$num = $stmt->rowCount();

if($num>0)
{
    echo '成功更新了'.$num.'条数据'.'<hr>';
}



//查看出错信息
echo '出错信息：'.print_r($stmt->errorInfo(),true);