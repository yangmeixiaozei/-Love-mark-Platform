<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <!-- 引入 CSS 文件 -->
    <link href="layout.css" rel="stylesheet" type="text/css" />
    <title>欢迎页面</title>
</head>
<body>
    <?php
    @session_start();
    if (isset($_SESSION['nickname'])) {
        // 用户已登录，显示用户信息和照片
        echo '<img src="' . $_SESSION['photo'] . '" class="avatar">';
        echo "&emsp;&emsp;" . $_SESSION['nickname'] . "， 您好！" . "<hr>";
    } else {
        // 用户未登录，显示默认信息和登录链接
        echo '<img src="image/5.jpg" class="avatar">';
        echo "&emsp;&emsp;游客， " . "您好！<br>&emsp;&emsp;请先登录" . "&emsp;&emsp;<a href='login.html'>登录</a><hr>";
    }
    ?>
</body>
</html>



