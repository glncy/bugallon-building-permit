<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

include('../config/connection.php');
include('../functions.php');

$type = $conn->real_escape_string($_POST['applicant_type']);
$id = $conn->real_escape_string($_POST['applicant_id']);
unset($_POST['applicant_type']);
unset($_POST['applicant_id']);
$data = $conn->real_escape_string(json_encode($_POST));
if ($type == "building") {
    $sql = "INSERT INTO bp_building (applicant_id,data) VALUES ('$id','$data')";
    if ($conn->query($sql) or die ($conn->error)) {
        $last_id = $conn->insert_id;
        echo "<script>alert('Added Form Successfully!');window.location.href='../addpermit.php?type=building&id=".$last_id."';</script>";
    } else {
        echo "<script>alert('Failed to Add Form.');window.location.href='../addpermit.php'</script>";
    }   
}
else {
    $building_id = $conn->real_escape_string($_POST['building_id']);
    $sql = "INSERT INTO bp_forms (building_id,data,type) VALUES ('$building_id','$data','$type')";
    if ($conn->query($sql) or die ($conn->error)) {
        $last_id = $conn->insert_id;
        echo "<script>alert('Added Form Successfully!');window.location.href='../addpermit.php?type=".$type."&id=".$last_id."';</script>";
    } else {
        echo "<script>alert('Failed to Add Form.');window.location.href='../addpermit.php'</script>";
    } 
}
?>