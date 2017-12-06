<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Register</title>
    </head>
    <body>
		<?php require_once('navbar.php');?>
		<?php
			require_once('common.php');
			$flag = false;
			if(isset($_POST['submit']))
			{
				$name = $_POST['name'];
				$pwd = $_POST['pwd'];
				$pwd2 = $_POST['pwd2'];
				if(!empty($name) && !empty($pwd) && !empty($pwd2) && $pwd==$pwd2)
				{
					$dbc = mysqli_connect(dbhost,dbuser,dbpwd,dbname) or die("error connecting database");
					$query_1 = "SELECT * FROM user_list WHERE name='$name'";
					$data = mysqli_query($dbc,$query_1) or die("error querying1");
					if(mysqli_num_rows($data)==0)
					{
						$query_2 = "INSERT INTO user_list (name,pwd,join_date,role) VALUES ('$name',SHA('$pwd'),now(),'user')";
						mysqli_query($dbc,$query_2) or die("error querying2");
						echo "You have registered successfully!\n";
						echo '<a href="login.php">log in</a>';
						mysqli_close($dbc);
					}
				else {echo "THE name had been used.Please enter another name."; $flag=true;}
				}
				else {echo "You have to enter your name and the two same password!"; $flag=true;}
			}
			else $flag=true;
			if($flag) {
		?>
				<h1>Register</h1>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					name:
					<input type="text" name="name" value="<?php if(!empty($name)) echo $name; ?>" /><br/>
					password:
					<input type="password" name="pwd"  value="<?php if(!empty($pwd)) echo $pwd; ?>" /><br/>
					comfirm:
					<input type="password" name="pwd2"  value="<?php if(!empty($pwd2)) echo $pwd2; ?>" /><br/>
					<input type="submit" value="Register" name="submit" />
				</form>
		<?php 
			}

		?>
	</body>
</html>