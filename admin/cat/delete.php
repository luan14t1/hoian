<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hoian/library/ConnectDatabaseLibrary.php' ?>
<?php
  if(isset($_GET['idCat'])){
  $id_cat = $_GET['idCat'];
  $sql = "DELETE FROM category WHERE id_cat = {$id_cat}";
  $query = $conn->query($sql);
  if($query)
  	header("Location: /hoian/admin/cat?msg=delsuccess");
     }
?>
