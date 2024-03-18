<?php
	$servername = "localhost";
	$username = "admin";
	$password = "";
	$dbname = "contact_messages";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>