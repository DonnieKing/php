<?php

error_reporting(E_ALL & ~E_NOTICE);  //表示提示除去 E_NOTICE 之外的所有错误信息
    if(!is_numeric($num1) || !is_numeric($num2))
    {
        echo "请输入数字";
    }
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $op = $_POST['op'];

        $result = "";
        switch ($op) {
            case "+":
                $result = $num1 + $num2;
                break;
            case "-":
                $result = $num1 - $num2;
                break;
            case "*":
                $result = $num1 * $num2;
                break;
            case "/":
                if ($num2 == 0) {
                    echo "<script>alert('除数不能为0')</script>";
                    //header('Location:calculator.php?error=除数不能为0！');
                    break;
                } else {
                    $result = $num1 / $num2;
                    break;
                }
        }
echo microtime()."<br>";
$pageendtime = microtime();  //返回当前 Unix 时间戳的微秒数：
$starttime = explode(" ", $pageendtime); //explode() 函数把字符串打散为数组;第1个为执行时间，第二个为unix时间戳
echo time()."<br>";
$endtime = explode(" ",$pageendtime);
$totaltime = $endtime[0]-$starttime[0]+$endtime[1]-$starttime[1];
$timecost = sprintf("%s",$totaltime);
echo "页面运行时间：".$timecost;
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>简易计算器</title>
        </head>
        <body>
        <form action="" method="post" name="form">
            <input type="text" name="num1" value=<?php echo $num1; ?>>
            <select name="op"  >
                <option value="+" <?php if($op=="+") {echo "selected";} ?>>+</option>
                <option value="-" <?php if($op=="-") {echo "selected";} ?>>-</option>
                <option value="*" <?php if($op=="*") {echo "selected";} ?>>*</option>
                <option value="/" <?php if($op=="/") {echo "selected";} ?>>/</option>
            </select>
            <input type="text" name="num2" value=<?php echo $num2; ?>>
            <input type="submit" value="=">
            <input type="text" name="result" value=<?php echo $result; ?>>
        </form>
        </body>
        </html>
