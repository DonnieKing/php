<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17 0017
 * Time: 15:58
 */
//error_reporting(E_ALL & ~E_NOTICE);  //表示提示除去 E_NOTICE 之外的所有错误信息
  readfile("./NoALike.txt"); //传入一个文件路径，输出一个文件。
    echo "<br>";


  $filename="NoALike.txt";
  $filestring = file_get_contents($filename); //功能：传入一个文件或文件路径，打开这个文件返回文件的内容。文件的内容是一个字符串。
  echo $filestring."<br>";

  $filearray = explode("/n",$filestring);
  while(list($key, $val) = each($filearray))
  {
    ++$key;
    $val = trim($val);
      print 'Line' . $key .':'.  $val.'<br />';
  }


  $fp = fopen("NoALike.txt",'r'); // fopen函数的功能是打开文件，参数主要有两个：1.文件打开的路径 2.打开文件的模式
  var_dump($fp);
  $contents = fread($fp,1024);
  echo $contents."<br>";


  fclose($fp);
  echo $contents;

?>