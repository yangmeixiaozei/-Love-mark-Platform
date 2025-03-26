<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="Author" content="汤钦">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.staticfile.net/twitter-bootstrap/5.1.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.staticfile.net/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js"></script>
  <title>Login</title>
  <style>
    body {
      background-image: url('image/3.png');
      background-size: cover;
      background-position: center;
      background-repeat: repeat;
    }
    .link1 {
      float: left;
      margin-left: 10px;
    }

    .link2 {
      float: right;
      margin-right: 10px;
    }
  </style>
</head>

<body>
<pre>
	<?php
	$conn = mysqli_connect('localhost', 'root', '');
	if (!$conn) {
	    exit('不能连接数据库: '.mysqli_error());
	}
	mysqli_select_db($conn, 'love_web');
	if (isset($_POST['content'])) {
	    $sql = "UPDATE share SET content = '{$_POST['content']}' WHERE ID = '{$_POST['ID']}';";
	    echo "更新成功！";;
	    mysqli_query($conn, $sql);
	}

	$sql = "SELECT * FROM share where ID={$_GET['id']} ;";

	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($result);
	//echo '<br />';
	//echo $row['id'].'  '.$row['account'].' '.$row['name'].' '.$row['password'];

	mysqli_close($conn);
	?>
</pre>
  <div class="card mx-auto" style="width: 400px; margin-top: 50px; background-color: rgba(255, 255, 255, 0.8);">
    <div class="card-body">
      <h5 class="card-title text-center fw-bold">补充我的快乐细节</h5>
      <form method="post" action="">
      <div class="mb-3">
          <label for="ID" class="form-label">ID：</label>
          <input name="ID" class="form-control"type="text" value="<?php echo $row['ID']; ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="date" class="form-label">时间：</label>
          <input name="date" class="form-control"type="text" value="<?php echo $row['date']; ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">标题：</label>
          <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">内容：</label>
          <input type="text" class="form-control" name="content" value="<?php echo $row['content']; ?>">
          </input>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">确认补充</button><br>
        </div>
      </form>
    </div>
  </div>
  <a href="sharepage.php">返回叽叽歪歪首页</a>
</body>

</html>