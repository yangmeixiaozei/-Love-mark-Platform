<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>update </title>
</head>

<body>
<pre>
	<?php
	$conn = mysqli_connect('localhost', 'root', '');
	if (!$conn) {
	    exit('不能连接数据库: '.mysqli_error());
	}
	mysqli_select_db($conn, 'love_web');
	if (isset($_POST['phonenumber'])) {
	    $sql = "UPDATE user SET phone_number = '{$_POST['phonenumber']}',nickname = '{$_POST['nickname']}',password = '{$_POST['pwd']}' WHERE ID = '{$_POST['ID']}';";
	    //echo $sql;
	    mysqli_query($conn, $sql);
	}

	$sql = "SELECT * FROM user where ID = {$_GET['id']} ;";
	//echo $sql;
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($result);
	//echo '<br />';
	//echo $row['id'].'  '.$row['account'].' '.$row['name'].' '.$row['password'];

	mysqli_close($conn);
	?>
</pre>
	<form method="post" action="">
		<p> ID:
			<input name="ID" type="text" value="<?php echo $row['ID']; ?>" readonly>

			<p> account:
				<input name="phonenumber" type="text" value="<?php echo $row['phone_number']; ?>">
			</p>
			<p> name:
				<input type="text" name="nickname" value="<?php echo $row['nickname']; ?>">
			</p>
			<p> password:
				<input type="text" name="pwd" value="<?php echo $row['password']; ?>">
			</p>
			<p>
				<input type="submit" name="submit" id="submit" value="提交">
			</p>
	</form>
	<a href="fetch_table_my.php">返回--查看数据表</a>

</body>

</html>