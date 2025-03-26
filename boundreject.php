<?php
    require_once 'conn.php';
    require_once 'onlineuser.php';
    $sql = "UPDATE `lovers` SET `coup_status`='拒绝' WHERE accept='{$_SESSION['phone_number']}'";
    mysqli_query($conn, $sql);
    echo '您已成功拒绝该情侣绑定申请';
    mysqli_close($conn);
?>