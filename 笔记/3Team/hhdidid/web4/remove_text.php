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
				$join_date = $_GET['join_date'];
				echo '<div><b>'.$text.'</b><br/>'.$author.'&nbsp&nbsp&nbsp&nbsp'.$join_date.'</div>';
		?>
				<br/>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<b>confirm:remove this text?</b><br/>
				<input type="radio" name="confirm" value="Yes" /> Yes
				<input type="radio" name="confirm" value="No" checked="checked"/> No <br/>
				<input type="submit" name="submit" value="submit"/>
				</form>
		<?php
			}
			else if(isset($_POST['submit']) && $_POST['confirm']=='Yes')
			{
				$dbc = mysqli_connect(dbhost,dbuser,dbpwd,dbname) or die("error connecting database");
				$text_id = $_COOKIE['text_id'];
				$query = "DELETE FROM text_list WHERE text_id=$text_id LIMIT 1";
				$query_2 = "DELETE FROM comment_list WHERE text_id=$text_id";		//同时删除与text相关的评论
				mysqli_query($dbc,$query) or die("error querying");
				mysqli_query($dbc,$query_2) or die("error querying2");
				mysqli_close($dbc);
				setcookie('text_id','',time()-3600);		//评论上传完毕即释放cookie
				echo "The text have been removed successfully.";
			}
			else echo "The text was not remove.";
		?>
	</body>
</html>