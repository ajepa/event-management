<?php
session_start();
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
$_SESSION = [];
print_r($_SESSION);
header("Location: home.php");

?>