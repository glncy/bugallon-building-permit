<?php

include('config/connection.php');
include('functions.php');

if (isset($_POST['submit'])){
	$id = $_GET['id'];
	$lname = $conn->real_escape_string($_POST['lname']);
	$fname = $conn->real_escape_string($_POST['fname']);
	$mi = $conn->real_escape_string($_POST['mi']);
	$tin = $conn->real_escape_string($_POST['tin']);
	$add_no = $conn->real_escape_string($_POST['street']);
	$barangay = $conn->real_escape_string($_POST['barangay']);
	$municipality = $conn->real_escape_string($_POST['municipality']);
	$zip_code = $conn->real_escape_string($_POST['zip_code']);
	$tel_no = $conn->real_escape_string($_POST['tel_no']);
	$sql = "UPDATE bp_applicants SET lname='$lname',fname='$fname',mi='$mi',tin='$tin',add_no='$add_no',barangay='$barangay',municipality='$municipality',zip_code='$zip_code',tel_no='$tel_no' WHERE id='$id'";
	if ($conn->query($sql)){
		echo "<script>alert('Updated Successfully');</script>";
	}
	else {
		echo "<script>alert('Failed to update due to Server Error. Please try again.');</script>";
	}
}

if (isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "SELECT * FROM bp_applicants WHERE id='1' LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
	}
	else {
		header("Location: archive.php");
	}
}
else {
	header("Location: archive.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data | OBO-Bugallon Office</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo_img.png">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" href="css/obofonticon.css">
	<style type="text/css">
		body, h1, h5, h6, div, label{
			font-family: "Microsoft JengHei", sans-serif!important;
		}
		#openNav{
			width: auto!important;
		}
		.w3-modal-content footer .w3-bar-item{
			background: #0099CC;
			color: white;
			width: 50%;	
		}
		.cont_content{
			margin: 0px 5%;
		}
		#form_search_applicant > div{
			margin: 0px 10%;
			padding-top: 10px;
		}
		#form_search_applicant h6, #cont_add_permit h6{
			font-weight: bolder;
		}
		#form_search_applicant input, #cont_add_permit #sel_permit{
			display: inline;
			width: 80%;
		}
		#cont_add_permit{
			margin: 5px 10%;
		}
		#contform button{
			background: #0099CC;
			color: white;
		}
		.contold h3{
			color: #0099CC;
			font-weight: 500!important;
		}
		.contold .w3-card, #form .w3-card{
			padding: 10px;
		}
		.contold > .w3-cell, .contold .w3-cell-row .w3-cell, #contform, #form .w3-card > .w3-container > .w3-cell-row > .w3-cell, #form .w3-card > .w3-container .w3-row > .w3-col, #cont2box > .w3-cell, #form > .w3-card > .w3-cell-row > .w3-cell{
			padding: 5px;
		}
		@media screen and (max-width: 1218px){
			.contold label{
				font-size: 9pt;	
			}
		}
		#data_table{
			width: 100%;
			padding-top: 20px;
		}
		#data_table thead{
			background: #0099CC;
		}
		#data_table tbody tr a{
			width: 50%;
			background: #0099CC;
			color: white;
		}
	</style>
	<script type="text/javascript" src="js/js_permit.js"></script>
</head>
<body>
	<?php
		require("sidenav.php");
	?>
	
	<button class="w3-button w3-xlarge w3-round-large w3-top" onclick="w3_open()" id="openNav"><i class="demo-icon icon-th-large-outline"></i></button>

	<div id="main">
	<form method="POST">
		<div class="w3-container cont_content">
			<div id="selectApplicant">
				<div class="w3-bar" style="padding-top: 20px; padding-bottom: 10px;">
				</div>
				<div class="w3-cell-row w3-row contold" id="newApplicant">
					<div class="w3-col l12 m12 w3-cell">
						<div class="w3-card w3-round-large w3-white">
							<div class="w3-container">
								<h3>Edit Applicant Information</h3>
							</div>
							<div class="w3-container">
								<h6>Name of Owner/Applicant</h6>
							</div>
							<div class="w3-container">
								<div class="w3-cell-row">	
									<div class="w3-cell">
										<label>Last Name</label>
										<input class="w3-input" type="text" name="lname" value="<?php echo $row['lname']?>">
									</div>
									<div class="w3-cell">
										<label>First Name</label>
										<input class="w3-input" type="text" name="fname" value="<?php echo $row['fname']?>">
									</div>
									<div class="w3-cell">
										<label>MI</label>
										<input class="w3-input" type="text" name="mi" value="<?php echo $row['mi']?>">
									</div>
									<div class="w3-cell">
										<label>TIN</label>
										<input class="w3-input" type="text" name="tin" value="<?php echo $row['tin']?>">
									</div>
								</div>
								<div class="w3-cell-row">
									<div class="w3-cell">
										<label>Add. No.</label>
										<input class="w3-input" type="text" name="add_no" value="<?php echo $row['add_no']?>">
									</div>
									<div class="w3-cell">
										<label>Street</label>
										<input class="w3-input" type="text" name="street" value="<?php echo $row['street']?>">
									</div>
								</div>
								<div class="w3-cell-row">
									<div class="w3-cell">
										<label>Barangay</label>
										<input class="w3-input" type="text" name="barangay" value="<?php echo $row['barangay']?>">
									</div>
									<div class="w3-cell">
										<label>Municipality</label>
										<input class="w3-input" type="text" name="municipality" value="<?php echo $row['municipality']?>">
									</div>
									<div class="w3-cell">
										<label>ZIP Code</label>
										<input class="w3-input" type="text" name="zip_code" value="<?php echo $row['zip_code']?>">
									</div>
									<div class="w3-cell">
										<label>Tel/Fax No.</label>
										<input class="w3-input" type="text" name="tel_no" value="<?php echo $row['tel_no']?>">
									</div>
									<input type="hidden" value="submit" name="submit"/>
								</div>
								<br/>
								<button class="w3-button w3-round-xxlarge w3-green w3-large" type="submit">Save</button>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</form>
</div>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/w3.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
</body>
</html>