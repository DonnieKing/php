<?php
//csv文件操作函数

$file = fopen('text2.csv','rb+');

//fgetcsv()读取文件内容
//和 fgets() 类似，只除了 fgetcsv() 解析读入的行并找出 CSV 格式的字段然后返回一个包含这些字段的数组。

//var_dump(fgetcsv($file));
//print_r(fgetcsv($file));
//print_r(fgetcsv($file));

//echo '<pre>';
//while($row = fgetcsv($file))
//{
//    print_r($row);
//}


//fputcsv 写入csv文件内容
//fputcsv() 将一行（用 fields 数组传递）格式化为 CSV 格式并写入由 handle 指定的文件。
$data = [
    [4,'html','sublime'],
    [5,'php','phpstorm'],
    [6,'java','eclipse']
];

//fputcsv($file,$data);   应该一行一行的来
//foreach($data as $value)
//{
//    fputcsv($file,$value,'~');
//}

echo '<pre>';
while($row = fgetcsv($file,30,'~'))
{
    print_r($row);
}
