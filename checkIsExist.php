<?php
    require_once 'conn.php';
    require_once 'onlineuser.php';
?>

	<pre>
		<?php
$sql = "SELECT * FROM user where phone_number='{$_POST['phonenumber']}'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if ($count == 0) {
    echo '账号错误，查无此人';
} else {
    while ($row = mysqli_fetch_array($result)){
        $coup_phone = $row['coup_phone'];
        $coup_name = $row['coup_name'];
    }
    if ($coup_phone != '123' && $coup_name != '未知'){
        echo '该账号已有伴侣，您不能发送绑定请求！';
    }else{
        //判断之前是否发过，确保不重复发送
        $sql1 = "SELECT * FROM `lovers` WHERE send = '{$_SESSION['phone_number']}' and coup_status='待确认'";
        $result1 = mysqli_query($conn, $sql1);
        $count1 = mysqli_num_rows($result1);
        if ($count1 != 0){
            echo '您已发送过请求，对方还未确认，无需重复发送';
        }else{
            date_default_timezone_set('Asia/Shanghai');
            $currentDateTime = date("Y-m-d H:i:s", time());
            $sql2 = "INSERT INTO `lovers`(`date`, `send`, `sendname`, `accept`, `coup_status`) VALUES ('$currentDateTime','{$_SESSION['phone_number']}', '{$_SESSION['nickname']}','{$_POST['phonenumber']}','待确认');";
            mysqli_query($conn, $sql2);
            echo '请求已成功发送，等待对方确认';
        }
    }
}
mysqli_close($conn);
echo '<br>';
echo '<a href="user_homepage.php">返回我的首页</a>';
?>
	</pre>
