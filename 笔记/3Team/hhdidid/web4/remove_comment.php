<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Remove</title>
    </head>
    <body>
		<?php require_once('navbar.php'); ?>
		<?php
			require_once('common.php');
			if(isset($_GET['comment_id']) && isset($_GET['comment_author']) && isset($_GET['comment']) && isset($_GET['join_date']))
			{
				$comment_id = $_GET['comment_id'];
				setcookie('comment_id',$comment_id);
				$comment_author = $_GET['comment_author'];
				$comment = $_GET['comment'];
				$join_date = $_GET['join_date'];
				echo '<div><b>'.$comment.'</b><br/>'.$comment_author.'&nbsp&nbsp&nbsp&nbsp'.$join_date.'</div>';
		?>
				<br/>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<b>confirm:remove this comment?</b><br/>
				<input type="radio" name="confirm" value="Yes" /> Yes
				<input type="radio" name="confirm" value="No" checked="checked"/> No <br/>
				<input type="submit" name="submit" value="submit"/>
				</form>
		<?php
			}
			else if(isset($_POST['submit']) && $_POST['confirm']=='Yes')
			{
				$dbc = mysqli_connect(dbhost,dbuser,dbpwd,dbname) or die("error connecting database");
				$comment_id = $_COOKIE['comment_id'];
				$query = "DELETE FROM comment_list WHERE comment_id=$comment_id LIMIT 1";
				mysqli_query($dbc,$query) or die("error querying");
				mysqli_close($dbc);
				setcookie('comment_id','',time()-3600);		//评论上传完毕即释放cookie
				echo "The comment have been removed successfully.";
			}
			else echo "The comment was not remove.";
		?>
	</body>
</html>