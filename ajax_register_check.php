<?php 
	require_once 'dbconfig.php';
	$no_matrik = $_POST['no_matrik']; 

	$query = "SELECT * FROM users WHERE no_matrik = '$no_matrik'";

    $result = $con->query($query);

    if(mysqli_num_rows($result) > 0){
    	echo "Not Available";
    }
    else{
    	echo "Available";
    }

?>