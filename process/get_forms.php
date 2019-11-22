<?php

include('../config/connection.php');
include('../functions.php');

header("Content-type: application/json");
$forms = ['agricultural','demolition','electrical','electronics','fencing','mechanical','sanitary'];
$building_id = $_GET['id'];
$loop = 0;
$display = "<ul>";
while ($loop < count($forms)){
    $sql = "SELECT * FROM bp_forms WHERE building_id = '$building_id' AND type = '".$forms[$loop]."' LIMIT 1";
    $result = $conn->query($sql) or die($conn->error);
    if ($result->num_rows > 0) {
        $row=$result->fetch_assoc();
        $response[] = array($forms[$loop] => $row['id']);
    }
    else {
        $response[] = array($forms[$loop] => null);
    }
    $loop++;
}
showResponse($response);
?>