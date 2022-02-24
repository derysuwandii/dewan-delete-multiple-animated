<?php
	include 'koneksi.php';

	if(isset($_POST["checkbox_value"])){
		for($count = 0; $count < count($_POST["checkbox_value"]); $count++){
			$id = $_POST['checkbox_value'][$count];
			$query = "DELETE FROM tbl_karyawan WHERE id=?";
			$dewan1 = $db1->prepare($query);
			$dewan1->bind_param("i", $id);
			$dewan1->execute();
		}
	}
?>