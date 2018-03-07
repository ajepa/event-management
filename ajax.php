<?php 
	require_once 'dbconfig.php';
	$start_date = $_POST['start_date']; 
	$end_date = $_POST['end_date'];

    if($_POST['location'] == 1){
        $location = 'Dewan';
    }
    else{
        $location = 'Auditorium';
    }

    //Masa
    if(isset($_POST['masa_guna'])){
        $time_start = $_POST['masa_guna'];

        if(isset($_POST['ampm1'])){
            if($_POST['ampm1'] == "PM"){
                $time_start = $time_start + 12;
            }
            else{
                if(strlen($time_start) == 1){
                    $time_start = '0'.$time_start;
                }
            }
            
        }
        $time_start = $time_start . ":00:00";

        // if($time_start == '24:00:00'){
        //     $time_start = '23:59:59';
        // }

        // if($_POST['masa_guna'] ==''){
        //     $time_start = '00:00:00';
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
                if(strlen($time_end) == 1){
                    $time_end = '0'.$time_end;    
                }
            }
            
        }

        $time_end = $time_end . ":00:00";

        // if($time_end == '24:00:00'){
        //     $time_end = '23:59:59';
        // }

        // if($_POST['masa_pulang'] ==''){
        //     $time_end = '00:00:00';
        // }

        if($_POST['masa_pulang'] == 12 && $_POST['ampm2'] == "PM"){
            $time_end = '12:00:00';
        }
        if($_POST['masa_pulang'] == 12 && $_POST['ampm2'] == "AM"){
            $time_end = '00:00:00';
        }
    }

    //End Masa

	$pieces_start_date = explode("/", $start_date);
	$pieces_end_date = explode("/", $end_date);

	$start_date = $pieces_start_date[2] . '-' . $pieces_start_date[0] . '-' . $pieces_start_date[1];
	$end_date = $pieces_end_date[2] . '-' . $pieces_end_date[0] . '-' . $pieces_end_date[1];

    $start_timestamp = $start_date . ' ' . $time_start;
    $end_timestamp = $end_date . ' ' . $time_end;

    $datetimestart = new DateTime($start_timestamp);
    $datetimeend = new DateTime($end_timestamp);
    $diff = $datetimeend->getTimestamp() - $datetimestart->getTimestamp();

    if($diff < 1){
        echo "Date_time_issue";
        exit;
    }
    else{
        $query = "SELECT book.id FROM book
                                                            WHERE
                                                            (
                                                                (book.start_date < '$start_timestamp' AND book.end_date > '$start_timestamp') OR 
                                                                (book.start_date < '$end_timestamp' AND book.end_date > '$end_timestamp') OR 
                                                                (book.start_date >= '$start_timestamp' AND book.end_date <= '$end_timestamp')
                                                            )
                                                            AND
                                                            (book.approval = 1) AND book.location = '$location'";

        $result = $con->query($query);

        if(mysqli_num_rows($result) > 0){
            echo "Booked";
        }
        else{
            echo "Available";
        }

    }

	
?>