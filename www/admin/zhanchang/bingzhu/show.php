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
            $query = $db->prepare('select * from bingzhu where id = :id');
            $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
            $query->execute();
            $bingzhu = $query->fetchObject();    
        ?>

        <img alt="" src= "<?php echo $bingzhu->pic ?>" >
        <h1><?php echo $bingzhu->title; ?>  </h1>
        <p>上场角色：<?php echo $bingzhu->role; ?></p>
        <div class="box"><p>战斗技巧:</p></div>
        <p><?php echo $bingzhu->way; ?></p>
        <?php
         if($bingzhu->av){?>
          <a href="https://www.bilibili.com/video/<?php echo $bingzhu->av ?>">视频</a>
        <?php   }  ?>
        <br/>
  
  我要评论
  <form action="save1.php" method="post">
    <input type="hidden" name='post_id' value='<?php echo $_GET['id']; ?>'/>
    <input type="hidden" name='content' value='bingzhu'/>
    <label for="uname">名字</label>
    <input type="text" name="uname" value="" />
    <br/>
    <label for="body">内容</label>
    <textarea name="body"></textarea>
    <br/>
    <input type="submit" value="提交" />
  </form>

  <ol>
  <?php
    $query = $db->query('select * from comments where content= "bingzhu" and post_id = ' . $_GET['id']);
    while ( $comment =  $query->fetchObject() ) {
      ?>
          <li>
            <h4><?php echo $comment->uname; ?></h4>
            <span><?php echo $comment->created_at;?></span>
            <p><?php echo $comment->body; ?></p>            
          </li> 
 
    <?php  } ?>
  </ol>
</body>
</html>