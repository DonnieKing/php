<?php
/**
 * 删除操作 delete($table,$where)
 * Medoo框架中，凡是写操作，（insert,update,delete）,都返回的是预处理对象
 */

//1.实例化Medoo框架类
require __DIR__.'/connect.php';

//2.删除
$table = 'user';
$where['user_id'] = 15;
$where = ['user_id[=]'=>15];

$stmt = $db->delete($table,$where);

if($stmt->rowCount()>0)
{
    echo '成功删除了'.$stmt->rowCount().'条数据'.'<hr>';
}


echo '查看出错信息:'.print_r($stmt->errorInfo(),true);
