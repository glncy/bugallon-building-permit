<?php

include('../config/connection.php');
include('../functions.php');

$applicant_id = $_GET['applicant_id'];
$sql = "SELECT * FROM bp_building WHERE applicant_id = '$applicant_id' ORDER BY id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row=$result->fetch_assoc()){
        $response[] = $row;
    }
}
else {
    $response[] = array();
}
showResponse($response);
?>