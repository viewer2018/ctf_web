# HTTP协议
![HTTP协议](https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1511098844104&di=90bda0a6758b74da16ba0a089860eb78&imgtype=0&src=http%3A%2F%2Fwww.th7.cn%2Fd%2Ffile%2Fp%2F2016%2F04%2F02%2Ff1d78cc8c6de4cf7e1412814dc1a7ca5.jpg)

## HTTP请求头和响应头的获取方法
### 浏览器F12
![F12](https://github.com/sz1900599168/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/1Team/sz1900599168/image/1.png?raw=true)


### BurpSuite设置代理拦截
###### 浏览器代理设为127.0.0.1：8080，BurpSuite设置为默认
![BurpSuite](https://github.com/sz1900599168/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/1Team/sz1900599168/image/2.png?raw=true)

## HTML/CSS

```
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>标题</title>
        <link type="text/css" rel="stylesheet" href="lounge.css" media="screen">
    </head>
    
    <body>
        <div id="all">
            <h1>…………</h1>
            <!--...-->
        </div>
    </body>
</html>
```

## JavaScript

```
<script>alert(document.cookie)</script>
<script>document.write(document.cookie)</script>
```

## MySQL

```
SELECT *
FROM products
WHERE vend_id='ABC101'
ORDER BY vend_id
```

## Python

```
>>>print letters[0]
a
```

## PHP

```
<?php
	$when_it_happened = $_POST['whenithappened'];
	$how_long=$_POST['howlong'];
	$alien_description=$_POST['aliendescription'];
	$fang_spotted=$_POST['fangspotted'];
	$email=$_POST['email'];

	echo 'Thanks for submitting the form.<br />';
	echo 'You were abducted ' .$when_it_happened;
	echo ' and were gone for ' .$how_long. '<br />';
	echo 'Describe them:' .$alien_description. '<br />';
	echo 'Was Fang there?' .$fang_spotted. '<br />';
	echo 'Your email address is ' .$email;
?>
```

## Web漏洞
###### 参考：http://www.owasp.org.cn/owasp-project/OWASPTop102017RC2.pdf