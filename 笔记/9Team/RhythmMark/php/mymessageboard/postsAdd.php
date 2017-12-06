<?php 

session_start();



if(empty($_SESSION['userInfo']))
{
	echo "<script type='text/javascript'> alert('请先去登录哦');  window.location.href='login.php' </script>";
}
// 发布贴子
if(!empty($_POST))
{
	if(!empty($_POST['title']) &&  !empty($_POST['content']) )
	{
		$connect  = mysqli_connect( 'localhost', 'root', 'admin', 'myrenwusi');
		$title = $_POST['title'];
		$content = $_POST['content'];
		$username = $_SESSION['userInfo']['name'];
		
		// 批量上传图片
		function uploadPictures($pictures = array())
		{
			$picturesList = [];
			if(!empty($pictures['error']))
			{
				foreach ($pictures['error'] as $key => $error) 
				{
					if( $error === 0 )
					{
						// 图片的名称
						$name = $pictures['name'][$key];
						$tmp_name = $pictures['tmp_name'][$key];
						$imagePath = './images/' .$name;
						// 执行上传图片
						$move = move_uploaded_file( $tmp_name, $imagePath );
						if($move === true)
						{
							$pictureUrl = "http://localhost/mymessageboard/images/{$name}";
							$picturesList[] = $pictureUrl;
						}
					}
				}
			}
			return $picturesList;
		}

		$pictures = '';
		if(!empty($_FILES['pictures']))
		{
			$picturesList = uploadPictures($_FILES['pictures']);
			$pictures = implode(',', $picturesList);
		}

		// D($picturesList);
		// D($pictures);
		// exit;

		$sqlupdate = "INSERT INTO `myrenwusi`.topic (username,title,content,picture,time) 
		VALUES ('$username','$title', '$content', '$pictures',  now());";

		// 执行修改或者添加
		$result = mysqli_query($connect, $sqlupdate);
		// 返回受影响的函数
		$rows   = mysqli_affected_rows($connect);

		$info = "受影响行数{$rows}";
		
		// 保证操作成功了，就跳转
		if($rows > 0 )
		{
			$info .= '发帖成功';
			echo "<script type='text/javascript'> alert('{$info}');  window.location.href='postsList.php' </script>";
		}
		else
		{
			$info .= ' 发帖失败';
			echo "<script type='text/javascript'> alert('{$info}'); </script>";
		}
	}	
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<style>
		
		body
		{
			width: 600px;
		    margin: 10px auto;
		    margin-top: 50px;
		}
		input
		{
			line-height: 30px;
			height: 30px;
			margin-bottom: 10px;
		}
	</style>


	<form action="" method="post" enctype="multipart/form-data" >
		<table>
			<tr>
				<td>标题</td>
				<td>
					<input type="text" name="title" placeholder="标题">
				</td>
			</tr>
			<tr>
				<td>内容</td>
				<td>
					<textarea name="content"  cols="30" rows="10"></textarea>
				</td>
			</tr>
			<tr>
				<td>随图</td>
				<td>
					<input type="file" name="pictures[]" multiple="multiple"  >
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<button>提交发帖</button>
				</td>
			</tr>
		</table>


	</form>


</body>
</html>