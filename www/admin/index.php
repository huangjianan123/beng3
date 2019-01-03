<!doctype html>
<html>
<head>  
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/assets/css/Homepage.css" />
  <title>首页</title>
</head>

<body style='text-align:center;'>

  <?php session_start();
echo "欢迎管理员 {$_SESSION['user']}"
?>   <a href="/admin/session/delete.php" style = "float: right">管理员登出</a>
  <table border=1 align="center">
    <caption>列表</caption>
    <tbody >

           <tr><td><a href="huodong/index.php">活动列表</a></td></tr>
           <tr><td><a href="zhanchang/index.php">战场列表</a></td></tr>

    </tbody>
  </table>




</body>
</html>
