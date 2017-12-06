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
				setcookie('comment_id',$comment_id);		//将评论id放置在cookie中，以便后面处理POST请求时使用
				$comment_author = $_GET['comment_author'];
				$comment = $_GET['comment'];
				setcookie('comment',$comment);			//将评论放在cookie中，后面if条件中需要用到
				$join_date = $_GET['join_date'];
				echo '<div><b>'.$comment.'</b><br/>'.$comment_author.'&nbsp&nbsp&nbsp&nbsp'.$join_date.'</div>';
		?>
			<br/>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				Modify：
				<div><textarea cols="50" rows="10" name="comment"><?php echo $comment; ?></textarea></div>
				<input type="submit" value="publish" name="submit"/>
			</form>
		<?php
			}
			else if(isset($_POST['submit']) && $_POST['comment']!=$_COOKIE['comment'])		//如果提交表单并做了修改
			{
				$dbc = mysqli_connect(dbhost,dbuser,dbpwd,dbname) or die("error connecting database");
				$comment_id = $_COOKIE['comment_id'];
				$new_comment = $_POST['comment'];
				$query = "UPDATE comment_list SET comment='$new_comment' WHERE comment_id='$comment_id'";
				mysqli_query($dbc,$query) or die("error querying");
				mysqli_close($dbc);
				setcookie('comment_id','',time()-3600);		//修改上传完毕即释放cookie
				setcookie('comment','',time()-3600);
				echo "The comment have been modified successfully.";
			}
			else echo "The comment was not modify.";
		?>
	</body>
</html>