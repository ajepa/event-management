<?php
	
	//DB configuration
	$host = 'localhost';
	$dbname = 'booking';
	$username = 'root';
	$password = '';

	//Connect to Mysql DB based on DB configuration
	$con = mysqli_connect($host,$username,$password,$dbname);

	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

?>