<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hoian/library/ConnectDatabaseLibrary.php' ?>
<?php
  if(isset($_GET['idPhoto'])){
  $id_photo = $_GET['idPhoto'];
  $sql = "SELECT * FROM photo WHERE id_photo = '{$id_photo}'";
    $query = $conn->query($sql);
    $news = mysqli_fetch_assoc($query);
    $picture = $news['picture'];
  unlink($_SERVER['DOCUMENT_ROOT'].'/hoian/uploads/images/photos/'.$picture);
  $sql1 = "DELETE FROM photo WHERE id_photo = {$id_photo}";
  $query1 = $conn->query($sql1);
  if($query1){
  	header("Location: /hoian/admin/photos?msg=delsuccess");
     }else{
    header("Location: /hoian/admin/photos?msg=delerrorr");
     }
  }
?>
