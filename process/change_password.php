<?php

include('../config/connection.php');
include('../functions.php');

$currentPw = $conn->real_escape_string($_POST['currentPw']);
$newPw = $conn->real_escape_string($_POST['newPw']);
$retypeNewPw = $conn->real_escape_string($_POST['retypeNewPw']);

$sql = "SELECT * FROM bp_users WHERE username='admin' AND pw='$currentPw' LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $id = $row['id'];
    if ($newPw == $retypeNewPw){
        $sql = "UPDATE bp_users SET pw='$newPw' WHERE id='$id'";
        if ($conn->query($sql) or die ($conn->error)){
            echo "<script>alert('Password Successfully Updated'); window.location.href='../home.php';</script>";
        }
        else {
            echo "<script>alert('Server Error. Please try again.'); window.location.href='../home.php';</script>";
        }
    }
    else {
        echo "<script>alert('New Password Mismatch. Please try again.'); window.location.href='../home.php';</script>";
    }
}
else {
    echo "<script>alert('Invalid Password. Please try again.'); window.location.href='../home.php';</script>";
}
