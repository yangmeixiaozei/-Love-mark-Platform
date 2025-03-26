<!doctype html>
<?php
require_once 'conn.php';
?>
<html>

<head>
	<meta charset="utf-8">
	<title>delete</title>
</head>

<body>
<pre>
<?php
    print_r($_GET);
    print_r($_POST);

if (isset($_POST['submit']) && ($_POST['submit'] == '删除')) {
    // 增加删除确认
    $sql = "delete from user  WHERE ID = '{$_GET['id']}';";
    echo $sql;
    mysqli_query($conn, $sql);
    unset($_POST);
} else {
    $sql = "SELECT * FROM user where ID = {$_GET['id']} ;";
    echo $sql;
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    echo $row['ID'].'  '.$row['phone_number'].'  '.$row['nickname'].'  '.$row['password'];

    ?>

</pre>

	<form method="post" action="">
		<input type="submit" name="submit" id="submit" value="删除">

		<input type="submit" name="submit" id="submit" value="取消">
		</p>
	</form>
	<?php
}

mysqli_close($conn);
?>
	<a href="fetch_table_my.php">返回--查看数据表</a>

</body>

</html>