<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Login</title>
    </head>
    <body>
		<?php require_once('navbar.php'); ?>
		<?php
			require_once('common.php');
			$error_msg = '';
			if(!isset($_COOKIE['id']))		//COOKIE未设置，说明未登录成功。
			{	if(isset($_POST['submit']))		//如果用户已提交表单，则处理表单数据
				{
					$dbc = mysqli_connect(dbhost,dbuser,dbpwd,dbname) or die("error connecting database.");
					$name = $_POST['name'];
					$pwd = $_POST['pwd'];
					if(!empty($name) && !empty($pwd))
					{
						$query = "SELECT * FROM user_list WHERE name='$name' AND pwd=SHA('$pwd')";
						$data = mysqli_query($dbc,$query);
						mysqli_close($dbc);
						if(mysqli_num_rows($data)==1)
						{
							$row = mysqli_fetch_array($data);
							setcookie('id',$row['id']);
							setcookie('name',$row['name']);
							setcookie('role',$row['role']);
							setcookie('image_name',$row['head_image']);		//登陆是也要获取image_name到cookie中，如果用户重新上传头像，可以在数据库中的image_name被覆盖前找到原先的图片并将其删除
							$home_url ='http://'. $_SERVER['HTTP_HOST'] .'/index.php';		//重定向到首页。
							header('Location:'.$home_url);
						}
						else $error_msg = "Sorry,you have to enter a valid name and password to log in.";
					}
					else $error_msg = "Sorry,you must enter your username and password.";
				}
			}
			if(empty($_COOKIE['id']))	//若用户还未登录或未登陆成功，则显示表单。（登陆成功就会同时设置COOKIE，故这个通过检查COOKIE是否为空判断用户是否已登陆）
			{
				echo $error_msg;
		?>
				<h1>Log in</h1>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					name:
					<input type="text" name="name" value="<?php if(!empty($name)) echo $name; ?>" /><br/>
					password:
					<input type="password" name="pwd"  value="<?php if(!empty($pwd)) echo $pwd; ?>" /><br/>
					<input type="submit" value="log in" name="submit"/>
				</form>
		<?php 
			}
		?>
	</body>
</html>