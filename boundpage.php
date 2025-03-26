<!DOCTYPE html>
<html lang="en">
<?php
    require_once 'onlineuser.php';
?>
<head>
  <meta charset="UTF-8">
  <meta name="Author" content="汤钦">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.staticfile.net/twitter-bootstrap/5.1.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.staticfile.net/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js"></script>
  <SCRIPT LANGUAGE="JavaScript">
    function checkValid(str) {
      if (str != "") {
        if (!isValid(str)){
          alert("只能输入数字！");
          return false;
        }else{
          return true;
        }
      }else{
        alert("绑定号码不能为空！");
        return false;
      }
    }
    function isValid(str) {
    return /^\d+$/.test(str);
  }
  </SCRIPT>

  <title>BoundPage</title>
  <style>
    body {
      background-image: url('image/bg2.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: repeat;
    }

    .pink-header {
      background-color: blue;
      height: 50px;
      position: relative;
      z-index: 1;
    }

    .watermark {
      background-color: yellow;
      position: fixed;
      bottom: 50px;
      right: 10px;
      opacity: 0.5;
      z-index: 2;
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
  <div class="card mx-auto" style="width: 400px; margin-top: 50px; background-color: rgba(255, 255, 255, 0.8);">
    <div class="card-body">
      <a href="user_homepage.php" class="link1">返回首页</a>
      <a href="registration.html" class="link2">伴侣没有帐号？去注册</a><br><br>
      <h5 class="card-title text-center fw-bold">结为伴侣</h5>
      <form method="post" name="f1" action="checkIsExist.php">
        <div class="mb-3">
          <label for="phonenumber" class="form-label">账号：</label>
          <input type="text" class="form-control" id="phonenumber" onkeyup="checkValid(this.value)"
            name="phonenumber" placeholder="请输入伴侣手机号">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">狠狠锁住</button><br>
        </div>
      </form>
    </div>
  </div>
  <div class="watermark">
    <!-- 水印内容-->
    <p>@tq@tq</p>
  </div>