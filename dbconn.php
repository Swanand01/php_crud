<?php
$server = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($server, $username, $password);

if (!$conn){
	die("error while connecting to db". mysqli_connect_error());
}
?>