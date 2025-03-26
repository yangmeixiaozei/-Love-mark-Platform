<?php
// 允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);     // 获取文件后缀名


// 判断是否是图片文件，思考一下，还可以用 substr()判断
if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
	&& in_array($extension, $allowedExts)
) {

	if ($_FILES["file"]["error"] > 0) {
		echo "错误：: " . $_FILES["file"]["error"] . "<br>";
	} else {
		echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
		echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
		echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";

		$UploadPath = "sweetImage/";   //这一句最好放置文件头部，方便修改路径
		$source_filename = $_FILES['file']['tmp_name'];

		//新文件名--- 主文件名---可来自用户名或随机名字等 
		$userid = $_POST['title'];
		//$randname = time();
		$randname=date("Ymd_His",time());
		$newfilename = $userid . "_" . $randname;

		//扩展名
		$temp = explode(".", $_FILES["file"]["name"]);
		print_r($temp);
		$extension = end($temp);

		//新文件名-完整名字
		$newfilename = $newfilename . "." . $extension;

		//新文件的目标位置
		$dest_filename = $UploadPath . $newfilename;


		//echo $source_filename, "\n";
		//echo $dest_filename, "\n";


		if (file_exists($dest_filename)) {
			echo $dest_filename . "已经存在,请重新命名再上传";
		} else {
			move_uploaded_file($source_filename, $dest_filename);
			echo "文件存储在: " . $dest_filename;
		}
	}
} else {
	echo "非法的文件格式";
}
?>
<br>