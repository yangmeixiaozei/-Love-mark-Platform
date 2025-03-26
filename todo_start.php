<HTML>
<?php
        require_once 'conn.php';
        $sql = "UPDATE todo SET state = '进行中' WHERE ID = {$_GET['id']} and state != '已完成';";
        $id = $_GET['id'];
        mysqli_query($conn, $sql);
    
        $sql1 = "SELECT thing, hours, minutes FROM todo where ID = {$_GET['id']};";
        $result = mysqli_query($conn, $sql1);
        while ($row = mysqli_fetch_array($result)){
            $thing = $row['thing'];
            $hours = $row['hours'];
            $minutes = $row['minutes'];
        }
        mysqli_close($conn);
    ?>

<HEAD>
    <TITLE>倒计时</TITLE>
    <LINK REL="stylesheet" TYPE="text/css" HREF="js.css">
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
    body {
      background-image: url('image/3.png');
      background-size: cover;
      background-position: center;
      background-repeat: repeat;
    }
    .buttongray {
            display: inline-block;
            padding: 5px 10px;
            background-color: #6c757d;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</HEAD>
<SCRIPT LANGUAGE="JavaScript">
    var h1value = "<?php echo $hours; ?>";
    var m1value = "<?php echo $minutes; ?>";
    var h1 = h1value;
    var m1 = m1value;
    var s1 = 0; // 从0开始秒数倒计时

    function cal() {
        if (h1 == 0 && m1 == 0 && s1 == 0) {
            // 时间到了，停止倒计时
            document.aa.t1.value = "时间到了";
            return;
        }

        s1 = s1 - 1;
        if (s1 < 0) {
            m1 = m1 - 1;
            s1 = 59;
        }
        if (m1 < 0) {
            h1 = h1 - 1;
            m1 = 59;
        }
        if (h1 < 0) {
            h = 0; // 如果小时数小于0，重置为0
        }

        document.aa.t1.value = (h1 < 10 ? "0" + h1 : h1) + ":" + (m1 < 10 ? "0" + m1 : m1) + ":" + (s1 < 10 ? "0" + s1 : s1);
        setTimeout("cal()", 1000);
    }
</SCRIPT>

<BODY BGCOLOR="#FFFFFF">
    <form name="aa">
    <table>
    <tr>
        <td><label for="id" class="form-label">ID：</label></td>
        <td><input type="text" name="id" value="<?php echo $id; ?>" readonly></td>
    </tr>
    <tr>
        <td><label for="待办" class="form-label">待办名称：</label></td>
        <td><input type="text" name="thing" value="<?php echo $thing; ?>" readonly></td>
    </tr>
    <tr>
        <td>您还剩余:</td>
        <td><input type="text" name="t1" readonly><td>
    </tr>
    <tr><td><a href="over.php?id=<?php echo $_GET['id']; ?>" class = "buttongray">结束</a></td></tr>
    <SCRIPT LANGUAGE="JavaScript">
        cal()
    </SCRIPT>
    </table>
    </form>
</BODY>

</HTML>
