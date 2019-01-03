<?php

require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/common.php';

$sql = "insert into jiaofu(title,grades,role,way,created_at,need,av,pic) values(:title,:grades,:role,:way,:created_at,:need,:av,:pic);" ;	
$query = $db->prepare($sql);



var_export($_FILES);
$dest_path = "/upload/zhanchang-" . rand() . ".jpg";
$dest= $_SERVER["DOCUMENT_ROOT"] . $dest_path;
var_export($dest);
move_uploaded_file($_FILES["pic"]["tmp_name"], $dest);
$query->bindParam(':pic',$dest_path,PDO::PARAM_STR);




$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':grades',$_POST['grades'],PDO::PARAM_STR);
$query->bindParam(':created_at',$created_at,PDO::PARAM_STR);
$query->bindParam(':role',$_POST['role'],PDO::PARAM_STR);
$query->bindParam(':way',$_POST['way'],PDO::PARAM_STR);
$query->bindParam(':av',$_POST['av'],PDO::PARAM_STR);
$query->bindParam(':need',$_POST['need'],PDO::PARAM_STR);
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("./");
};
?>