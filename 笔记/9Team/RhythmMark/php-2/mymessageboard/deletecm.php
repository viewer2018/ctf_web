<?php
header("Content-Type: text/html; charset=utf8");
session_start();


if (!empty($_POST['id']) ){
	// 连接数据库
$connect = mysqli_connect( 'localhost', 'root', 'admin', 'myrenwusi' );
$username = $_SESSION['userInfo']['name'];
$cmID = $_POST['id'];
$tpid=$_POST['tpid'];
$cmname = $_POST['author'];

if ($username=='root' or $username==$cmname) 	//若想删除的人是管理员或发帖者
{
	//echo $content;
	$cg="delete from  myrenwusi.comment  where id =".$cmID;
	$result = mysqli_query($connect,$cg);
	if ($result){
		#header("Location:postsDetail.php");  
		$url = "postsDetail.php?id=".$tpid;  
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
<form action="deletecm.php" method="post" enctype="multipart/form-data" >
						<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
						<input type="hidden" name="author" value="<?php echo $_REQUEST['author']; ?>">
						<input type="hidden" name="tpid" value="<?php echo $_REQUEST['tpid']; ?>">
						<div>
							<button>确认删除</button>
						</div>
					</form>
</body>
</html>