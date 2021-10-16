<?php 
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "laundry";
	$link = mysqli_connect($host, $user, $pass, $dbname);
	if (!$link) {
		echo "Connection failed: " . mysqli_connect_error();
	}

 ?>