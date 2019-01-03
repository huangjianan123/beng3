<html>

<head>
  <meta charset="utf-8">
</head>
<body>
    
<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
    $need = $_POST['need'];
    $sql = "select * from fuhua where need = '".$need."'";
    $con = mysqli_connect("127.0.0.1:3306","root","root","blog");
    $rs = mysqli_query($con,$sql);
    while($arr = mysqli_fetch_array($rs)){
        echo $arr['title'].'<br>';
    };
    
?>

</body>
</html>