<!doctype html>
<?php
    session_start();
    require_once 'conn.php';
?>
<html>

<head>
	<meta charset="utf-8">
	<title>管理员登陆</title>
</head>

<body>
	<pre>
		<?php
        print_r($_POST);
$sql = "SELECT * FROM admin where phone_number='{$_POST['phonenumber']}' and password='{$_POST['password']}' ";
echo $sql;
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if ($count == 0) {
    echo '账号错误，查无此人';
} else {
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['phone_number'] = $row['phone_number'];
        $_SESSION['nickname'] = $row['nickname'];
        header("location:fetch_table_user.php");
    }
}
mysqli_close($conn);
?>
	</pre>
</body>

</html>