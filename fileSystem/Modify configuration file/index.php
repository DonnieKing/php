<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17 0017
 * Time: 20:15
 */
header("content-type:text/html;charset=utf-8");
//index.php 展示修改界面。将config.php中的配置项展示出来。展示到表单中：
    include 'config.php';
?>
<form action="edit.php" method="post">
    <input type="text" name="DB_HOST" value="<?php echo DB_HOST; ?>" /><br />
    <input type="text" name="DB_USER" value="<?php echo DB_USER;?>" /><br />
    <input type="text" name="DB_PWD" value="<?php echo DB_PWD;?>" /><br />
    <input type="text" name="DB_NAME" value="<?php echo DB_NAME;?>" /><br />


    <input type="submit" value="修改" />

</form>
