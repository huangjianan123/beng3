<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/assets/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/assets/inc/common.php';

$query = $db->prepare('select * from user where user = :user');
$query->bindParam(':user',$_POST['user'],PDO::PARAM_STR);
$query->execute();

$obj = $query->fetchObject();
if($obj){
    $hash=$obj->keyword;
    if(strcmp($_POST["keyword"],$hash)==0){
        $_SESSION["user"]=$_POST['user'];
        redirect_to('../index.php');
    }else{
        echo "密码出错";
    }
}else{
    echo "账号出错";
}

?> 