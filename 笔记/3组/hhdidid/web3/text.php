<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Text</title>
    </head>
    <body>
		<?php require_once('navbar.php'); ?>
		<?php
			require_once('common.php');
			$flag = false;
			if(isset($_POST['submit']))
			{
				$text = $_POST['text'];
				if(!empty($text))
				{
					$dbc = mysqli_connect(dbhost,dbuser,dbpwd,dbname) or die("error connecting database");
					$query = "INSERT INTO text_list (author,text,join_date) VALUES('$who','$text',now())";
					mysqli_query($dbc,$query) or die("error querying");
					mysqli_close($dbc);
					echo "Your text have been published successfully.";
				}
				else {echo "You must enter something."; $flag=true;}
			}
			else $flag=true;
			if($flag){
		?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				text：
				<div><textarea cols="50" rows="10" name="text"></textarea></div>
				<input type="submit" value="publish" name="submit"/>
			</form>
		<?php } ?>
	</body>
</html>