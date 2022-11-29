<?php
	include 'dbconn.php';
	function read($conn){
		$sql = "SELECT * FROM `formdb`.`users`";
		$result =  $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			  echo "id: " . $row["id"]. " - Name: " . $row["Name"]. " -Age:  " . $row["Age"]. "<br>";
			}
		  } else {
			echo "0 results";
		  }
		  $conn->close();
	};
	read($conn);
?>
