<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hoian/library/ConnectDatabaseLibrary.php' ?>
<?php
  if(isset($_GET['idContact'])){
  $id_contact = $_GET['idContact'];
  $sql = "DELETE FROM contact WHERE id_contact = {$id_contact}";
  echo $sql;
  $query = $conn->query($sql);
  if(!$query)
  	header("Location: /hoian/admin/contact?msg=delsuccess");
  else
  	header("Location: /hoian/admin/contact?msg=delerror");
     
   }
?>