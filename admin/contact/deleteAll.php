<?php require_once $_SERVER['DOCUMENT_ROOT'].'/btolop/function/dbconnect.php' ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/btolop/function/checklogin.php' ?>
<?php
	$ids = $_POST['ids'];
	foreach($ids as $id){
		$sql = "delete from admin where id = {$id}";
		$rs = mysqli_query($conn, $sql);
	}
	$sql = "select * from admin";
	$result = mysqli_query($conn, $sql);
	$data = "";
	while($row = mysqli_fetch_assoc($result)) {
		$data .= "<tr>
                    <td><input class='checkbox' name='ids' id='{$row['id']}' type='checkbox' /></td>
                    <td>{$row['fullname']}</td>
                    <td>{$row['username']}</td>
                    <td>
                    	<a title='edit' href='update.php?id={$row['id']}'><i class='fa fa-fw fa-edit'></i></a> ";
        if (($_SESSION['login']['role'] == 1) && ($row['role'] == 0)){
        	$data .= "<a title='delete' href='delete.php?id={$row['id']}'
        				onclick=\"return confirm('Are you sure?')\">
                        <i class='fa fa-fw fa-trash'></i>
                      </a>";
        }
        $data .= "</td></tr>";
	}
	echo $data;
?>