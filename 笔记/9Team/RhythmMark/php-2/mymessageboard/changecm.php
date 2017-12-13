<?php
header("Content-Type: text/html; charset=utf8");
session_start();



if (!empty($_POST['content']) && !empty($_POST['id']) ){
	// 连接数据库
$connect = mysqli_connect( 'localhost', 'root', 'admin', 'myrenwusi' );
$username = $_SESSION['userInfo']['name'];
$cmID = $_POST['id'];
$tpid=$_POST['tpid'];
$cmname = $_POST['author'];
$content = $_POST['content'];

if ($username=='root' or $username==$cmname) 	//若想修改的人是管理员或发帖者
{
	//echo $content;
	$cg="update myrenwusi.comment set content = '".$content."' where id =".$cmID;
	$result = mysqli_query($connect,$cg);
	if ($result){
		#echo "done";
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
<form action="changecm.php" method="post" enctype="multipart/form-data" >
						<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
						<input type="hidden" name="author" value="<?php echo $_REQUEST['author']; ?>">
						<input type="hidden" name="tpid" value="<?php echo $_REQUEST['tpid']; ?>">
						<textarea name="content"  cols="40" rows="6"></textarea>
						<div>
							<button>修改内容</button>
						</div>
					</form>
</body>
</html>