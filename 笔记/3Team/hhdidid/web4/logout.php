<?php
	if(isset($_COOKIE['id']))		//注销即让cookie失效
	{
		setcookie('name','',time()-3600);
		setcookie('id','',time()-3600);
		setcookie('role','',time()-3600);
		setcookie('image_name','',time()-3600);
	}
	
	$home_url ='http://'. $_SERVER['HTTP_HOST'].'/index.php';		//点击注销后立即重定向到首页。
	header('Location: '.$home_url);
?>