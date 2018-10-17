<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17 0017
 * Time: 16:34
 */
    header("content-type:text/html;charset=utf-8");
    $data = "学好php，工作不用愁";
    $file = file_put_contents("writeFile.txt",$data);//功能：向指定的文件当中写入一个字符串，如果文件不存在则创建文件。返回的是写入的字节长度
     if($file)
     {
         echo "写入成功"."<br>";
         echo  file_get_contents("writeFile.txt")."<br>";
     }else{
         echo "写入失败或没有权限" ;
}

$fp = fopen("writeFile2.txt","a");
$len = fwrite($fp,'我是一匹来自北方的狼'); //fwrite() 返回写入的字符数
fclose($fp);
print $len.'字节被写入了';
?>