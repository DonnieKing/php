<?php

error_reporting(E_ALL & ~E_NOTICE);  //表示提示除去 E_NOTICE 之外的所有错误信息
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
