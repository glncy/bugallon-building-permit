<?php

include('../config/connection.php');
include('../functions.php');

$building_id = $_GET['building_id'];
$sql = "SELECT * FROM bp_forms WHERE building_id='$building_id' AND (type='sanitary' OR type='electrical') ORDER BY id DESC";
$result = $conn->query($sql);
if ($result->num_rows == 2) {
    $response = array("status" => "completed_requirements");
}
elseif ($result-> num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($row['type']=="sanitary"){
        $response = array("status" => "require_electrical");
    }
    elseif ($row['type']=="electrical"){
        $response = array("status" => "require_sanitary");
    }
}
else {
    $response = array("status" => "sanitary_electrical_first");
}
showResponse($response);
?>