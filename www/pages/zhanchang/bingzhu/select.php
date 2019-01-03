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
          <li><a href="/index.php">主页</a></li>
           <li><a href="../index.php">战场</a></li>
           <li><a href="../../shenyuan/index.php">深渊</a></li>
           <li><a href="../../meitu/index.php">CG</a></li>
           <li><a href="https://mihoyo.tmall.com/">周边</a></li>
        </ul>
        </div>


  <table border=1 align="center">
    <caption><h1>攻略列表</h1></caption>
    <thead>
      <tr>
        <th>标题</th>
        <th>分数</th>
        <th>创建日期</th>
      </tr>
    </thead>
    <tbody >

          <div align="center">
          <img alt="" src="../../../../assets/images/bingzhu.jpg" width="900" height="350" >
          </div>


        <br/>

        <?php 
          require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';

          if(!is_null($_POST['need'] && $_POST['role'])){           
            $need = $_POST['need'];
            $Role = $_POST['role'];
            $sql1 = "select * from bingzhu where need LIKE '{$need}'and role LIKE '%{$Role}%' order by grades desc";
          }


          $query = $db->query($sql1);
          while ( $bingzhu =  $query->fetchObject() ) {
          
      ?>
      
          <tr>
            <td><a href="show.php?id=<?php print $bingzhu->id; ?>"><?php echo $bingzhu->title; ?></a></td>
            <td><?php echo $bingzhu->grades; ?></td>
            <td><?php echo $bingzhu->created_at; ?></td>       
          </tr> 
 
      <?php  } ?>


          </div>

    </tbody>
  </table>
          <a href<a href="index.php">返回所有攻略</a>



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
