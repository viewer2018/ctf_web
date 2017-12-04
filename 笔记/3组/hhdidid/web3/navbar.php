<?php 
	if(isset($_COOKIE['name'])){		//对于已登陆和未登陆用户采用不同的导航条及问候名。
		$who = $_COOKIE['name'];
		if($_COOKIE['role']=='root') $role='root';		//对管理员在导航条特别标识
?>
		<div>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="text.php">Text</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="logout.php">Log out<?php if($role=='root') echo '('.$role.')'; ?></a></li>
			</ul>
		</div>
<?php
	}
	else{
		$who = "Stranger";
?>
		<div>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Log in</a></li>
				<li><a href="register.php">Register</a></li>
			</ul>
		</div>
<?php
	}
?>