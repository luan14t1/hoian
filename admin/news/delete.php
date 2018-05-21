<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hoian/library/ConnectDatabaseLibrary.php' ?>
<?php
  if(isset($_GET['idNew'])){
  $id_news = $_GET['idNew'];
  $sql = "SELECT * FROM new WHERE id_new = '{$id_news}'";
    $query = $conn->query($sql);
    $news = mysqli_fetch_assoc($query);
    $picture = $news['picture'];
  unlink($_SERVER['DOCUMENT_ROOT'].'/hoian/uploads/images/news/'.$picture);
  $sql1 = "DELETE FROM new WHERE id_new = {$id_news}";
  $query1 = $conn->query($sql1);
  if($query1){
  	header("Location: /hoian/admin/news?msg=delsuccess");
     }else{
    header("Location: /hoian/admin/cat?msg=delerrorr");
     }
  }
?>
