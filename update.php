<?php 
	include 'dbconn.php';
	$id = $_GET["id"];
	global $nodata;
	if (isset($_GET["update"])){
		$update = $_GET["update"];
	}
	function read($conn, $id){
		$sql = "SELECT * FROM `formdb`.`users` WHERE `id`= '$id';";
		$result =  $conn->query($sql);
		global $row;
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
		}
		else{
			$nodata = true;
			echo "No data found";
		}
	}
	read($conn, $id);
	
	function update($conn, $id){
		$name = $_POST["name"];
		$age = $_POST["age"];
		$gender = $_POST["gender"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];

		$sql = "UPDATE `formdb`.`users` 
		SET `Name` = '$name', `Age` = '$age', `Gender` = '$gender', `Email` = '$email', `Phone` = '$phone'
		WHERE `id` = $id;";
		if ($conn->query($sql) == true){
			echo "Data updated sucessfully!";
			read($conn, $id);
			return true;
		}else{
			return false;
		}

	}
	if(isset($_GET["update"]) && $update){
		update($conn, $id);
	}
	$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
		<div class="formContainer">
			<?php if($nodata) {return;} ?>
			<form action="<?php 
			if (isset($_GET["update"])){
				$update = $_GET["update"];
				echo "update.php?id=$id&update=True";
			}
			else {echo "update.php?id=$id";} 
			?>" 
			method="post" class="form" id="form">
				<input type="text" name="name" id="name" placeholder="Enter your name" value=<?php echo $row['Name']; ?>>
				<input type="text" name="age" id="age" placeholder="Enter your Age"
				value=<?php echo $row['Age']; ?>>
				<input type="text" name="gender" id="gender" placeholder="Enter your gender" value=<?php echo $row['Gender']; ?>>
				<input type="email" name="email" id="email" placeholder="Enter your email" value=<?php echo $row['Email']; ?>>
				<input type="phone" name="phone" id="phone" placeholder="Enter your phone" value=<?php echo $row['Phone']; ?>>
				<button class="btn" id="submitBtn">Submit</button> 
			</form>
		</div>
    </div>
</body>
<script src="update.js"></script>
</html>