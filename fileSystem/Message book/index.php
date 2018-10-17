<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17 0017
 * Time: 19:40
 */
error_reporting(E_ALL & ~E_NOTICE);  //表示提示除去 E_NOTICE 之外的所有错误信息
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
@$string = file_get_contents("message.txt"); //@屏蔽错误
if(!empty($string))
{
    //每一段留言有一个分格符，但是最后多出了一个&^。因此，我们要将&^删掉
    $string = rtrim($string,'$^');
    //以&^切成数组
    $arr = explode("$^",$string);
    //将留言内容读取
    foreach($arr as $value){
        list($username,$content,$time) = explode('$#',$value);
        echo '用户名为<font color="gree">' . $username . '</font>内容为<font color="red">' . $content . '</font>时间为' . date('Y-m-d H:i:s', $time);
        echo '<hr />';
    }
}



?>

<h1>基于文件的留言本演示</h1>
<form action="write.php" method="post">
    用户名：<input type="text" name="username" /><br />
    留言内容：<textarea  name="content"></textarea><br />
    <input type="submit" value="提交" />
</form>