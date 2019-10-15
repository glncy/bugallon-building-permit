<?php

include('../config/connection.php');
include('../functions.php');

$sql = "SELECT * FROM bp_applicants ORDER BY id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row=$result->fetch_assoc()){
        $id = $row['id'];
        $sql_2 = "SELECT * FROM bp_building WHERE applicant_id = '$id' ORDER BY id DESC";
        $result_2 = $conn->query($sql_2);
        if ($result_2->num_rows > 0) {
            $row['existing_buildings'] = "true";
        }
        else {
            $row['existing_building'] = "false";
        }
        $response[] = $row;
    }
}
else {
    $response = array();
}
showResponse($response);
?>