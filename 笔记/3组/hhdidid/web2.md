#URL:test01.com

- index.php

```
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>test01</title>
    </head>
    <body>
	
		<?php
			echo "<h1>Welcome to test01!</h1>";
		?>
		<p><a href="login.php">登陆</a></p>
		<p><a href="say.php">发言</a></p>
		<p><a href="img.php">上传图片</a></p>
    </body>
</html>
```

## 1.编写一个完整的html登录页面并提交

-login.php

```
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>login</title>
        <script type="text/javascript">
            function check(){
                var name = test_form.username.value;
                var pwd1 = test_form.pwd.value;
                var pwd2 = test_form.pwdagain.value;
                if(pwd1==""||pwd2=="") alert("密码不能为空，请输入密码");
                else if(pwd1!=pwd2) alert("两次输入的密码不匹配，请重新输入。");
            }
        </script>
    </head>
    <body>
        <form method="post" action="welcome.php" name="test_form" onsubmit="return check()">
            用户名：
            <input type="text" name="username" /><br/>
            密码：
            <input type="password" name="pwd" /><br/>
            确认密码:
            <input type="password" name="pwdagain" /><br/>
            <input type="submit" value="登陆"/>
        </form>
    </body>
</html>
```

-welcome.php

```
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>welcome</title>
    </head>
    <body>
		<?php   $a = $_POST["username"];
				$b = $_POST["pwd"];
				$dbhost = 'test01.com';  // mysql服务器主机地址
				$dbuser = 'root';            // mysql用户名
				$dbpass = '';          // mysql用户名密码
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
				$sql =  "INSERT INTO user ". 
						"(username,password)".
						"VALUES".
						"('a','b')";
				mysqli_select_db( $conn, 'test01' );
				mysqli_query($conn,$sql);
				mysqli_close($conn);
		?>
		<h1>Please to meet you,<?php echo $_POST["username"]; ?>!</h1><br>
		<p><a href="index.php">返回首页</a></p>
    </body>
</html>
```

## 2.编写一个提交发言html的页面并提交

-say.php

```
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>say something</title>
        <script type="text/javascript">
            function check(){
                var text = document.getElementById("say").value;
                if(text=="") alert("发言不可为空，请重新输入或退出。");
            }
        </script>
    </head>
    <body>
        <form method="post" action="statement.php" onsubmit="return check()">
            <label for="say">发言：</label>
			<div><textarea cols="50" rows="10" id="say" name="state"></textarea></div>
            <input type="submit" value="提交"/>
        </form>
    </body>
</html>
```

-statement.php

```
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>state success</title>
    </head>
    <body>
		你的发言：<br/><br/> <?php echo $_POST["state"]; ?><br/><br/>	 已发表成功
		<p><a href="index.php">
		返回首页</a></p>
    </body>
</html>
```

## 3.编写一个上传图片的html页面并提交

-img.php

```
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>upload img</title>
    </head>
	<body>
		<form action="show_img.php" method="post" enctype="multipart/form-data">
		<label for="file">选择图片文件：</label>
		<input type="file" name="file"/> 
		<br/>
		<input type="submit" name="submit" value="上传" />
		</form>
	</body>
</html>
```

-show_img.php

```
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>upload success</title>
    </head>
    <body>
		<p>你的图片：</p>
		<?php
			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
			$image_path='upload/'.$_FILES["file"]["name"];
		?>
		<div><img src=<?php echo $image_path; ?>></div>
		<p>已上传成功。</p>
		<p><a href="index.php">返回首页</a></p>
    </body>
</html>
```

##4.手动创建一个数据库，提交sql文件

-mysql

```
mysql> create database test01;

mysql> use test01;

mysql> create table 3_team_member(
    -> id int(11) unsigned not null auto_increment primary key,
    -> username varchar(255) not null,
    -> password varchar(255));

mysql> insert into 3_team_member(
    -> username,password)
    -> values(
    -> 'hhdidid',
    -> password('123456'));
	
......

```

--------------------------------------------------------------------------------