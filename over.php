<?php
    require_once 'conn.php';
    require_once 'onlineuser.php';
    $sql = "UPDATE `todo` SET `state`='已完成' WHERE ID = {$_GET['id']}";
    mysqli_query($conn, $sql);
    echo '您已完成本项待办！';
    if ( isset( $_SESSION[ 'phone_number' ] ) ){
    $sql1 = "SELECT * FROM user where phone_number = '{$_SESSION['phone_number']}'";
    $result = mysqli_query($conn, $sql1);
    $count = mysqli_num_rows($result);
    if ($count != 0){
        while ($row = mysqli_fetch_array($result)){
            $tot_cred = $row['tot_cred'];
        }
        $new_tot_cred = $tot_cred+1;
        @session_start();
        $_SESSION['tot_cred'] = $new_tot_cred;
        $sql2 = "UPDATE `user` SET `tot_cred`='$new_tot_cred' WHERE phone_number = '{$_SESSION['phone_number']}'";
        mysqli_query($conn, $sql2);
        echo '积分+1';
        }
    }
    mysqli_close($conn);
?>