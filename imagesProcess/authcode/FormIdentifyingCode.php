<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>验证码的使用</title>
</head>
<body>
    <form action="AuthcodeidentifyCode.php" method="post">
            <img src="identifyingCode.php"  title="看不清楚，换一张"  onclick="this.src='identifyingCode.php?url='+Math.random()" align=absmiddle>
         <p> 请输入验证码:<input type="text" name="code" > </p>
            <input type="submit" value="提交">
     </form>
</body>
</html>