<?php

require_once 'dbconfig.php';

//destroy and start session
//reference : https://www.w3schools.com/php/php_sessions.asp
session_destroy();
session_start();
//escapes special characters in a string for use in an SQL statement using mysqli_real_escape_string
//reference : https://www.w3schools.com/php/func_mysqli_real_escape_string.asp
$no_matrik =  mysqli_real_escape_string($con, $_POST['no_matrik']);
$password =  mysqli_real_escape_string($con, $_POST['password']);

//select from table users where ic equal to ic entered
$sql = "SELECT * FROM users WHERE no_matrik = '$no_matrik'";

//get result from query
$result = $con->query($sql);

//If result / data found in db
if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
    	//if password entered matched with hashed password in db then goto tentang.php
    	//reference : https://stackoverflow.com/questions/4795385/how-do-you-use-bcrypt-for-hashing-passwords-in-php
        if (password_verify($password, $row['password'])){
            $_SESSION['user_id'] = $row['id'];

            if($row['user_type'] == 0){
                header("Location: tentang.php");
            }
        	else if($row['user_type'] == 1){
                header("Location: admin_history.php");
            }
        	exit;
        }
        //if password entered does not matched with hashed password in db then goto home.php
        else{
        	//set session['error'] with error
        	$_SESSION["error"] = "login-error";
        	header("Location: home.php");
        	exit;
        }
    }
}
//If data not found, then goto home.php
else {
	//set session['error'] with error
	$_SESSION["error"] = "login-error";
    header("Location: home.php");
    exit;
}

?>