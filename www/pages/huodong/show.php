                         <!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>show | ����</title>
</head>
<body>
  <?php        
    require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
    $id = $_GET['id'] ;
    $query = $db->prepare('select * from posts where id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();    
  ?>

  <h1><?php echo $post->id; ?> : <?php echo $post->title; ?>  </h1>
  <p><?php echo $post->body; ?></p>

  
  
  我要评论
  <form action="save1.php" method="post">
    <input type="hidden" name='post_id' value='<?php echo $_GET['id']; ?>'/>
    <input type="hidden" name='content' value='huodong'/>
    <label for="uname">姓名</label>
    <input type="text" name="uname" value="" />
    <br/>
    <label for="body">内容</label>
    <textarea name="body"></textarea>
    <br/>
    <input type="submit" value="提交" />
  </form>

  <ol>
  <?php
    $query = $db->query('select * from comments where content= "huodong" and post_id = ' . $_GET['id']);
    while ( $comment =  $query->fetchObject() ) {
      ?>
          <li>
            <h4><?php echo $comment->uname; ?></h4>
            <span><?php echo $comment->created_at;?></span>
            <p><?php echo $comment->body; ?></p>            
          </li> 
 
    <?php  } ?>

</body>
</html>