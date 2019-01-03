<?php
require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'./assets/inc/common.php'; 
  session_start();
  unset($_SESSION["user"]);
  redirect_to('/');
?>