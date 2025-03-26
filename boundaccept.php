<?php
    require_once 'conn.php';
    require_once 'onlineuser.php';
    $sql = "SELECT * FROM `lovers` WHERE accept='{$_SESSION['phone_number']}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo '#';
    } else{
        $sql1 = "UPDATE `lovers` SET `coup_status`='情侣' WHERE accept='{$_SESSION['phone_number']}'";
        mysqli_query($conn, $sql1);
        while ($row = mysqli_fetch_array($result)){
            $send = $row['send'];
            $sendname = $row['sendname'];
        }
    }
    //更新接收方
    $sql2 = "UPDATE `user` SET `coup_phone`='$send',`coup_name`='$sendname' WHERE phone_number = '{$_SESSION['phone_number']}'";
    mysqli_query($conn, $sql2);
    //更新发送方
    $sql3 = "UPDATE `user` SET `coup_phone`='{$_SESSION['phone_number']}',`coup_name`='{$_SESSION['nickname']}' WHERE phone_number = $send";
    mysqli_query($conn, $sql3);
    echo '成功绑定！祝你们99！';
    echo '<br>';
    echo '<a href="user_homepage.php">返回我的首页</a>';
    mysqli_close($conn);
?>