<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	require_once 'onlineuser.php';
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="https://cdn.staticfile.net/twitter-bootstrap/5.1.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.staticfile.net/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js"></script>
  <title>叽叽歪歪</title>
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

    body {
      background-image: url('image/8.jpg');
      background-repeat: no-repeat;
      background-size: cover;
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
  <div id="navigation">
    <table>
      <tr>
        <td><a href="user_homepage.php">首页</a></td>
        <td><a href="love_quiz.php">恋爱二三事</a></td>
        <td><a href="markdown.html">恋爱记录册</a></td>
        <td><a href="add_todo.php">学习小屋</a></td>
      </tr>
    </table>
  </div>
  <div class="container mt-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#shareModal">
      好开心！我要分享！
    </button>
  </div>
  <!-- 模态框 -->
  <div class="modal fade" id="shareModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- 模态框头部 -->
        <div class="modal-header">
          <h4 class="modal-title">分享我的好消息</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- 模态框内容 -->
        <div class="modal-body">
          <form method="post" action="share.php">
            <table>
              <tr>
                <td>标题：</td>
                <td><textarea name="title" rows="" cols="" placeholder="请输入标题"></textarea></td>
              </tr>
              <tr>
                <td>内容：</td>
                <td><textarea name="content" rows="5" cols="" placeholder="填写分享内容"></textarea></td>
              </tr>
            </table>
        </div>

        <!-- 模态框底部 -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">分享</button>
        </div>
      </form>
      </div>
    </div>
  </div>


  <div class="container mt-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#complainModal">
      太火大！我要吐槽！
    </button>
  </div>
  <!-- 模态框 -->
  <div class="modal fade" id="complainModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- 模态框头部 -->
        <div class="modal-header">
          <h4 class="modal-title">我一定要吐槽</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- 模态框内容 -->
        <div class="modal-body">
          <form method="post" action="complain.php">
            <table>
              <tr>
                <td>标题：</td>
                <td><textarea name="title" rows="" cols="" placeholder="请输入标题"></textarea></td>
              </tr>
              <tr>
                <td>内容：</td>
                <td><textarea name="content" rows="5" cols="" placeholder="填写吐槽内容"></textarea></td>
              </tr>
            </table>
        </div>

        <!-- 模态框底部 -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">吐槽</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <p><a href="fetch_table_share.php" class="button">分享回顾</a></p>
  <p><a href="fetch_table_complain.php" class="buttonreject">吐槽回顾</a></p>


</body>

</html>