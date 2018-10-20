<?php
	session_start();
	
	$user = $_POST['username'];

	if(!empty($user))
	{
		$_SESSION['user'] = $user;
		$welcome = "您好,".$user."！请录入以下信息后提交。<br/>";
	}

	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$blood = $_POST['blood'];

	if(!empty($gender) && !empty($age) && !empty($blood))
	{
		echo "性别:" .$gender."<br>";
		echo "年龄" .$age. "<br>";
		echo "血型" .$blood. "<br>";
	}
	else
	{

?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>3-9.php用户信息录入</title>
	</head>
	<body>	
			<?php 
				echo  $welcome;
			?>
			<form action="" method="post">
				性别: <input type="radio" name="gender" value="男">男
					  <input type="radio" name="gender" value="女">女<br>
				年龄: <input type="text" name="age" size="5"><br>
				血型: <select name="blood">
						<option value="A">A型</option>
						<option value="B">B型</option>
						<option value="O">O型</option>
						<option value="AB">AB型</option>
						<option value="其他">其他血型</option>
					  </select><br>
				 <input type="submit" value="提交">
			</form>
	</body>
	</html>
 <?php
}
 ?>