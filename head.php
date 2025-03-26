<?php
session_start();
require_once 'conn.php';
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="Author" content="汤钦">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <link href="https://cdn.staticfile.net/twitter-bootstrap/5.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.net/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js"></script>
    <link href="layout.css" rel="stylesheet" type="text/css" />
    <style>
        /* 未访问链接*/
        a:link {
            color: white;
            text-decoration: none;
            /* 取消链接下划线 */
        }

        /* 已访问链接 */
        a:visited {
            color: white;
            text-decoration: none;
            /* 取消链接下划线 */
        }

        /* 鼠标移动到链接上 */
        a:hover {
            color: white;
            text-decoration: none;
            /* 取消链接下划线 */
        }

        /* 鼠标点击时 */
        a:active {
            color: #5ea9fd;
            text-decoration: none;
            /* 取消链接下划线 */
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

    </style>
</head>

<body>
    <div id="container">
        <div id="header">
            <h1 class="text-muted fw-bold" style="text-align: center;">恋爱印记</h1>
        </div>
        <br class="clearfloat" />
        <div id="info">
            <div class="online_user-info">
                <p>
                    <?php
                    @session_start();
                    if ( isset( $_SESSION[ 'phone_number' ] ) ) {
                        echo $_SESSION[ 'nickname' ]. ", 欢迎您!" . "    &emsp;&emsp;&emsp;&emsp;<a href='logout.php'>退出</a>";
                        $conn = mysqli_connect('localhost', 'root', '', 'love_web');
                        $sql_coup = "SELECT * FROM user where phone_number='{$_SESSION['coup_phone']}'and coup_phone='{$_SESSION['phone_number']}' and coup_name='{$_SESSION['nickname']}' ";
                        $result_coup = mysqli_query($conn, $sql_coup);
                        $count_coup = mysqli_num_rows($result_coup);
                        if ($count_coup == 0) {
                            $row_coupinfo['nickname'] = '未知';
                            $row_coupinfo['status'] = '离线';
                            $row_coupinfo['level'] = '0';
                            $row_coupinfo['photo'] = 'image/5.jpg';
                        } else {
                            while ($row_coup = mysqli_fetch_array($result_coup)) {
                                $row_coupinfo['nickname'] = $row_coup['nickname'];
                                $row_coupinfo['status'] = $row_coup['status'];
                                $row_coupinfo['level'] = $row_coup['level'];
                                $row_coupinfo['photo'] = $row_coup['photo'];
                            }
                        }
                        } else {
                            echo  "访客," . " 欢迎您!" . "    &emsp;&emsp;&emsp;&emsp;<a href='login.html'>登陆</a>";
                        }
                ?>
                </p>
                <p>&#128151;积分:
                    <?php echo isset($_SESSION['tot_cred']) ?$_SESSION['tot_cred'] : ' 0'; ?>
                </p>
                <p>&#128151;等级:
                    <?php echo isset($_SESSION['level']) ?$_SESSION['level'] : ' 0'; ?>
                </p>
                <p>&#128151;我的伴侣:
                    <?php
                        if(isset($_SESSION[ 'phone_number' ])&& $_SESSION['coup_name'] != '未知'){
                            echo $_SESSION['coup_name']; 
                        }
                        else if(isset( $_SESSION[ 'phone_number' ] ) && $_SESSION['coup_name'] == '未知'){
                            echo ' 暂无' . "    &emsp;&emsp;&emsp;&emsp;<a href='boundpage.php'>去绑定</a>"; 
                        } 
                        else{
                            echo ' 暂无';
                        }
                            
                    ?>
                </p>
            </div>
            <div class="user-info">
                <img src="<?php echo isset($_SESSION['photo']) ?$_SESSION['photo'] : ' image/5.jpg'; ?>" alt="用户头像"
                    class="avatar">
                <span class="badge rounded-pill bg-info">LV
                    <?php echo isset($_SESSION['level']) ?$_SESSION['level'] : ' 0'; ?>
                </span>
                <span class="badge rounded-pill bg-warning">
                    <?php echo isset($_SESSION['status']) ?$_SESSION['status'] : ' 离线'; ?>
                </span>
                <div class="nickname">&nbsp;&nbsp;&nbsp;
                    <?php echo isset($_SESSION['nickname']) ?$_SESSION['nickname'] : ' 未知'; ?>
                </div>
            </div>
            <img src="image/jump.gif" alt="跳动的心" class="heart">
            <div class="user-info">
                <img src="<?php echo isset($_SESSION['photo']) ?$row_coupinfo['photo'] : ' image/5.jpg'; ?>" alt="用户头像"
                    class="avatar">
                <span class="badge rounded-pill bg-info">LV
                    <?php echo isset($_SESSION['level']) ?$row_coupinfo['level'] : ' 0'; ?>
                </span>
                <span class="badge rounded-pill bg-warning">
                    <?php echo isset($_SESSION['status']) ?$row_coupinfo['status'] : ' 离线'; ?>
                </span>
                <div class="nickname">&nbsp;&nbsp;&nbsp;
                    <?php echo isset($_SESSION['coup_name']) ?$row_coupinfo['nickname'] : ' 未知'; ?>
                </div>
            </div>
            <div class="boundMessage">
                <?php
                if ( isset($_SESSION['phone_number']) && isset($_SESSION['nickname'])){
                    $sqlbound = "SELECT * FROM lovers where accept='{$_SESSION['phone_number']}' and coup_status = '待确认'"; 
                    $resultbound = mysqli_query($conn, $sqlbound);
                    $countbound = mysqli_num_rows($resultbound); 
                    if ($countbound == 0){
                        echo '';
                    }else{
                        while ($row = mysqli_fetch_array($resultbound)){
                            $sendname = $row['sendname'];
                            $send = $row['send'];
                        }
                        echo '<p>' .'&#10024'.$sendname.'<br>'.$send. '<br>'.'&#128151;向您发来一个情侣绑定请求'. '<br>'.'<a href="boundaccept.php" class="button">接受</a>'.'&emsp;&emsp;&emsp;&emsp;'.'<a href="boundreject.php" class="buttonreject">拒绝</a>'.'</p>';
                    }
                }else{
                    echo '';
                }
            ?>

            <?php
                if ( isset($_SESSION['phone_number']) && isset($_SESSION['nickname'])){
                    $sqlbound = "SELECT * FROM lovers where send='{$_SESSION['phone_number']}' and coup_status = '拒绝'"; 
                    $resultbound = mysqli_query($conn, $sqlbound);
                    $countbound = mysqli_num_rows($resultbound); 
                    if ($countbound == 0){
                        echo '';
                    }else{
                        while ($row = mysqli_fetch_array($resultbound)){
                            $accept = $row['accept'];
                        }
                        echo '<p>' .  $accept. '<br>' . '已拒绝你的情侣绑定请求<br>' . '<a href="ok.php" class="button">确定</a>'.'</p>';
                    }
                }else{
                    echo '';
                }
            ?>
            </div>
        </div>
        <br class="clearfloat" />
    </div>
</body>

</html>