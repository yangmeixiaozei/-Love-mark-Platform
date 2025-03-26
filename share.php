<?php
    require_once 'onlineuser.php';
    require_once 'conn.php';
    if ( isset( $_SESSION[ 'nickname' ] ) ){
    $sql = "SELECT * FROM user where nickname='{$_SESSION['nickname']}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 0){
        echo '请先登录';
    }else{
        while ($row = mysqli_fetch_array($result)){
            $_SESSION['phone_number'] = $row['phone_number'];
            $_SESSION['tot_cred'] = $row['tot_cred'];
        }
        date_default_timezone_set('Asia/Shanghai');
        $currentDateTime = date("Y-m-d H:i:s", time());
        $title = $_POST['title'];
        $content = $_POST['content'];
        $sql1 = "INSERT INTO share(UserPhone, date, title, content) VALUES ('{$_SESSION['phone_number']}','$currentDateTime','$title','$content')";
        if (mysqli_query($conn, $sql1)){
            $new_tot_cred = $_SESSION['tot_cred']+3;
            $sql2 = "UPDATE user SET tot_cred ='$new_tot_cred' WHERE nickname='{$_SESSION['nickname']}'";
            mysqli_query($conn, $sql2);
            mysqli_close($conn);
			echo "分享成功！积分+3！";
        }else{
            echo "分享失败";
        }
    }
}else{
    echo '当前用户不在线';
}
echo '<a href="sharepage.php">返回叽叽歪歪首页</a>';
?>

