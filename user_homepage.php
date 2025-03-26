<!DOCTYPE html>
<html lang="en">
<?php
	require_once 'head.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Homepage</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 10px;
            /* 调整格子之间的间距 */
            padding: 10px;
            /* 调整边框和内容之间的间距 */
        }

        .grid-item {
            background-image: url('image/8.jpg');
            padding: 20px;
            /* 设置内边距 */
            border: 1px solid #ccc;
            /* 设置边框 */
            text-align: center;
            /* 使内容居中 */
            display: flex;
            align-items: center;
            /* 垂直居中 */
            justify-content: center;
            /* 水平居中 */
        }

        .card {
            width: 30%;
            padding: 20px;
            margin: 20px;
            /* 添加一些外边距 */
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            background-color: #5ea9fd;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            /* 添加圆角 */
            transition: background-color 0.3s ease;
            /* 鼠标悬停时的过渡效果 */
            display: flex;
            align-items: center;
            /* 垂直居中 */
            justify-content: center;
            /* 水平居中 */
            height: 200px;
            /* 根据需要调整高度 */
        }

        .card .btn {
            padding: 10px 20px;
            font-size: 20px;
            border-radius: 5px;
            background-color: #ffca28;
            /* Bootstrap 的 warning 颜色 */
            border: none;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
    
        .card .btn:hover {
            background-color: pink;
            /* 鼠标悬停时的颜色变化 */
        }
    </style>
</head>

<body>

    <div class="grid-container">
        <div class="grid-item">
            <div class="card">
                <a href="love_quiz.php" target="_blank" class="btn btn-warning">&#127800;恋爱二三事&#127800;</a>
            </div>
        </div>
        <div class="grid-item">
            <div class="card">
                <a href="markdown.html" target="_blank" class="btn btn-warning">&#128151;恋爱记录册&#128151;</a>
            </div>
        </div>
        <div class="grid-item">
            <div class="card">
                <a href="add_todo.php" target="_blank" class="btn btn-warning">&#128175;学习小屋&#128175;</a>
            </div>
        </div>
        <div class="grid-item">
            <div class="card">
                <a href="sharepage.php" target="_blank" class="btn btn-warning">&#128165;叽叽歪歪&#128165;</a>
            </div>
        </div>
    </div>

</body>

</html>