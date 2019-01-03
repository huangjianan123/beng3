<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>new | 博客</title>
</head>
<body>
<h1>New post</h1>

<form action="save.php" method="post" enctype="multipart/form-data" >
	<label for="title">标题</label>
	<input type="text" name="title" value="" />
	<br/>
	<select name="need">
            <option value ="high">高配</option>
            <option value ="middle">中配</option>
            <option value="low">低配</option>
    </select>
	<br/>
	<label for="pic">上传图片</label>
	<input type="file" name="pic">
	<br/>
	<br/>
	<label for="grades">分数</label>
	<textarea name="grades"></textarea>
	<br/>
	<label for="role">女武神</label>
	<textarea name="role"></textarea>
	<br/>
	<label for="way">技巧</label>
	<textarea name="way"></textarea>
	<br/>
	<label for="av">av号(没有则不填)</label>
	<textarea name="av"></textarea>
	<br/>
	<input type="submit" value="提交" />
</form>

</body>
</html>