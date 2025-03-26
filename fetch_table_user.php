<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once 'conn.php';
?>
<head>
    <link href="https://cdn.staticfile.net/twitter-bootstrap/5.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.net/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
        background-image: url('image/bg17.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
        .button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .buttonreject {
            display: inline-block;
            padding: 5px 10px;
            background-color: #ef0606;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .buttonpink {
            display: inline-block;
            padding: 5px 10px;
            background-color: pink;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #header {
        height: 80px;
        background-image: url("image/3.png");
        background-position: center;
        margin-bottom: 5px;
        background-repeat: repeat;
        }
        #navigation {
      font-family: 微软雅黑;
      font-size: 12pt;
      text-align: center;
      padding-top: 6px;
    }

    #navigation ul {
      list-style: none;
      margin: 0;
      padding: 0;
      padding-top: 4px;
    }

    #navigation li {
      display: inline;
    }

    #navigation a:link,
    #navigation a:visited {
      margin-right: 2px;
      padding: 3px 10px 2px 10px;
      color: #277b3a;
      background-color: #e5f5c9;
      text-decoration: none;
      border-top: 1px solid #ffffff;
      border-left: 1px solid #ffffff;
      border-bottom: 1px solid #717171;
      border-right: 1px solid #717171;
    }

    #navigation a:hover {
      border-top: 1px solid #717171;
      border-left: 1px solid #717171;
      border-bottom: 1px solid #ffffff;
      border-right: 1px solid #ffffff;
    }

    </style>
</head>
<body>
<div id="header">
            <h1 class="text-muted fw-bold" style="text-align: center;">“恋爱印记”管理员主页</h1>
        </div>
        <br class="clearfloat" />
        <?php
    if (isset($_SESSION['nickname'])) {
        // 用户已登录，显示用户信息和照片
        echo "&emsp;&emsp;" . $_SESSION['nickname'] . "， 您好！" . "&emsp;&emsp;<a href='logout_admin.php'>退出</a><hr>";
    } else {
        // 用户未登录，显示默认信息和登录链接
        echo "&emsp;&emsp;游客， " . "您好！<br>&emsp;&emsp;请先登录" . "&emsp;&emsp;<a href='AdminLogin.html'>登录</a><hr>";
    }
    ?>
    <?php
            if (isset($_SESSION['nickname'])) {
                echo '<div id="mainContent">';
                echo '<table class="table-style2" width="96%" border="1">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>账号</th>';
                echo '<th>昵称</th>';
                echo '<th>头像</th>';
                echo '<th>头像路径</th>';
                echo '<th>伴侣账号</th>';
                echo '<th>伴侣昵称</th>';
                echo '<th>在线状态</th>';
                echo '<th>积分</th>';
                echo '<th>封号</th>';
                echo '<th>解封</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                $result = mysqli_query($conn, 'SELECT * FROM user');

                $count = 0;
                while ($row = mysqli_fetch_array($result)) {
                    if ($count % 2 == 0){
                        ?>

                        <tr class="tr_line2">
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['nickname']; ?></td>
                            <td><img src="<?php echo $row['photo']; ?>" width="60"></td>
                            <td><?php echo $row['photo']; ?></td>
                            <td><?php echo $row['coup_phone']; ?></td>
                            <td><?php echo $row['coup_name']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['tot_cred']; ?></td>
                            <td style="width: 150px;"><a href="banuser.php?id=<?php echo $row[  'ID' ]; ?> " class="buttonreject">封号</a></td>
                            <td style="width: 150px;"><a href="allowuser.php?id=<?php echo $row[  'ID' ]; ?> " class="button">解封</a></td>
                        </tr>
                            <?php
                    }
                    else{
                        ?>

                        <tr class="tr_line1">
                        <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['nickname']; ?></td>
                            <td><img src="<?php echo $row['photo']; ?>" width="60"></td>
                            <td><?php echo $row['photo']; ?></td>
                            <td><?php echo $row['coup_phone']; ?></td>
                            <td><?php echo $row['coup_name']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['tot_cred']; ?></td>
                            <td style="width: 150px;"><a href="banuser.php?id=<?php echo $row[  'ID' ]; ?> " class="buttonreject">封号</a></td>
                            <td style="width: 150px;"><a href="allowuser.php?id=<?php echo $row[  'ID' ]; ?> " class="button">解封</a></td>
                        </tr>
                            <?php
                        
                    }
                    $count += 1;
                }
                mysqli_close($conn);
            }else{
                echo '登录后才可查看信息';
            }
			?>
		</tbody>
	</table>
	</div>
    </body>

</html>