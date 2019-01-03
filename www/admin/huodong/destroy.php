<?php
require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/common.php';
$sql = 	"delete from posts where id = :id" ;
$query = $db->prepare($sql);
$query->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
if (!$query->execute()) {
	print_r($query->errorInfo());
}else{
	redirect_to("./");
};
?>