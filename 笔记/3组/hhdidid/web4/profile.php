<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Profile</title>
    </head>
    <body>
		<?php require_once('navbar.php'); ?>
		<?php
			require_once('common.php');
			$name = $_COOKIE['name'];
			$image_name = $_COOKIE['image_name'];
			$target = target.$image_name;
			echo '<h2>name:<b>'.$name.'</b></h2>';
		?>
			<img src=<?php echo $target; ?> width="100" height="100" style="float:top" /> 		
		<?php
			echo "<br/><a href='upload.php'>upload head_image</a><br/>";
			$dbc = mysqli_connect(dbhost,dbuser,dbpwd,dbname) or die("error connecting database");
			echo '<br/><b>Your texts:</b><br/><br/>';
			$query = "SELECT * FROM text_list WHERE author='$name'";
			$data = mysqli_query($dbc,$query) or die("error querying");
			if(mysqli_num_rows($data)==0) echo 'null';		//如果没有评论
			while($row=mysqli_fetch_array($data))
			{
				$text_id = $row['text_id'];
				$author = $row['author'];
				$text = $row['text'];
				$join_date = $row['join_date'];
				echo '<div><b>'.$text.'</b><br/>'.$author.'&nbsp&nbsp&nbsp&nbsp'.$join_date;
				echo '<a href="remove_text.php?text_id='.$text_id.'&author='.$author.'&text='.$text.'&join_date='.$join_date.'">Remove</a>';
				echo 'or';
				echo '<a href="modify_text.php?text_id='.$text_id.'&author='.$author.'&text='.$text.'&join_date='.$join_date.'">Modify</a>';
			}
			
			echo '<br/><br/><br/>';
			echo '<br/><b>Your comments:</b><br/><br/>';
			$query = "SELECT * FROM comment_list WHERE comment_author='$name'";
			$data = mysqli_query($dbc,$query) or die("error querying");
			mysqli_close($dbc);
			if(mysqli_num_rows($data)==0) echo 'null';		//如果没有评论
			while($row=mysqli_fetch_array($data))
			{
				$comment_id = $row['comment_id'];
				$comment_author = $row['comment_author'];
				$comment = $row['comment'];
				$join_date = $row['join_date'];
				echo '<div><b>'.$comment.'</b><br/>'.$comment_author.'&nbsp&nbsp&nbsp&nbsp'.$join_date;
				echo '<a href="remove_comment.php?comment_id='.$comment_id.'&comment_author='.$comment_author.'&comment='.$comment.'&join_date='.$join_date.'">Remove</a>';
				echo 'or';
				echo '<a href="modify_comment.php?comment_id='.$comment_id.'&comment_author='.$comment_author.'&comment='.$comment.'&join_date='.$join_date.'">Modify</a>';
			}
		?>
	</body>
</html>