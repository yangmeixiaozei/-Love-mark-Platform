<!doctype html>
<html>
<?php
	require_once 'head.php';
?>
<head>
	<meta charset="utf-8">
	<title>我的ToDoList</title>
</head>

<style>
     th {
    	text-align: center; /* 设置表头文本居中 */
	}
	a {
	color: #3d6428;
	text-decoration: none;
	line-height:30px;
	}
	a:link {
		color: #3d6428;
		text-decoration: none;
	}
	a:visited {
		color: #66ba47;
		text-decoration: none;
	}
	a:hover {
		color: #b2df95;
		background-color:#3d6428 ;
		text-decoration: underline;
	}
	a:active {
		color: #ffffff;
		background-color:#3d6428 ;
	}
    .table-style2 {
  width: 96%; /* 宽度 */
  border: 2pt solid #9bbb59; /* 外边框线宽度、风格、颜色 */
  border-collapse: collapse; /* 是否合并边框 */
  margin: 40px 30px; /* 外边框与外部元素的距离 */
}

.table-style2 td {
  border: 1pt dotted #82b64a; /* 内部边框线 */
  padding-left: 20px; /* 左边距离 */
  height: 26pt;
  font-size: 12px;
}

.table-style2 .tr_line1 {
  color: #223d04;
  background: #e6eed5;
}

.table-style2 .tr_line2 {
  color: #2d550b;
  background: #e5f5c9;
}
</style>

<body>
<div>
	<table class="table-style2" width="96%" border="1">
		<thead>
		<tr>
		<th>ID</th>
		<th>待办名称</th>
		<th>日期</th>
		</tr>
		</thead>
		<tbody>
			 
			<?php
            require_once 'conn.php';
			$result = mysqli_query($conn, "SELECT * FROM todo where phone = '{$_SESSION['phone_number']}' and state = '已完成' ORDER BY time ASC");
			$count = 0;
			while ($row = mysqli_fetch_array($result)) {
				if ($count % 2 == 0){
					?>

					<tr class="tr_line2">
						<td><?php echo $row['ID']; ?></td>
						<td><?php echo $row['thing']; ?></td>
						<td><?php echo $row['time']; ?></td>
					</tr>
						<?php
				}
				else{
					?>

					<tr class="tr_line1">
                        <td><?php echo $row['ID']; ?></td>
						<td><?php echo $row['thing']; ?></td>
						<td><?php echo $row['time']; ?></td>
                    </tr>
						<?php
                    
				}
				$count += 1;
			}
			mysqli_close($conn);
			?>
		</tbody>
	</table>
	</div>
	<a href="add_todo.php">返回学习小屋首页</a>
</body>

</html>