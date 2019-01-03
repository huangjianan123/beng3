<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/common.php';

$sql = "update bingzhu set title = :title,grades = :grades,role=:role,way=:way,need=:need,av=:av where id = :id;" ;	
$query = $db->prepare($sql);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':grades',$_POST['grades'],PDO::PARAM_STR);
$query->bindParam(':role',$_POST['role'],PDO::PARAM_STR);
$query->bindParam(':way',$_POST['way'],PDO::PARAM_STR);
$query->bindParam(':need',$_POST['need'],PDO::PARAM_STR);
$query->bindParam(':av',$_POST['av'],PDO::PARAM_STR);
$query->bindParam(':id',$_POST['id'],PDO::PARAM_STR);
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("show.php?id={$_POST['id']}");
};
?>