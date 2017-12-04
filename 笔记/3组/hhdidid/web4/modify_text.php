<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Remove</title>
    </head>
    <body>
		<?php require_once('navbar.php'); ?>
		<?php
			require_once('common.php');
			if(isset($_GET['text_id']) && isset($_GET['author']) && isset($_GET['text']) && isset($_GET['join_date']))
			{
				$text_id = $_GET['text_id'];
				setcookie('text_id',$text_id);		//将textid放置在cookie中，以便后面处理POST请求时使用
				$author = $_GET['author'];
				$text = $_GET['text'];
				setcookie('text',$text);			//将text放在cookie中，后面if条件中需要用到
				$join_date = $_GET['join_date'];
				echo '<div><b>'.$text.'</b><br/>'.$author.'&nbsp&nbsp&nbsp&nbsp'.$join_date.'</div>';
		?>
			<br/>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				Modify：
				<div><textarea cols="50" rows="10" name="text"><?php echo $text; ?></textarea></div>
				<input type="submit" value="publish" name="submit"/>
			</form>
		<?php
			}
			else if(isset($_POST['submit']) && $_POST['text']!=$_COOKIE['text'])		//如果提交表单并做了修改
			{
				$dbc = mysqli_connect(dbhost,dbuser,dbpwd,dbname) or die("error connecting database");
				$text_id = $_COOKIE['text_id'];
				$new_text = $_POST['text'];
				$query = "UPDATE text_list SET text='$new_text' WHERE text_id='$text_id'";
				mysqli_query($dbc,$query) or die("error querying");
				mysqli_close($dbc);
				setcookie('text_id','',time()-3600);		//修改上传完毕即释放cookie
				setcookie('text','',time()-3600);
				echo "The text have been modified successfully.";
			}
			else echo "The text was not modify.";
		?>
	</body>
</html>