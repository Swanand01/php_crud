<?php
	include "dbconn.php";
	$id = $_GET["id"];

	function delete($conn, $id){
		$sql = "DELETE FROM `formdb`.`users` WHERE `id` = $id ;";
		if ($conn->query($sql) == true){
			echo "Data deleted sucessfully!";
			return true;
		}else{
			return false;
		}
	}
	
	delete($conn, $id);
	$conn->close();
?>