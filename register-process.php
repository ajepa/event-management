<?php

require_once 'dbconfig.php';

//escapes special characters in a string for use in an SQL statement using mysqli_real_escape_string
//reference : https://www.w3schools.com/php/func_mysqli_real_escape_string.asp
$nama =  mysqli_real_escape_string($con, $_POST['nama']);
$ic =  mysqli_real_escape_string($con, $_POST['ic']);
$alamat =  mysqli_real_escape_string($con, $_POST['alamat']);
$email =  mysqli_real_escape_string($con, $_POST['email']);
$no_matrik =  mysqli_real_escape_string($con, $_POST['no_matrik']);
$password =  mysqli_real_escape_string($con, $_POST['password']);

//encrypt password using bcrypt
//reference : https://stackoverflow.com/questions/4795385/how-do-you-use-bcrypt-for-hashing-passwords-in-php
$hash = password_hash($password, PASSWORD_BCRYPT);


//Insert data into database, $con comes from dbconfig.php
//reference : https://www.w3schools.com/php/php_mysql_insert.asp
$sql = "INSERT INTO users (nama, ic, alamat, email, password, no_matrik)
VALUES ('$nama', '$ic', '$alamat', '$email', '$hash', '$no_matrik')";

//If successful insert into DB
if ($con->query($sql) === TRUE) {
	//Redirect to daftarberjaya page
	//reference : https://stackoverflow.com/questions/2112373/php-page-redirect
	session_start();
	$_SESSION['user_id'] = mysqli_insert_id($con);
    header("Location: home.php");
} 
//If fail insert into DB
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>