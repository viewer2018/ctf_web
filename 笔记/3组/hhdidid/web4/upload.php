<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Upload</title>
    </head>
    <body>
		<?php require_once('navbar.php');?>
		<?php
			if($_POST['submit'])
			{
				require_once('common.php');
				$flag = false;
				$old_image_name = $_COOKIE['image_name'];
				$image_name = $_FILES['head']['name'];
				$username = $_COOKIE['id'];
				$tmp_name = $_FILES['head']['tmp_name'];
				$image_type = $_FILES['head']['type'];
				$s = 0;
				foreach($allow_types as $allow_type){if($allow_type == $image_type) $s++;}		//验证图片类型
				if(is_file($tmp_name) && filesize($tmp_name)>0 && filesize($tmp_name)<image_max_size && $s!=0)
				{
					setcookie('image_name',$image_name);		//图片名也放进cookie,方便其他脚本使用
					move_uploaded_file($tmp_name,target.$image_name);	
					@unlink($_FILES['head']['tmp_name']);

					$dbc = mysqli_connect(dbhost,dbuser,dbpwd,dbname) or die("error connecting database");
					$query = "UPDATE user_list SET head_image='$image_name' WHERE id='$username'";
					mysqli_query($dbc,$query) or die("error querying database.");
					mysqli_close($dbc);
					echo "upload image successd.";
					@unlink(target.$old_image_name);
				}
				else {echo "The file's type must be 'png、jepg、pjepg、gif、jpg' and file's size must between 0 and 1M."; $flag=true;}
			}
			else $flag = true;
			if($flag){
		?>
			<h3>请确保文件名不包含中文！！！否则图片无法正常显示。</h3>
			<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<p>file: <input type="file" name="head" /></p>
				<input type="submit" value="upload" name="submit"/>
			</form>
		<?php } ?>
		</body>
</html>