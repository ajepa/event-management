<?php 
session_start();
include 'dbconfig.php';
include 'user_info.php';

$lcd = $speaker = $laptop = $microphone = $screen = $tv = $extension = 0;
$time_start = "0";
$time_end = "0";

if(isset($_POST['lcd'])){
	$lcd = $_POST['lcd'];
}
if(isset($_POST['speaker'])){
	$speaker = $_POST['speaker'];
}
if(isset($_POST['laptop'])){
	$laptop = $_POST['laptop'];
}
if(isset($_POST['microphone'])){
	$microphone = $_POST['microphone'];
}
if(isset($_POST['screen'])){
	$screen = $_POST['screen'];
}
if(isset($_POST['tv'])){
	$tv = $_POST['tv'];
}
if(isset($_POST['extension'])){
	$extension = $_POST['extension'];
}

if(isset($_POST['masa_guna'])){
	$time_start = $_POST['masa_guna'];

	if(isset($_POST['ampm1'])){
		if($_POST['ampm1'] == "PM"){
			$time_start = $time_start + 12;
		}
		else{
			$time_start = '0'.$time_start;
		}
		
	}
	$time_start = $time_start . ":00:00";

	// if($time_start == '24:00:00'){
	// 	$time_start = '23:59:59';
	// }

	// if($_POST['masa_guna'] ==''){
	// 	$time_start = '00:00:00';
	// }

    if($_POST['masa_guna'] == 12 && $_POST['ampm1'] == "PM"){
        $time_start = '12:00:00';
    }
    if($_POST['masa_guna'] == 12 && $_POST['ampm1'] == "AM"){
        $time_start = '00:00:00';
    }
}

if(isset($_POST['masa_pulang'])){
	$time_end = $_POST['masa_pulang'];

	if(isset($_POST['ampm2'])){
		if($_POST['ampm2'] == "PM"){
			$time_end = $time_end + 12;	
		}
		else{
			$time_end = '0'.$time_end;
		}
		
	}

	$time_end = $time_end . ":00:00";

	// if($time_end == '24:00:00'){
	// 	$time_end = '23:59:59';
	// }

	// if($_POST['masa_pulang'] ==''){
	// 	$time_end = '00:00:00';
	// }

    if($_POST['masa_pulang'] == 12 && $_POST['ampm2'] == "PM"){
        $time_end = '12:00:00';
    }
    if($_POST['masa_pulang'] == 12 && $_POST['ampm2'] == "AM"){
        $time_end = '00:00:00';
    }
}

$pieces_start_date = explode("/", $_POST['tarikh_guna']);
$pieces_end_date = explode("/", $_POST['tarikh_pulang']);

$start_date = $pieces_start_date[2] . '-' . $pieces_start_date[0] . '-' . $pieces_start_date[1];
$end_date = $pieces_end_date[2] . '-' . $pieces_end_date[0] . '-' . $pieces_end_date[1];

$start_timestamp = $start_date . ' ' . $time_start;
$end_timestamp = $end_date . ' ' . $time_end;

$nama_program = $_POST['nama_program'];
$location = $_POST['location'];
$user_id = $user_id;
$jawatan = $_POST['jawatan/persatuan'];
$no_tel = $_POST['no_tel'];

$query = "INSERT INTO `book`(`user_id`, `location`, `lcd`, `speaker`, `laptop`, `microphone`, `screen`, `tv`, `extension`, `nama_program`, `jawatan`, `no_tel`, `approval`, `start_date`, `end_date`) VALUES ('$user_id','$location','$lcd','$speaker','$laptop','$microphone','$screen','$tv','$extension','$nama_program','$jawatan','$no_tel', 0,'$start_timestamp','$end_timestamp')";

$con->query($query);

$_SESSION["message"] = "Tempahan berjaya!";
header("Location: history.php");
exit;

?>