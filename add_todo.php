<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="https://cdn.staticfile.net/twitter-bootstrap/5.1.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.staticfile.net/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js"></script>
  <title>To Do List(Time)</title>
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
    .buttonyellow {
            display: inline-block;
            padding: 5px 10px;
            background-color: #ffca28;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    .buttonblack {
            display: inline-block;
            padding: 5px 10px;
            background-color: #212529;
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

  </style>
</head>

<body>
  <div id="navigation">
    <table>
      <tr>
        <td><a href="user_homepage.php">首页</a></td>
        <td><a href="love_quiz.php">恋爱二三事</a></td>
        <td><a href="markdown.html">恋爱记录册</a></td>
        <td><a href="sharepage.php">叽叽歪歪</a></td>
      </tr>
    </table>
  </div>
  <div class="container mt-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
      添加倒计时待办
    </button>
  </div>

  <!-- 模态框 -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- 模态框头部 -->
        <div class="modal-header">
          <h4 class="modal-title">添加待办</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- 模态框内容 -->
        <div class="modal-body">
        <form method="post" action="insert_todo.php">
          <table>
            <tr>
              <td>待办名称：</td>
              <td><textarea name="thing" rows="3" cols="" placeholder="请输入待办名称"></textarea></td>
            </tr>
            <tr>
              <td>倒计时时长：</td>
              <td><input type="text" id="hours" name="hours" size="2" placeholder="请输入小时">h
              <input type="text" id="minutes" name="minutes" size="2"placeholder="请输入分钟">min<br></td>
            </tr>
            <tr>
              <td>紧急程度：</td>
              <td><select name="rank">
                  <option value="重要且紧急">重要且紧急</option>
                  <option value="重要不紧急">重要不紧急</option>
                  <option value="不重要但紧急">不重要但紧急</option>
                  <option value="不重要不紧急">不重要不紧急</option>
                </select>
              </td>
            </tr>
          </table>
        </div>

        <!-- 模态框底部 -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">确认添加</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <p><a href="fetch_table_todo1.php" class="buttonreject">重要且紧急待办</a></p>
  <p><a href="fetch_table_todo3.php" class="buttonyellow">不重要但紧急待办</a></p>
  <p><a href="fetch_table_todo2.php" class="button">重要不紧急待办</a></p>
  <p><a href="fetch_table_todo4.php" class="buttonblack">不重要不紧急待办</a></p>
  <p><a href="fetch_table_todo5.php" class="buttonpink">已完成的ToDo</a></p>
</body>

</html>