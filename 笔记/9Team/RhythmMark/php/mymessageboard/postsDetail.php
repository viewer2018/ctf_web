<?php
session_start();

// 连接数据库
$connect = mysqli_connect( 'localhost', 'root', 'admin', 'myrenwusi' );

// 用户对贴子进行评论添加
if(!empty($_POST['content']) && !empty($_POST['id']) )
{
	$username = $_SESSION['userInfo']['name'];
	$topicID = $_POST['id'];
	$content = $_POST['content'];
	$sqlupdate = "INSERT INTO myrenwusi.comment (username,topicid,content,time) 
	VALUES ('$username',$topicID,'$content',now());";

	// 执行修改或者添加
	$result = mysqli_query($connect, $sqlupdate);
	// 返回受影响的函数
	$rows   = mysqli_affected_rows($connect);

	$info = "受影响行数{$rows}";
	if($rows > 0 )
	{
		$info .= '评论成功';
		echo "<script type='text/javascript'> alert('{$info}');  </script>";
	}
	else
	{
		$info .= ' 评论失败';
		echo "<script type='text/javascript'> alert('{$info}'); </script>";
	}
}


// 根据贴子ID，查询贴子详情
if(!empty($_REQUEST['id']))
{
	// 获取用户信息函数
	function getUserInfo($username = 0 )
	{
		global $connect;
		$userInfo = [];
		// 关联出来发布的用户信息
		$selet=" SELECT * FROM myrenwusi.user where name = '".$username."'"; 
		$userSql = $selet;
		$result = mysqli_query($connect, $userSql);
		$userInfo = mysqli_fetch_assoc($result);
		// D($userSql);
		return $userInfo;
	}


	//查询贴子详情
	$querySql = " SELECT * FROM myrenwusi.topic where id = {$_REQUEST['id']}; ";
	$result = mysqli_query($connect, $querySql);
	$postsDetail = mysqli_fetch_assoc($result);
	// 关联出来发布的用户信息
	if(!empty($postsDetail['username']))
	{
		$postsDetail['userInfo'] = getUserInfo($postsDetail['username']);
	}

	// 关联出贴子评论的列表
	$querySql = " SELECT * FROM myrenwusi.comment where topicid = {$postsDetail['id']}; ";
	$result = mysqli_query($connect, $querySql);
	// 查看贴子列表
	$commentList = array();
	while($comment = mysqli_fetch_assoc($result))
	{
		if(!empty($comment['username']))
		{
			// 关联出来评论的用户信息
			$comment['userInfo'] = getUserInfo($comment['username']);
		}
		$commentList[] = $comment;
	}
	$postsDetail['commentList'] = $commentList;
}

if(empty($postsDetail))
{
	echo "<script type='text/javascript'> alert('贴子不存在了');  window.location.href='postsList.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.postsInfo
		{
			border: 1px solid #dddddd;
			width: 980px;
		    margin: 10px auto;
		}
		.userinfo
		{
			width: 25%;
		    text-align: center;
		    float: left;
		}
		.postsDetail
		{
			width: 75%;
    		float: right;
		}
		.comment
		{
			clear: both;
		    width: 70%;
		    margin-left: 25%;
		}
		.comment-add
		{
			text-align: center;
		}
		.comment-item
		{
			border: 1px solid #dddddd;
			margin-top: 5px;
			margin-bottom:4px;
		}
		.comment-item div
		{
			line-height: 35px;
			padding-left: 10px;
		}
	</style>
</head>
<body>
	<!-- 贴子信息展示 -->
	<div class="postsInfo">
		<!-- 发布人信息 -->
		<div class="userinfo">
			<div class="img">
				<img src="<?php echo $postsDetail['userInfo']['hsculpture']; ?>" alt=""  width="230px"> 
			</div>
			<div>
				<?php echo $postsDetail['userInfo']['name']; ?>
			</div>
		</div>
		<!-- 贴子详情 -->
		<div class="postsDetail">
			<div class="title">
				标题：<?php echo $postsDetail['title']; ?>
				<a href="postsList.php">返回列表</a>
			</div>
			<div class="content">
				内容：<?php echo $postsDetail['content']; ?>
			</div>
			<div class="pictures">
				<?php 
					if(!empty($postsDetail['pictures']))
					{
						$pictures = explode(',', $postsDetail['pictures']);
						foreach ($pictures as $key => $picture) {
							echo " <img src='{$picture}'   width='120px'> ";
						}
					}
				?>
			</div>
		</div>
	
		<!-- 评论模块 -->
		<div class="comment">
			<!-- 评论列表 -->
			<div class="comment-list">
				<?php foreach ($postsDetail['commentList'] as $key => $value): ?>
					<div class="comment-item">
						<div class="commentList-userInfo">
							<img src="<?php echo $value['userInfo']['hsculpture']; ?>" alt="" width="50px;">
							用户：<?php echo $value['userInfo']['name']; ?>
						</div>
						<div class="commentList-createTime">
							评论时间：<?php echo $value['time']; ?>
						</div>
						<div class="commentList-content">
							评论内容：<?php echo $value['content']; ?>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<!-- 新增评论 -->
			<div class="comment-add">
				<?php if(empty($_SESSION['userInfo'])){ ?>
					<a href="login.php">请去登录</a>
				<?php }else{ ?>
					<form action="postsDetail.php" method="post" enctype="multipart/form-data" >
						<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
						<textarea name="content"  cols="40" rows="6"></textarea>
						<div>
							<button>提交评论</button>
						</div>
					</form>
				<?php } ?>
			</div>
		</div>

	</div>
</body>
</html>
