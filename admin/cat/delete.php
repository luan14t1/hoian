<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hoian/library/ConnectDatabaseLibrary.php' ?>
<?php
  if(isset($_GET['idCat'])){
  $id_cat = $_GET['idCat'];
  $sql = "DELETE FROM category WHERE id_cat = {$id_cat}";
  $sql1 = "SELECT * FROM new WHERE id_cat = {$id_cat}";
  $query1 = $conn->query($sql1);
   while($arrNews = mysqli_fetch_assoc($query1)){
   	$picture = $arrNews['picture'];
   	echo $picture;
    if(!empty($picture)){
           unlink($_SERVER['DOCUMENT_ROOT'].'/hoian/uploads/images/news/'.$picture);
          }
    }
   $sql2 = "DELETE FROM new WHERE id_cat = {$id_cat}";
   $query2 = $conn->query($sql2);
   $query = $conn->query($sql);
  if($query && $query2)
  	header("Location: /hoian/admin/cat?msg=delsuccess");
  else
  	header("Location: /hoian/admin/cat?msg=delerror");
     }
?>
