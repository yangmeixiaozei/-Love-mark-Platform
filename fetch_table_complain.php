<!doctype html>
<html>
<?php
	require_once 'head.php';
?>
<head>
	<meta charset="utf-8">
	<title>我的吐槽时光</title>
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
		<th>时间</th>
		<th>标题</th>
        <th>内容</th>
		</tr>
		</thead>
		<tbody>
			 
			<?php
            require_once 'conn.php';
			$result = mysqli_query($conn, "SELECT * FROM complain where UserPhone = '{$_SESSION['phone_number']}' ORDER BY date DESC");
			$count = 0;
			while ($row = mysqli_fetch_array($result)) {
				if ($count % 2 == 0){
					?>

					<tr class="tr_line2">
						<td><?php echo $row['ID']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['content']; ?></td>
						<td style="width: 150px;"><a href="complain_update.php?id=<?php echo $row[ 'ID']; ?> ">补充</a></td>
					</tr>
						<?php
				}
				else{
					?>

					<tr class="tr_line1">
                    <td><?php echo $row['ID']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['content']; ?></td>
						<td style="width: 150px;"><a href="complain_update.php?id=<?php echo $row[ 'ID']; ?> ">补充</a></td>
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
	<a href="sharepage.php">返回叽叽歪歪首页</a>
</body>

</html>