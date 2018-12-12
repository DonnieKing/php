<?php

/**
 * Medoo查询操作
 */

require __DIR__.'/connect.php';

//2.执行查询
$table = 'user';
$fields = ['name','sex','age','email'];
$where = ['status'=>1];
//查询年龄大于20的用户
$where = ['age[>]'=>20];

//复合条件： AND 或 OR
//查询年龄小于40，并且性别等于1
$where = ['AND'=>['sex'=>1,'age[<]'=>30]];

$rows = $db->select($table,$fields,$where);

foreach ($rows as $row)
{
    echo print_r($row,true).'<hr>';
}