<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/common.php';

$sql = "insert into comments(content,uname,body,post_id) values(:content,:uname, :body,:post_id);" ;  
$query = $db->prepare($sql);
$query->bindParam(':content',$_POST['content'],PDO::PARAM_STR);
$query->bindParam('uname',$_POST['uname'],PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':post_id',$_POST['post_id'],PDO::PARAM_INT);

if (!$query->execute()) { 
  print_r($query->errorInfo());
}else{
  redirect_to("show.php?id=" . $_POST['post_id']);
};
?>