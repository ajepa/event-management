<?php
session_start();
include 'dbconfig.php';
include 'user_info.php';

$book_id = $_REQUEST['book_id'];
$status = $_REQUEST['status'];

$query = "UPDATE book SET approval = '$status' WHERE id = '$book_id'";

$con->query($query);

$_SESSION["message"] = "Tempahan di batalkan!";
header("Location: history.php");
exit;

?>