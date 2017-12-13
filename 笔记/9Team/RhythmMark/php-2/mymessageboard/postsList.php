<?php

// 连接数据库
$connect = mysqli_connect( 'localhost', 'root', 'admin', 'myrenwusi');

// 默认查询列表
$querySql = ' SELECT * FROM myrenwusi.topic order by id desc; ';
$result = mysqli_query($connect, $querySql);

// 查看贴子列表
$listInfo = array();
while($rows = mysqli_fetch_assoc($result))
{
	$listInfo[] = $rows;
}

// 关联出来用户信息
foreach ($listInfo as $key => $value) 
{
	$sele=" SELECT * FROM myrenwusi.user where name = '".$value['username']."'"; 
	$userSql = $sele;
	$result = mysqli_query($connect, $userSql);
	if($result != FALSE) { 
	$userInfo = mysqli_fetch_assoc($result);
	$listInfo[$key]['userInfo'] = $userInfo;
	}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table  align="center" >
		<thead>
			<tr>
				<th>发帖人</th>
				<th>发布时间</th>
				<th>标题</th>
				<th>操</th>
				<th>作</th>
			</tr>
		</thead>
		<tbody>
			<!-- 列表循环展示 -->
			<?php foreach ($listInfo as $key => $value): ?>
			<tr>
				<td> <?php  echo $value['userInfo']['name'];?> </td>
				<td> <?php  echo $value['time'];?> </td>
				<td> 
					<a href="postsDetail.php?id=<?php  echo $value['id'];?>">
						<?php  echo $value['title'];?>
					</a>
				 </td>
				<td> 
					<a href="<?php  echo "change.php?id=".$value['id']."&&author=".$value['userInfo']['name']?>">
						修改标题
					</a>
				 </td>
				<td> 
					<a href="<?php  echo "delete.php?id=".$value['id']."&&author=".$value['userInfo']['name']?>">
						删除
					</a>
				 </td>				 
			</tr>
			<?php endforeach ?>
			<tr>
				<td>
					<a target="_blank"  href="postsAdd.php">发帖</a>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>