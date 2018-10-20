
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26
 * Time: 11:54
 */
     if(!empty($_POST)) {
         $num1 = $_POST['num1'];
         $num2 = $_POST['num2'];
         $oper = $_POST['oper'];
         $result = 0;
         switch ($oper) {
             case '+':
                 $result = $num1 + $num2;
                 break;
             case '-':
                 $result = $num1 - $num2;
                 break;
             case '*':
                 $result = $num1 * $num2;
                 break;
             case '/':
                 $result = $num1 / $num2;
                 break;
         }

         echo "当前的计算结果是$result";

     }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <form action="" method="post">
         <input type="text" name="num1">
         <select name="oper" id="">
             <option value="+">+</option>
             <option value="-">-</option>
             <option value="*">*</option>
             <option value="/">/</option>
         <lect>
         <input type="text" name="num2">
         <input type="submit" value="提交">

     </form>

</body>
<ml>
