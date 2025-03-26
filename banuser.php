<?php
    require_once 'conn.php';
    $sql = "SELECT * FROM `user` WHERE ID = {$_GET['id']};";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 0){
        echo '操作错误';
    }else{
        while ($row = mysqli_fetch_array($result)){
            $status = $row['status'];
        }
    }
    if ($status != '封号中'){
        $sql1 = "UPDATE user SET status = '封号中' WHERE ID = {$_GET['id']};";
        mysqli_query($conn, $sql1);
        echo '该用户已成功封号！';
    }else{
        echo '该用户已被封号，无需重复操作';
    }
    mysqli_close($conn);
?>
<br>
<a href="fetch_table_user.php">查看用户表</a>
<br>
<a href="admin_homepage.php">返回管理员首页</a>