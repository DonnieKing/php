<?php
/**
 * 添加操作 insert($table,array $data)
 * 返回的是PDO预处理对象
 * Medoo框架中，凡是写操作，（insert,update,delete）,都返回的是预处理对象
 */

//1.实例化Medoo框架类
require __DIR__.'/connect.php';

//2.执行添加
$table = 'user';
$data['name'] = '杨幂';
$data['sex'] = 0;
$data['age'] = 32;
$data['email'] = 'ym@qq.com';
$data['password'] = sha1('123456');
$data['status'] = 1;
$data['create_time'] = time();

//添加、删除、修改返回的是预处理对象
$stmt = $db->insert($table,$data);
//var_dump($stmt);

//查看sql语句
echo 'sql语句为：'.$stmt->queryString.'<hr>';

//查看新增id
echo '新增主键id为'.$db->id().'<hr>';

//查看出错信息
echo '出错信息：'.print_r($stmt->errorInfo(),true);