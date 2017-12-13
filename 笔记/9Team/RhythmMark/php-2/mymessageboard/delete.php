<?php
header("Content-Type: text/html; charset=utf8");
session_start();

if (!empty($_POST['id']) ){
	// 连接数据库
$connect = mysqli_connect( 'localhost', 'root', 'admin', 'myrenwusi' );
$username = $_SESSION['userInfo']['name'];
$tpname = $_POST['author'];
$topicID = $_POST['id'];
if ($username=='root' or $username==$tpname) 	//若想删除的人是管理员或发帖者
{
	$cg="delete from  myrenwusi.topic  where id =".$topicID;
	$result = mysqli_query($connect,$cg);
	if ($result){ echo "<script> alert('删除成功') </script>";
	header("Location:postsList.php");}
	
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
<form action="delete.php" method="post" enctype="multipart/form-data" >
						<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
						<input type="hidden" name="author" value="<?php echo $_REQUEST['author']; ?>">
						<div>
							<button>确认删除</button>
						</div>
					</form>
</body>
</html>