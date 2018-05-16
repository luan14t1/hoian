<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hoian/library/ConnectDatabaseLibrary.php' ?>
<?php session_start() ;?>
<?php
  unset($_SESSION['user']);
  header("Location: /hoian/login.php?msg=logout");
?>