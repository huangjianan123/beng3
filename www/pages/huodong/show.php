<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>show | ����</title>
</head>
<ul>
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

  </body>
</ul>
</html>