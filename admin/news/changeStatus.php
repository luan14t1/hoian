<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hoian/library/ConnectDatabaseLibrary.php' ?> 
 <?php 
	$id = $_POST['Aid'];
?>
<a href="javascript:void(0)" onclick="return changeStatus(<?php echo $id; ?>)">
<?php	
	$sql = "SELECT * FROM new WHERE id_new = {$id}" ;
	$query = $conn->query($sql);
	$arrNew = mysqli_fetch_assoc($query);
	$status = $arrNew['status']; 
?>
<?php
    if($status == 1){
    	$sql1 = "UPDATE new SET status = 0 WHERE id_new = {$id}" ;
		$query = $conn->query($sql1);
		echo 'Private';
    } else {
		$sql2 = "UPDATE new SET status = 1 WHERE id_new = {$id}" ;
		$query = $conn->query($sql2);
		echo 'Public';
    }
?>

 </a>