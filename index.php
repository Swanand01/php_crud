<?php
include 'dbconn.php';
if (isset($_POST["phone"]) && (int)strlen($_POST["phone"]) == 10){

	$name = $_POST["name"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];

	function create($conn, $name, $age, $gender, $email, $phone){
		$sql = "INSERT INTO `formdb`.`users` (`name`, `age`, `gender`, `email`, `phone`) VALUES ('$name', '$age', '$gender', '$email', '$phone');";

		if ($conn->query($sql) == true){
			return true;
		}else{
			return false;
		}
	}
	create($conn, $name, $age, $gender, $email, $phone);
	echo "Data Saved Sucessfully!";
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
			<form action="index.php" method="post" class="form">
				<input type="text" name="name" id="name" placeholder="Enter your name">
				<input type="text" name="age" id="age" placeholder="Enter your Age">
				<input type="text" name="gender" id="gender" placeholder="Enter your gender">
				<input type="email" name="email" id="email" placeholder="Enter your email">
				<input type="phone" name="phone" id="phone" placeholder="Enter your phone">
				<button class="btn">Submit</button> 
			</form>
		</div>
    </div>
</body>
</html>