<?php 
	$servername = "localhost";
	$username  = "root";
	$password = "";
	$dbname = "monitoring";

	$db = mysqli_connect($servername, $username, $password, $dbname);

	if (!$db) {
		die("Connection Failed". mysqli_connect_error());
	}
 ?>