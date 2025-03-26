<?php
require_once( "conn.php" );
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Insert</title>
</head>

<body>
	<pre>
		<?php
		include("upload_file.php");  //处理上传的图片
		$photo = $dest_filename;
		print_r( $_POST );
		// 对输入数据进行过滤，防止SQL注入
		$conn = new mysqli($servername, $username, $password, $dbname);
		if (isset($_POST['phonenumber'], $_POST['nickname'], $_POST['pwd'], $_POST['checkpwd']) && !empty($_POST['phonenumber']) && !empty($_POST['nickname'])) {
			if ($_POST['pwd'] === $_POST['checkpwd']) {
				// 对输入数据进行 SQL 注入过滤
				$phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
				$name    = mysqli_real_escape_string($conn, $_POST['nickname']);
				$password= mysqli_real_escape_string($conn, $_POST['pwd']);
				// 对密码进行哈希加密
				$hashed_password = password_hash($password, PASSWORD_DEFAULT);
				unset($_POST['checkpwd']);
				$sql = "INSERT INTO user (phone_number, nickname, password, photo, status, tot_cred, level, coup_phone, coup_name) VALUES ('$phonenumber', '$name', '$password', '$photo', '离线', '0', '0', '119', '未知')";
				// 发送 SQL 语句
				if (mysqli_query($conn, $sql)) {
					mysqli_close($conn);
					echo "注册成功！";
					header("location:user_homepage.php");
				} else {
					echo "注册失败！";
				}
			} else {
				echo "您输入的确认密码与密码不一致，请重新输入确认密码！";
			}
		} else {
			echo "注册信息不能为空！";
		}
		?>
		<a href="fetch_table_my.php">查看数据表</a>

	</pre>
</body>

</html>