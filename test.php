<?php

require_once 'dbconfig.php';

//select from table users where ic equal to ic entered
// $sql = "SELECT * FROM users";

// $sth = mysqli_query($con, $sql);
// $rows = array();
// while($r = mysqli_fetch_assoc($sth)) {
//     $rows[] = $r;
// }
// print json_encode($rows);


$arr = array(
    array(
        "id" => 1,
        "name" => 'Google I/O',
        "location" => 'San Francisco, CA',
        "startDate" => "new Date(currentYear, 4, 28)",
        "endDate" => "new Date(currentYear, 4, 29)"
    ),
    array(
        "id" => 2,
        "name" => 'Google I/O',
        "location" => 'San Francisco, CA',
        "startDate" => "new Date(currentYear, 4, 28)",
        "endDate" => "new Date(currentYear, 4, 29)"
    ),
);

echo json_encode($arr);

?>