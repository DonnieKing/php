<?php

//连接redis
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
//echo 'redis'.$redis->ping();

/**
 * 向redis添加、修改数据，得到数据
 */
//设置值到redis
$redis->set('name','DonnieKing');
$redis->set('name','韦小宝');
$name = $redis->get('name');
echo $name;

echo '<hr>';

/**
 * 队列
 */
//队列左侧加入
//$redis->lPush('list','html');
//$redis->lPush('list','css');

//队列右侧加入
//$redis->rPush('list','javaScript');

//从左侧弹出
//$popValue = $redis->lPop('list');
//echo '从左侧弹出的元素是'.$popValue.'<hr>';

//从右侧弹出
//$popValue = $redis->rPop('list');
//echo '从右侧弹出的元素是'.$popValue.'<hr>';


//取出队列中的值
//$value = $redis->lRange('list',0,-1);
//echo '<pre>'.var_export($value,true);


/**
 * 字典
 */
//往字典里设置数据
$redis->hset('hash','annimal','dog');
$redis->hSet('hash','person','DonnieKing');
//取出字典中的数据
$annimal = $redis->hGet('hash','annimal');
$person = $redis->hGet('hash','person');
echo $person.'<br>';
echo $annimal;

//返回字典中所有的key
$keys = $redis->hKeys('hash');
echo '<pre>'.var_export($keys,true);
//返回字典中所有的value
$values = $redis->hVals('hash');
echo '<pre>'.var_export($values,true);
//返回字典中所有的key_value
$key_value = $redis->hGetAll('hash');
echo '<pre>'.var_export($key_value,true).'<br>';
//返回字典中key的数量
$key_num = $redis->hLen('hash');
echo 'key的数量是：'.$key_num;

//删除
$redis->hDel('hash','annimal');
$key_value = $redis->hGetAll('hash');
echo '<pre>'.var_export($key_value,true).'<br>';