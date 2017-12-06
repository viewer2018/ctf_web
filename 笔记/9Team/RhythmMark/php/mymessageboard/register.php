<?php 
header("Content-Type: text/html; charset=utf8");

// 连接数据库
// 如果是提交表单过来的数据，就进行修改后者添加
if(!empty($_POST))
{
	if(!empty($_POST['name']))
	{
		$connect  = mysqli_connect( 'localhost', 'root', 'admin', 'myrenwusi');
		// 检测用户账户是否存在，存在就不插入
		$name = $_POST['name'];
		$query = "SELECT * FROM myrenwusi.user where name= '{$name}' ";
		$result   = mysqli_query($connect, $query);
		$detail     = mysqli_fetch_assoc($result);
		if(!empty($detail))
		{
			echo "<script type='text/javascript'> alert('账户已经存在了');  </script>";
		}
		else
		{
			$password = md5($_POST['password']);
			$hsculpture = '';
			if(!empty($_FILES['hsculpture']) && $_FILES['hsculpture']['error'] == 0 )
			{
				$hsculpture = $_FILES['hsculpture'];
				$imagePath = './images/' .$hsculpture['name'];

				$move = move_uploaded_file( $hsculpture['tmp_name'], $imagePath );
				if($move === true)
				{
					$hsculpture = "http://localhost/mymessageboard/images/{$hsculpture['name']}";
				}
			}
			else
				$hsculpture="http://localhost/mymessageboard/images/075744458690810.jpg";
			

			$sqlupdate = " INSERT INTO `myrenwusi`.`user` (name, password,hsculpture) VALUES ('{$_POST['name']}', '{$password}','{$hsculpture}' ); ";
			
			// 执行修改或者添加
			$result = mysqli_query($connect, $sqlupdate);
			// 返回受影响的函数
			$rows   = mysqli_affected_rows($connect);

			$info = "受影响行数{$rows}";
			
			// D($sqlupdate, $_POST, $rows, $_FILES);
			// exit;

			// 保证操作成功了，就跳转
			if($rows > 0 )
			{
				$info .= '注册成功';
				echo "<script type='text/javascript'> alert('{$info}');  window.location.href='index.html' </script>";
			}
			else
			{
				$info .= ' 注册失败';
				echo "<script type='text/javascript'> alert('{$info}'); </script>";
			}

		}
	}
	else
	{
		echo "<script type='text/javascript'> alert('账户不能为空');  </script>";
	}
	
}


// D($_POST);

 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
		
	<form action="" method="post" enctype="multipart/form-data" >
		<div align="center">
			    <p>用户名<input type=text name="name"></p>
                <p>密 码<input type=password name="password"></p>
				<p>头 像   <input type="file" name="hsculpture"></p>
                <p><input type="submit" name="submit" value="注册"></p>
		</div>


	</form>


</body>
</html>
