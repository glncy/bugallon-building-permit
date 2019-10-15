<?php

include('../config/connection.php');
include('../functions.php');

$fname = $conn->real_escape_string($_POST['fname']);
$lname = $conn->real_escape_string($_POST['lname']);
$mi = $conn->real_escape_string($_POST['mi']);
$tin = $conn->real_escape_string($_POST['tin']);
$add_no = $conn->real_escape_string($_POST['add_no']);
$street = $conn->real_escape_string($_POST['street']);
$barangay = $conn->real_escape_string($_POST['barangay']);
$municipality = $conn->real_escape_string($_POST['municipality']);
$zip_code = $conn->real_escape_string($_POST['zip_code']);
$tel_no = $conn->real_escape_string($_POST['tel_no']);

$sql = "INSERT INTO bp_applicants (fname,lname,mi,tin,add_no,street,barangay,municipality,zip_code,tel_no) VALUES ('$fname','$lname','$mi','$tin','$add_no','$street','$barangay','$municipality','$zip_code','$tel_no')";
if ($conn->query($sql) or die($conn->error)) {
    $id = $conn->insert_id;
    $response = array("status" => "success_add", "id" => $id);
}
else {
    $response[] = array("status" => "failed_add");
}
showResponse($response);
?>