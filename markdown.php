<?php
    require_once 'onlineuser.php';
    require_once 'conn.php';
    if (isset($_SESSION['phone_number'])) {
        echo '在线！';
    }else{
        echo '不在！';
    }
    $sql = "SELECT * FROM user where phone_number ='{$_SESSION['phone_number']}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 0){
        echo '记录失败';
    }else{
        include("sweet_upload.php");  //处理上传的图片
		$photo = $dest_filename;
        $title = $_POST['title'];
        $content = $_POST['content'];
        date_default_timezone_set('Asia/Shanghai');
        $currentDateTime = date("Y-m-d H:i:s", time());
        $sql1 = "INSERT INTO sweet (UserPhone, date, title, content, photo) VALUES ('{$_SESSION['phone_number']}', '$currentDateTime', '$title', '$content', '$photo')";
        if (mysqli_query($conn, $sql1)){
            $new_tot_cred = $_SESSION['tot_cred']+3;
            $sql2 = "UPDATE user SET tot_cred ='$new_tot_cred' WHERE nickname='{$_SESSION['nickname']}'";
            mysqli_query($conn, $sql2);
			echo "记录成功！积分+3！";
        }else{
            echo "记录失败";
        }
    }
    mysqli_close($conn);
?>