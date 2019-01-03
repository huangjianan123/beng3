<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>edit | 博客 </title>
</head>
<body>
<?php
		require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
		$id = $_GET['id'];
    $query = $db->prepare('select * from bingzhu where id = :id');
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $bingzhu = $query->fetchObject();
	?>
	<h1>修改列表</h1>

	<form action="update.php" method="post">

	<input type="hidden" name="id" value = "<?php echo $id; ?>"/> 
	<label for="title">标题</label>
	<input type="text" name="title" value="<?php echo $bingzhu->title ?>" />
	<br/>
	<select name="need">
            <option value ="high">高配</option>
            <option value ="middle">中配</option>
            <option value="low">低配</option>
    </select>
	<br/>
	<label for="grades">分数</label>
	<textarea name="grades">
	<?php echo $bingzhu->grades; ?>
	</textarea>
	<br/>
	<label for="role">女武神</label>
	<textarea name="role">
	<?php echo $bingzhu->role; ?>
	</textarea>
	<br/>
	<label for="way">技巧</label>
	<textarea name="way">
	<?php echo $bingzhu->way; ?>
	</textarea>
	<br/>
	<label for="av">av号(没有则不填)</label>
	<textarea name="av">
	<?php echo $bingzhu->av; ?>
	</textarea>
	<br/>
	<input type="submit" value="提交" />

	</form>
</body>
</html>