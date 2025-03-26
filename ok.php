<?php
    require_once 'conn.php';
    require_once 'onlineuser.php';
    $sql = "UPDATE `lovers` SET `coup_status`='' WHERE send ='{$_SESSION['phone_number']}'";
    mysqli_query($conn, $sql);
    echo '总有更好的人在等着你';
    mysqli_close($conn);
?>