<?php 
header("Content-Type: text/html; charset=utf8");
session_start();


if(!empty($_POST))
{

	if(!empty($_POST['name']) &&  !empty($_POST['password']))
	{
		$connect  = mysqli_connect( 'localhost', 'root', 'admin', 'myrenwusi' );
		$name = $_POST['name'];
		$query = "SELECT * FROM myrenwusi.user where name= '{$name}' ";
		$result   = mysqli_query($connect, $query);
		$userInfo     = mysqli_fetch_assoc($result);
		if(!empty($userInfo['name']))
		{
			$password = md5($_POST['password']);
			if($userInfo['password'] === $password)
			{
				$_SESSION['userInfo'] = $userInfo;
				echo "<script type='text/javascript'> alert('登录成功');  window.location.href='userInfo.php' </script>";
			}
			else
			{
				echo "<script type='text/javascript'> alert('账户或者密码错误');  </script>";
			}
		}
		else
		{
			echo "<script type='text/javascript'> alert('账户不存在');  </script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'> alert('请填写账号密码=V=');  </script>";
	}
}

 ?>
