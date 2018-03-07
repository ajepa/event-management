<?php

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id = '$user_id'";

$result = $con->query($query);

$row = mysqli_fetch_assoc($result);

$user_name = $row['nama'];
$user_ic = $row['ic'];
$user_address = $row['alamat'];
$user_email = $row['email'];
$user_matrik = $row['no_matrik'];
$user_type = $row['user_type'];

if(!isset($user_id)){
	header("Location: home.php");
}

?>