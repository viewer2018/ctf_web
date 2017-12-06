# 作业
## 1. 编写一个完整的html登录页面并提交;里面要有登录表单，表单有用户名和密码，点击提交时，使用js做本地验证
<br>

	<!DOCTYPE html>
	<html>
	<head>

	</head>
	<body>
	<script type="text/javascript">
	function validateFrom()
	{
		var x=document.forms["myForm"]["Username"].value;
		var y=document.forms["myForm"]["Password"].value;
		if (x!="admin"||y!="pwd")
		{
			alert("账号或密码错误");
			return false;
		}
	}
		
	</script>
	<form name="myForm" onsubmit="return validateFrom()" method="post">
	Username:<br>
	<input type="text" name="Username" >
	<br>
	Password:<br>
	<input type="password" name="Password">
	<br><br>
	<input type="submit" value="登陆">
	</form>
	
	</body>

 ## 4.手动创建一个数据库，提交sql文件<br>

```
create database samp_db;
use samp_db;
create table users(
	id int unsigned not null auto_increment primary key,
	username char(10) not null,
	password char(10) not null);

insert into users(username,password) values("DNBAA",PASSWORD("838xxxxx"));
```
