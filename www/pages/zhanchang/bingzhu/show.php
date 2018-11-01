<!Doctype html>
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
           <li><a href="./fuhua/index.php">符华</a></li>
           <li><a href="./jiaofu/index.php">教父</a></li>
           <li><a href="./kalian/index.php">卡莲</a></li>
           <li><a href="./bingzhu/index.php">冰猪</a></li>
        </ul>
        </div>

        <?php        
            require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
            $id = $_GET['id'] ;
            $query = $db->prepare('select * from bingzhu where id = :id');
            $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
            $query->execute();
            $bingzhu = $query->fetchObject();    
        ?>

        <h1><?php echo $bingzhu->title; ?>  </h1>
        <p><?php echo $bingzhu->role; ?></p>
        <p><?php echo $bingzhu->way; ?></p>











    </body>
</html>