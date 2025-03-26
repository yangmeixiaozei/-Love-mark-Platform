<?php
    require_once 'onlineuser.php';
    require_once 'conn.php';
    if ( isset( $_SESSION[ 'nickname' ] ) ){
        $sql = "SELECT * FROM user where nickname='{$_SESSION['nickname']}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if ($count == 0){
            echo '当前用户不存在';
        }else{
            while ($row = mysqli_fetch_array($result)){
                $_SESSION['phone_number'] = $row['phone_number'];
            }
            date_default_timezone_set('Asia/Shanghai');
            $currentDateTime = date("Y-m-d H:i:s", time());
            $thing = $_POST['thing'];
            $hours = $_POST['hours'];
            $minutes = $_POST['minutes'];
            $countdown = $hours.':'.$minutes.':00';
            $rank = $_POST['rank'];
            $sql1 = "INSERT INTO `todo`(`phone`, `thing`, `hours`, `minutes`,`time`,`countdown`,`state`,`rank`) VALUES ('{$_SESSION['phone_number']}','$thing','$hours','$minutes','$currentDateTime','$countdown','未开始','$rank')";
            mysqli_query($conn, $sql1);
            mysqli_close($conn);
            echo '添加成功<br>';
        }
    }else{
        echo '请先登录';
    }
echo '<a href="add_todo.php">返回学习小屋首页</a>';
?>