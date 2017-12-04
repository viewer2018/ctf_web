<?php

	require_once('common.php');
	require_once('navbar.php');
	$dbc = mysqli_connect(dbhost,dbuser,dbpwd,dbname) or die("error connecting database");
	$query = "SELECT * FROM text_list ORDER BY join_date DESC";
	$data = mysqli_query($dbc,$query) or die("error querying");
	if(mysqli_num_rows($data)==0) echo 'null';
	while($row=mysqli_fetch_array($data))
	{	
		$text_id = $row['text_id'];
		$author = $row['author'];
		$text = $row['text'];
		$join_date = $row['join_date'];
		$role = $row['role'];
		echo $role;
		echo '<div><b>'.$text.'</b><br/>'.$author.'&nbsp&nbsp&nbsp&nbsp'.$join_date;		//只对管理员提供删除和修改任意text功能
		if($_COOKIE['role']=='root') 
		{
			echo '<a href="remove_text.php?text_id='.$text_id.'&author='.$author.'&text='.$text.'&join_date='.$join_date.'">Remove</a>';
			echo 'or';
			echo '<a href="modify_text.php?text_id='.$text_id.'&author='.$author.'&text='.$text.'&join_date='.$join_date.'">Modify</a></div>';
		}
		else echo '<br/>';
		echo '&nbsp&nbsp&nbsp&nbsp<b>comments:&nbsp&nbsp</b>';
		$query_2 = "SELECT * FROM comment_list WHERE text_id='$text_id'";
		$data_2 = mysqli_query($dbc,$query_2) or die("error querying2");
		if(mysqli_num_rows($data_2)==0) echo 'null';		//如果没有评论
		while($row_2 =mysqli_fetch_array($data_2))
		{	
			$comment_id = $row_2['comment_id'];
			$comment = $row_2['comment'];
			$comment_author = $row_2['comment_author'];
			$join_date_2 = $row_2['join_date'];
			echo '<br/>&nbsp&nbsp&nbsp&nbsp'.'<i>'.$comment.'</i>&nbsp&nbsp&nbsp&nbsp'.$comment_author.'&nbsp&nbsp&nbsp&nbsp'.$join_date_2;	//只对管理员提供删除和修改任意评论功能
			if($_COOKIE['role']=='root')
			{
				echo '<a href="remove_comment.php?comment_id='.$comment_id.'&comment_author='.$comment_author.'&comment='.$comment.'&join_date='.$join_date_2.'">Remove</a>';
				echo 'or';
				echo '<a href="modify_comment.php?comment_id='.$comment_id.'&comment_author='.$comment_author.'&comment='.$comment.'&join_date='.$join_date_2.'">Modify</a></div>';
			}
		}
		if(isset($_COOKIE['name']))																//只对已登陆用户提供评论功能
		{echo '<br><a href="comment.php?text_id='.$text_id.'&author='.$author.'&text='.$text.'&join_date='.$join_date.'">Comment</a><br/>';}
		echo '<br/><br/>';
	}
	mysqli_close($dbc);

?>