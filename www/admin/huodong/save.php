<?php

require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/common.php';

$sql = "insert into posts(title,body,created_at) values(:title,:body,:created_at);" ;	
$query = $db->prepare($sql);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':created_at',$created_at,PDO::PARAM_STR);

if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("./");
};
?>