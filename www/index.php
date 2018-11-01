<!doctype html>
<html>
<head>  
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/assets/css/Homepage.css" />
  <title>首页</title>
</head>

<body style='text-align:center;'>

  <div class="guiding_bar">
        <ul>
           <li><a href="index.php">主页</a></li>
           <li><a href="/pages/zhanchang/index.php">战场</a></li>
           <li><a href="/pages/shenyuan/index.php">深渊</a></li>
           <li><a href="/pages/meitu/index.php">CG</a></li>
           <li><a href="https://mihoyo.tmall.com/">周边</a></li>
        </ul>
        </div>


  <table border=1 align="center">
    <caption><h1>活动列表</h1></caption>
    <thead>
      <tr>
        <th>标题</th>
        <th>创建日期</th>
      </tr>
    </thead>
    <tbody >

          <div align="center">
          <img alt="" src="./assets/images/show.jpg" width="900" height="350" >
          </div>
          
          <?php 
        require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
        
        $query = $db->query('select * from posts');
        while ( $post =  $query->fetchObject() ) {
          
      ?>
          <tr>
            <td><a href="./pages/huodong/show.php?id=<?php print $post->id; ?>"><?php echo $post->title; ?></a></td>
            <td><?php echo $post->created_at; ?></td>       
          </tr> 
 
      <?php  } ?>
          </div>

    </tbody>
  </table>




    <footer

      <div class="foot">
        <ul>
            <p>x.com 版权所有,未经允许不得转载</p>
            <p>适龄提示： 本游戏适合17岁（含）以上玩家娱乐</p>
            <p>
            <a href="index.php">关于我们</a>
            <a href="index.php">联系我们</a>
            <a href="index.php">帮助</a>
            </p>
            <p>Copyright © 2018</p>
          </ul>
      
      </div>
    </footer>

</body>
</html>
