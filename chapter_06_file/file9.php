<?php
/**
 * 文件内容相关的其他函数
 * 1.file_get_contents 读取文件，不需要打开文件直接读取即可
 * 2.file_put_contents  写入文件，不需要打开文件直接写入即可
 */

//header('content-type:image/jpeg');

//直接获取文件内容
//echo file_get_contents('text.txt');
// 获取去除html标记的文件内容
//echo strip_tags(file_get_contents('text.txt'));
// 获取远程文件内容
//echo file_get_contents('http://www.baidu.com');
// 获取图片 注意：获取图片显示时需要声明头部
//echo file_get_contents('http://tpc.googlesyndication.com/daca_images/simgad/490239720318309264');


//var_dump(file_put_contents('text.txt','选择比努力更重要！'));
//$str = file_get_contents('text.txt');
//var_dump(file_put_contents('text.txt',$str.'我要成功！'));


$data = [
    'name'=> 'DonnieKing',
    'age'=> 20
];

//file_put_contents('text.txt',$data);

/*
 * 如果我们存入数组或对象必须要将它们进行数据的转换
 * 1.使用序列化来进转换  serialize
 * 2.使用json来进行转换
 */

//var_dump(file_put_contents('text.txt',serialize($data)));
/*
 * a:2:{s:4:"name";s:10:"DonnieKing";s:3:"age";i:20;}
 * a :array
 * 2:数组元素的个数
 * s:string
 * 4:字符的长度
 */
// unserialize() 反序列化，将序列化的代码转换为之前的样子
//var_dump(unserialize(file_get_contents('text.txt')));


//json_encode 将数组转换为json格式
var_dump(file_put_contents('text.txt',json_encode($data)));
// json_decode 将json格式的文件反转换
var_dump(json_decode(file_get_contents('text.txt')));



?>
