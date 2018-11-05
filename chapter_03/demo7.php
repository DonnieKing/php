<?php

/**
 * 一、url与路径相关的函数
 * 因为url与文件路径都是由字符串组成,所以也放在了字符串中学习
 */
//1.urlencode($url):url编码在特殊字符前加上%,防止服务器解析出现歧义
$url = urlencode('http://www.php.cn/');
echo $url, '<br>';
//使用的时候,必须要进行解码
echo '<a href="'. $url .'">php中文网</a><br>';  //访问失败
//在代码中使用时: urldecode($url)解码将期还原,就可以正常访问啦
echo '<a href="'.urldecode($url).'">php中文网</a><br><hr>';

//2.http_build_query  生成动态查询字符串(参数由数组提供): cate_id=3&art_id=10
echo http_build_query(['cate_id'=>3,'art_id'=>10]);
echo '<br>';
$url = 'http://www.php.cn/course/type/2.html?p=3';
echo $url, '<br>';
$url=parse_url($url);
echo '<pre>'.var_export($url,true).'<br>';
echo '<hr>';

/**
 * 二、json 相关函数
 * 二点约定:1.必须是utf8编码,2.不能处理资源类型: resource
 * 1.json_encode():将数据转为json字符串
 * 2.json_decode():将json字符串进行解码还原为变量
 */

//1. json_encode($var),返回json字符串,失败返回false
$girl = '波波姐';
//输出: "\u6ce2\u6ce2\u59d0"
echo json_encode($girl),'<br>';

//数组(胸围,腰围,臀围)
$bwh = ['bust'=>88,'waist'=>85, 'hips'=>90];
//输出: {"bust":88,"waist":85,"hips":90}
echo json_encode($bwh), '<br>';

//对象
$obj = new stdClass();
$obj->name = '吉泽明步';
$obj->age = 21;
$obj->bwh = ['bust'=>83,'waist'=>76, 'hips'=>88];
//输出: {"name":"\u5409\u6cfd\u660e\u6b65","age":21,"bwh":{"bust":83,"waist":76,"hips":88}}
echo json_encode($obj), '<br>';
echo '<hr>';

//2.json_decode($json_str,true): 默认返回对象,加true,返回数组

$json= '{"bust":99,"waist":95,"hips":110}';
$res=json_decode($json);
echo gettype($res); echo '<br>';
echo '<pre>'.var_export($res).'<br>';
echo $res->hips;
echo '<hr>';


$res=json_decode($json,true);
echo gettype($res); echo '<br>';
echo '<pre>'.var_export($res,true).'<br>';
echo $res['waist'];