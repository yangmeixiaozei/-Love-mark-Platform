<?php
@session_start();
?>
<?php
      /*
      $final = formObj.endScore.value;
      $cred = 0;
      switch ($final) {
        case $final > 80 &&$final <= 90:
            $cred = 4;
            break;
        case $final > 70 &&$final <= 80:
            $cred = 3;
            break;
        case $final >= 60 &&$final <= 70:
            $cred = 2;
            break;
        default:
            $cred = 1;
    }*/
    require_once 'conn.php';
    if (isset( $_SESSION[ 'nickname' ] )){
            $new_tot_cred = $_SESSION['tot_cred']+5;
            $sqlcred = "UPDATE user SET tot_cred ='$new_tot_cred' WHERE nickname='{$_SESSION['nickname']}'";
            mysqli_query($conn, $sqlcred);
            mysqli_close($conn);
			echo '恭喜您！积分+5';
    }else{
      echo '请先登录！'.'<br>'.'<a href="login.html">去登录</a>';
    }
    ?>