<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Comment</title>
    </head>
    <body>
		<?php require_once('navbar.php'); ?>
		<?php
			require_once('common.php');
			if(isset($_GET['text_id']) && isset($_GET['author']) && isset($_GET['text']) && isset($_GET['join_date']))
			{
				$text_id = $_GET['text_id'];
				setcookie('text_id',$text_id);		//将评论的文章id放置在cookie中，以便后面处理POST请求时使用
				$author = $_GET['author'];
				$text = $_GET['text'];
				$join_date = $_GET['join_date'];
				echo '<div><b>'.$text.'</b><br/>'.$author.'&nbsp&nbsp&nbsp&nbsp'.$join_date.'</div>';
		?>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<b>comment:</b>
				<div><textarea name="comment" cols="40" rows="7"></textarea></div>
				<input type="submit" name="submit" value="submit"/>
				</form>
		<?php
			}
			else if(isset($_POST['submit']))
			{
				
				$comment_author = $_COOKIE['name'];
				$comment = $_POST['comment'];
				$dbc = mysqli_connect(dbhost,dbuser,dbpwd,dbname) or die("error connecting database");
				$text_id = $_COOKIE['text_id'];
				$query = "INSERT INTO comment_list (comment,comment_author,join_date,text_id) VALUES ('$comment','$comment_author',now(),'$text_id')";
				mysqli_query($dbc,$query) or die("error querying");
				mysqli_close($dbc);
				setcookie('text_id','',time()-3600);		//评论上传完毕即释放cookie
				echo "Your comment have been published successfully.";
			}
		?>
	</body>
</html>