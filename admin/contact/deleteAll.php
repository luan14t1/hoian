<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hoian/library/ConnectDatabaseLibrary.php' ?>
<?php
	$ids = $_POST['ids'];
	foreach($ids as $id){
		$sql = "delete from contact where id_contact = {$id}";
		$rs = mysqli_query($conn, $sql);
	}
	$sql = "select * from contact";
	$result = mysqli_query($conn, $sql);
	$data = "";
  $i = 0;
	while($arrContact = mysqli_fetch_assoc($result)) {
		 $id_contact = $arrContact['id_contact']; 
     $fullname = $arrContact['fullname'];                     
     $phone = $arrContact['phone']; 
     $email = $arrContact['email'];
     $detail = $arrContact['detail'];  
     $i++;
        $data .= "<tr class='gradeX'>
                  <td><input class='checkbox' name='ids' id='{$id_contact}' value='{$id_contact}' type='checkbox' /></td>
                  <td> $i </td>
                  <td> $fullname </td>
                  <td> $phone </td>
                  <td> $email </td>
                  <td> $detail </td>
                  <td><a href='/hoian/admin/contact/delete.php?idContact={$id_contact}' onclick=\"return confirm('Bạn có chắc muốn xóa?')\"><i class='fa fa-minus-circle'></i>Delete</a></td>
              </tr>";
	}
	echo $data;
?>