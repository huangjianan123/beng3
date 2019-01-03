<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
//计算总记录数
$query = $db->query('select count(*) as amount from kalian;');
$row_amount = $query->fetchObject()->amount;
        
//计算总页数
$page_size = 3;
$page_amount = ceil($row_amount / $page_size);
//当未指定页号，或者页号错误时
$page_current = empty($_GET['page']) ? 1 : $_GET['page'];
if ($page_current < 1) $page_current = 1;
if ($page_current > $page_amount) $page_current = $page_amount;
//生成上一页、下一页
if($page_current <= 1 )
  $page_previous = 1 ;
else
  $page_previous = $page_current - 1;
if($page_current >= $page_amount )
  $page_next = $page_amount ;
else
  $page_next = $page_current + 1 ;
$params = $_GET;
$params['page'] = 1;
$page_first_q =  http_build_query($params);
$params['page'] = $page_previous;
$page_previous_q =  http_build_query($params);
$params['page'] = $page_next;
$page_next_q =  http_build_query($params);
$params['page'] = $page_amount;
$page_last_q =  http_build_query($params);
//计算返回纪录的起点与记录数
$row_base= ($page_current-1) * $page_size;
$page_sql = "LIMIT {$page_size} OFFSET {$row_base}";
$sql =  "select * from kalian  $page_sql";
//echo $sql;
$query  = $db->query($sql);
?>


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
          <img alt="" src="../../../../assets/images/kalian.jpg" width="900" height="350" >
          </div>
          
          


        <form id="myform" action="select.php" method="post">
          <select name="need">
            <option value="%">全部</option>
            <option value ="high">高配</option>
            <option value ="middle">中配</option>
            <option value="low">低配</option>
          </select>
          <br/>
            <label for="role">搜索</label>
            <input type="post" name="role">
             <button><b>提交</b></button>
        </form>        
        <SMALL>   输入你想出战的女武神</SMALL>
        <br/>

        <?php 

          while ( $kalian =  $query->fetchObject() ) {
          
      ?>
      
          <tr>
            <td><a href="show.php?id=<?php print $kalian->id; ?>"><?php echo $kalian->title; ?></a></td>
            <td><?php echo $kalian->grades; ?></a></td>
            <td><?php echo $kalian->created_at; ?></td>       
          </tr> 
 
      <?php  } ?>  

          </div>

    </tbody>
  </table>

  <div id="pager"> 
    <a href="?<?php echo $page_first_q ?> ">首页</a>
    <a href="?<?php echo $page_previous_q ?>">上一页</a>
    <a href="?<?php echo $page_next_q ?>">下一页</a>    
    <a href="?<?php echo $page_last_q ?>">末页</a>  
    <span>当前第 <?php echo $page_current ?>  页</span>
    <span>总共 <?php echo $page_amount ?> 页</span> 
  </div>

          <a href<a href="../index.php">返回上一页</a>



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
