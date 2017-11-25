## 登录
```
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<script>
	function check(){
		var name = document.black_vitasoy.name.value;
		var pwd = document.black_vitasoy.pwd.value;
		if(name != "name" && pwd != "password" ){
			alert("请先输入用户名和密码!");
			return false;
			
			}
			else
			alert("已登录");
			return true ;
		}
</script>
<form name = "black_vitasoy" onsubmit = "return check()">
用户名:<br />
<input type = "text" name = "name" />
<br />
密码:<br/>
<input type = "text" name = "pwd" value = "" />
<br />
<input type = "submit" value = "登录" />
</form>

</head>

<body>
</body>
</html>
```
## 留言框
```
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<script>
	function check(){
		var name = document.black_vitasoy.liuyan.value;
		if (name.length < 5)
		{
			alert("请你输多点字,OK!");
			}
			else{
				alert("你话真多!");
				}
			
	}
		
		
</script>
<form name = "black_vitasoy" onsubmit = "return check()">
请输入你的留言:<br/>
<input type = "comment" name = "liuyan" >
<input type = "submit" value = "提交发言" />
</form>

</head>

<body>
</body>
</html>
```
## 图片上传
```
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传图片</title>
</head>

<body>
请上传你的一张丑照<br/>
<input type = "file" name = "file" id = "uploade" />
</body>
</html>
```
####这个认证有点难,我也不怎么会
[百度代码](http://www.jb51.net/article/95808.htm)
