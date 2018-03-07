<?php
session_start();
include 'dbconfig.php';
include 'user_info.php';

$book_id = $_REQUEST['book_id'];
$status = $_REQUEST['status'];
$reason = $_REQUEST['reason'];

$query = "UPDATE book SET approval = '$status', reason = '$reason' WHERE id = '$book_id'";

$con->query($query);

$_SESSION["message"] = "Tempahan berjaya di kemaskini!";
header("Location: admin_history.php");
exit;

?>