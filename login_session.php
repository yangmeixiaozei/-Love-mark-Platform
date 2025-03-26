<!doctype html>
<?php
    session_start();
    require_once 'conn.php';
?>
<html>

<head>
	<meta charset="utf-8">
	<title>登陆</title>
</head>

<body>
	<pre>
		<?php
$sql = "SELECT * FROM user where phone_number='{$_POST['phonenumber']}' and password='{$_POST['password']}' ";

$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);
if ($count == 0) {
    echo '账号错误，查无此人';
} else {
    while ($row = mysqli_fetch_array($result)) {
        echo '<br />';
        $_SESSION['phone_number'] = $row['phone_number'];
        $_SESSION['nickname'] = $row['nickname'];
        $_SESSION['tot_cred'] = $row['tot_cred'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['photo'] = $row['photo'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['coup_phone'] = $row['coup_phone'];
        $_SESSION['coup_name'] = $row['coup_name'];
        $conn = mysqli_connect('localhost', 'root', '', 'love_web');
        if ($row['status'] != '封号中'){
            $sql1 = "UPDATE user SET status = '在线' where phone_number = '{$row['phone_number']}';";
        if (!mysqli_query($conn,$sql1)) {
            die('Error: ' . mysqli_error($conn));
        }        
        mysqli_query($conn, $sql1);
        header("location:user_homepage.php");
        }else{
            echo '登录失败，当前账号已被封！';
        }
    }
}
mysqli_close($conn);
?>
	</pre>
</body>

</html>