<?php
session_start();
session_destroy();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登出</title>
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '');
    $sql = "UPDATE user SET status = '离线' where phone_number = '{$_SESSION['phone_number']}';";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
     header("location:user_homepage.php");
    ?>
</body>
</html>