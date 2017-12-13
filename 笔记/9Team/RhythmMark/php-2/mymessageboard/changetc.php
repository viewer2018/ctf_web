<?php
header("Content-Type: text/html; charset=utf8");
session_start();


// 用户对贴子进行评论添加

if (!empty($_POST['content']) && !empty($_POST['id']) ){
	// 连接数据库
$connect = mysqli_connect( 'localhost', 'root', 'admin', 'myrenwusi' );
$username = $_SESSION['userInfo']['name'];
$topicID = $_POST['id'];
$tpname = $_POST['author'];
$content = $_POST['content'];

if ($username=='root' or $username==$tpname) 	//若想修改的人是管理员或发帖者
{
	//echo $content;
	$cg="update myrenwusi.topic set content = '".$content."' where id =".$topicID;
	$result = mysqli_query($connect,$cg);
	if ($result){
		#echo "done";
		#header("Location:postsDetail.php");  
		$url = "postsDetail.php?id=".$topicID;  
		echo "<script type='text/javascript'>";  
		echo "window.location.href='$url'";  
		echo "</script>";   

		}
	
}
else 
{
	echo "无修改权利";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
<form action="changetc.php" method="post" enctype="multipart/form-data" >
						<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
						<input type="hidden" name="author" value="<?php echo $_REQUEST['author']; ?>">
						<textarea name="content"  cols="40" rows="6"></textarea>
						<div>
							<button>修改内容</button>
						</div>
					</form>
</body>
</html>