<!doctype html>
<html>
<head>  
  <meta charset="utf-8">
  <title>首页 - 博客</title>
</head>

<body style='text-align:center;'>


  <table border=1 align="center">
    <caption><h1>活动列表</h1></caption>
    <thead>
      <tr>
        <th>标题</th>
        <th>创建日期</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody >

          <div  align="center">
          <img alt="" src="../assets/images/show.jpg" width="800" height="400" >
          </div>
          
          <?php 
        require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
        
        $query = $db->query('select * from posts');
        while ( $post =  $query->fetchObject() ) {
          
      ?>
          <tr>
            <td><a href="show.php?id=<?php print $post->id; ?>"><?php echo $post->title; ?></a></td>
            <td><?php echo $post->created_at; ?></td>
            <td> 
              <a href="edit.php?id=<?php echo $post->id; ?>">改</a> 
              <a href="delete.php?id=<?php echo $post->id; ?>">删</a> 
            </td>        
          </tr> 
 
      <?php  } ?>
          </div>

    </tbody>
  </table>
  <a href="new.php">新增</a>

</body>
</html>
