<?php
include('../config/connection.php');
if (!isset($_GET['id'])) {
	header("Location: ../home.php");
}
else {
	$id = $_GET['id'];
	$sql = "SELECT * FROM bp_forms WHERE id='$id' LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$building_id = $row['building_id'];
		$sql = "SELECT * FROM bp_building WHERE id='$building_id' LIMIT 1";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$applicant_id = $row['applicant_id'];
		$sql = "SELECT * FROM bp_applicants WHERE id='$applicant_id' LIMIT 1";
		$result = $conn->query($sql);
		$applicant_info = $result->fetch_assoc();
	}
	else {
		header("Location: ../home.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sanitary/Plumbing Permit</title>
	<link rel="icon" href="../images/logo_img.png">
	<link rel="stylesheet" href="../css/w3.css">
	<style type="text/css">
		body{
			font-family: "Arial", sans-serif;
			font-size: 10pt;
			margin: 100px;
		}
		.box_numbers{
			margin: 3px;
			font-weight: bold;
		}
		.text_bold{
			font-weight: bolder;
		}
		table, tr, th, td{
			border-collapse: collapse;
		}
		th{
			font-weight: normal!important;
		}
		.tbl_header td, .div_checkbox{
			width: 14pt;
			height: 14pt;
			display: inline-flex;
		}
		.bordered, .tbl_header td, .div_checkbox{
			 border: 1px solid black;
		}
		.div_placeholder{
			height: 10pt;
			display: inline-flex;
		}
		.div_placeholder_underlined{
			border-bottom: 1px solid black;
			display: inline-flex;
		}
		.tbl_header{
			display: inline-table;
		}
		.form_label{
			font-size: 9pt;
			padding-left: 5px;
		}
		.checkbox_large{
			display: inline;
		}
		ol{ 
			padding-left: 1.8em; 
		}
		ol li{ 
			margin: 0; 
			padding: 0;
		}
		@media print{
			body{
				margin: 0px;
			}
			header nav, footer{
				content: "";
			}
		}

	</style>
</head>
<body>
	<div>
		<div class="w3-center">REPUBLIC OF THE PHILIPPINES</div>
		<div class="w3-center"><span class="text_bold">MUNICIPALITY OF</span> <div class="div_placeholder_underlined"></div></div>
		<div class="w3-center">OFFICE OF THE BUILDING OFFICIAL</div>
		<br>
		<div class="w3-center"><div class="div_placeholder_underlined"></div></div>
		<div class="w3-center">DISTRICT/CITY MUNICIPALITY</div>		
		<div class="w3-row">
			<div class="w3-col l4 m4 s4">
				APPLICATION NO.
			</div>
			<div class="w3-col l4 m4 s4 w3-center">
				AREA CODE <span class="div_placeholder_underlined"></span>
			</div>
			<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			<div class="w3-col l3 m3 s3">
				PERMIT NO.
			</div>
		</div>
		<div class="w3-row">
			<div class="w3-col l4 m4 s4">
				<table class="tbl_header">
					<tr>
						<td></td>
						<td></td><?php
include('../config/connection.php');
if (!isset($_GET['id'])) {
	header("Location: ../home.php");
}
else {
	$id = $_GET['id'];
	$sql = "SELECT * FROM bp_forms WHERE id='$id' LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$building_id = $row['building_id'];
		$sql = "SELECT * FROM bp_building WHERE id='$building_id' LIMIT 1";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$applicant_id = $row['applicant_id'];
		$sql = "SELECT * FROM bp_applicants WHERE id='$applicant_id' LIMIT 1";
		$result = $conn->query($sql);
		$applicant_info = $result->fetch_assoc();
	}
	else {
		header("Location: ../home.php");
	}
}
?>
						<td style="width: 5pt"></td>
						<td></td>
						<td></td>
						<td style="width: 5pt"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
			<div class="w3-col l4 m4 s4 w3-center"><div class="div_placeholder"></div></div>
			<div class="w3-col l4 m4 s4" style="text-align: right;">
				<table class="tbl_header">
					<tr>
						<td></td>
						<td></td>
						<td style="width: 5pt"></td>
						<td></td>
						<td></td>
						<td style="width: 5pt"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="w3-row">
			<div class="w3-col l3 m3 s3 w3-border-bottom w3-center">
				<div class="div_placeholder"><!--DATE OF APPLICATION.--></div>
			</div>
			<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			<div class="w3-col l4 m4 s4 w3-center"><div class="div_placeholder"></div></div>
			<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			<div class="w3-col l3 m3 s3 w3-center w3-border-bottom">
				<div class="div_placeholder"><!--DATE ISSUE--></div>
			</div>
		</div>
		<div class="w3-row">
			<div class="w3-col l4 m4 s4">DATE OF APPLICATION</div>
			<div class="w3-col l4 m4 s4 w3-center"><div class="div_placeholder"></div></div>
			<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			<div class="w3-col l3 m3 s3 w3-center">DATE ISSUE</div>
		</div>
		<div class="w3-center text_bold" style="font-size: 12pt;">SANITARY/PLUMBING PERMIT</div>
		<div class="box_numbers">BOX 1. (TO BE ACCOMPLISHED BY A DULY QUALIFIED ELECTRICAL PRACTITIONER)</div>
		<div style="width: 100%; border-radius: 25px; border: 2px solid black">
			<table style="width: 100%">
				<tr>
					<td colspan="3">
						<div class="w3-row">
							<div class="w3-col l6 m6 s6 form_label" style="padding-left: 30px">NAME OF OWNER/APPLICANT:</div>
							<div class="w3-col l6 m6 s6 form_label">LAST NAME, FIRST NAME, M.I.</div>
						</div>
						<div class="div_placeholder" style="margin-left: 51%;">
							<strong><?php echo $applicant_info['lname']; ?>, <?php echo $applicant_info['fname']; ?>, <?php echo $applicant_info['mi']; ?></strong>
						</div>
					</td>
					<td width="20%" class="form_label" style="border-left: 1px solid black">
						<div>TAX ACCT. NO</div> 
						<div class="div_placeholder w3-center"><!--TIN--></div>
					</td>
				</tr>
				<tr style="border-top: 1px solid black">
					<td colspan="3">
						<div class="w3-row">
							<div class="w3-col l6 m6 s6 form_label" style="padding-left: 30px">ADDRESS</div>
							<div class="w3-col l6 m6 s6 form_label">NO., STREET, BARANGAY, CITY/MUNICIPALITY</div>
						</div>
						<div class="div_placeholder" style="margin-left: 51%;">
							<strong><?php echo $applicant_info['add_no']; ?>., <?php echo $applicant_info['street']; ?>, <?php echo $applicant_info['barangay']; ?>, <?php echo $applicant_info['municipality']; ?></strong>
						</div>
					</td>
					<td width="20%" class="form_label" style="border-left: 1px solid black">
						<div>TELEPHONE NO.</div> 
						<div class="div_placeholder w3-center"><!--TIN--><strong><?php echo $applicant_info['tel_no']; ?></strong></div>
					</td>
				</tr>
				<tr style="border-top: 1px solid black">
					<td colspan="3">
						<div class="w3-row">
							<div class="w3-col l6 m6 s6 form_label">LOCATION OF INSTALLATION</div>
							<div class="w3-col l6 m6 s6 form_label">NO., STREET, BARANGAY, CITY/MUNICIPALITY</div>
						</div>
						<div class="div_placeholder"></div>
					</td>
					<td width="20%" class="form_label" style="border-left: 1px solid black">
						<div></div> 
						<div class="div_placeholder w3-center"><!--TIN--></div>
					</td>
				</tr>
				<tr style="border-top: 1px solid black; font-size: 8pt">
					<td colspan="4" style="padding: 2px 5px;">
						<div class="w3-row">
							<div class="w3-col l4 m4 s4">
								<div class="form_label text_bold">SCOPE OF WORK</div>
								<div>
									<div>&#x2610;<!--change to &#x2612; when ticked-->NEW INSTALLATION</div>
								</div>
							</div>
							<div class="w3-col l5 m5 s5">
								<div>&#x2610;<!--change to &#x2612; when ticked--> ADDITION OF <div class="div_placeholder_underlined" style="min-width: 55%; max-width: 55%"></div>
								</div>
								<div>&#x2610;<!--change to &#x2612; when ticked--> REPAIR OF <div class="div_placeholder_underlined" style="min-width: 58%; max-width: 58%"></div>
								</div>
								<div>&#x2610;<!--change to &#x2612; when ticked--> REMOVAL OF <div class="div_placeholder_underlined" style="min-width: 55%; max-width: 55%"></div>
								</div>
							</div>
							<div class="w3-col l3 m3 s3" style="text-align: right;">
								<div>OTHERS (SPECIFY)</div>
								<div>&#x2610;<!--change to &#x2612; when ticked--> 
									<div class="div_placeholder_underlined" style="min-width: 35%; max-width: 35%"></div> OF <div class="div_placeholder_underlined" style="min-width: 35%; max-width: 35%"></div>
								</div>
								<div>&#x2610;<!--change to &#x2612; when ticked--> 
									<div class="div_placeholder_underlined" style="min-width: 35%; max-width: 35%"></div> OF <div class="div_placeholder_underlined" style="min-width: 35%; max-width: 35%"></div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr style="border-top: 1px solid black; font-size: 8pt">
					<td colspan="4" style="padding: 2px 5px;">
						<div class="form_label text_bold">USE OR TYPE OF OCCUPANCY</div>
						<div class="w3-row">
							<div class="w3-col l6 m6 s6" style="padding-left: 5px">
								<div>&#x2610;<!--change to &#x2612; when ticked--> RESIDENTIAL <div class="div_placeholder_underlined" style="min-width: 69%; max-width: 69%"></div></div>
								<div>&#x2610;<!--change to &#x2612; when ticked--> COMMERCIAL <div class="div_placeholder_underlined" style="min-width: 68%; max-width: 68%"></div></div>
								<div>&#x2610;<!--change to &#x2612; when ticked--> INDUSTRIAL <div class="div_placeholder_underlined" style="min-width: 70%; max-width: 70%"></div></div>
								<div>&#x2610;<!--change to &#x2612; when ticked--> INSTITUTIONAL <div class="div_placeholder_underlined" style="min-width: 65%; max-width: 65%"></div></div>
							</div>
							<div class="w3-col l6 m6 s6">
								<div>&#x2610;<!--change to &#x2612; when ticked--> AGRICULTURAL <div class="div_placeholder_underlined" style="min-width: 65%; max-width: 65%"></div></div>
								<div>&#x2610;<!--change to &#x2612; when ticked--> PARKS, PLAZAS, MONUMENTS <div class="div_placeholder_underlined" style="min-width: 42%; max-width: 42%"></div></div>
								<div>&#x2610;<!--change to &#x2612; when ticked--> RECREATIONAL <div class="div_placeholder_underlined" style="min-width: 65%; max-width: 65%"></div></div>
								<div>&#x2610;<!--change to &#x2612; when ticked--> OTHERS (SPECIFY) <div class="div_placeholder_underlined" style="min-width: 59%; max-width: 59%"></div></div>
							</div>
						</div>
					</td>
				</tr>
				<tr style="border-top: 1px solid black; font-size: 8pt;">
					<td colspan="4" style="padding: 2px 5px">
						<div class="form_label text_bold">FIXTURES TO BE INSTALLED</div>
						<div class="w3-row" style="padding-left: 10px">
							<div class="w3-col l6 m6 s6">
								<div class="w3-row">
									<div class="w3-col l2 m2 s2">
										<div><br>QTY</div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
									</div>
									<div class="w3-col l2 m2 s2">
										<div>NEW<br>FIXTURES</div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
									</div>
									<div class="w3-col l2 m2 s2">
										<div>EXISTING<br>FIXTURES</div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
									</div>
									<div class="w3-col l6 m6 s6">
										<div>KIND OF<br>FIXTURES</div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>WATER CLOSET</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>FLOOR DRAIN</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>LAVATORIES</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>KITCHEN SINK</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>FAUCET</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>SHOWER HEAD</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>WATER METER</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>GREASE TRAP</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>BATH TUBS</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>SLOP SINK</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>URINAL</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>AIR CONDITIONING UNIT</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>WATER TANK/RESERVOIR</span></div>
									</div>
								</div>
								<div><div class="div_placeholder_underlined" style="width: 100pt;"></div> TOTAL</div>
							</div>
							<div class="w3-col l6 m6 s6">
								<div class="w3-row">
									<div class="w3-col l2 m2 s2">
										<div><br>QTY</div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
										<div><div class="div_placeholder_underlined" style="width: 20pt;"></div></div>
									</div>
									<div class="w3-col l2 m2 s2">
										<div>NEW<br>FIXTURES</div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
									</div>
									<div class="w3-col l2 m2 s2">
										<div>EXISTING<br>FIXTURES</div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--></div></div>
									</div>
									<div class="w3-col l6 m6 s6">
										<div>KIND OF<br>FIXTURES</div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>BIDETTE</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>LAUNDRY TRAYS</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>DENTAL CUSPIDOR</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>GAS HEATER</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>ELECTRIC HEATER</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>WATER BOILER</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>DRINKING FOUNTAIN</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>BAR SINK</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>SODA FOUNTAIN</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>LABORATORY SINK</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>STERILIZER</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>SWIMMING POOL</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>OTHERS (SPECIFY)</span></div>
									</div>
								</div>
								<div><div class="div_placeholder_underlined" style="width: 100pt;"></div> TOTAL</div>
							</div>
						</div>

						<div class="w3-row">
							<div class="w3-col l4 m4 s4 w3-center">
								<div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>WATER DISTRIBUTION SYSTEM</span>
							</div>
							<div class="w3-col l4 m4 s4 w3-center">
								<div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>SANITARY SEWER SYSTEM</span>
							</div>
							<div class="w3-col l4 m4 s4 w3-center">
								<div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>STORM DRAINAGE SYSTEM</span>
							</div>
						</div>
					</td>
				</tr>
				<tr style="border-top: 1px solid black; font-size: 8pt">
					<td colspan="4">
						<div class="w3-row">
							<div class="w3-col l5 m5 s5">
								<div class="form_label text_bold">WATER SUPPLY</div>
								<div style="padding-left: 20px">
									<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>SHALLOW WELL</span></div>
									<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>DEEP WELL & PUMP SET</span></div>
									<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>CITY/MUNICIPAL WATER SYSTEM</span></div>
									<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>OTHERS</span><div class="div_placeholder_underlined" style="width: 40%"></div></div>
								</div>
							</div>
							<div class="w3-col l7 m7 s7">
								<div class="form_label text_bold">SYSTEM OF DISPOSAL</div>
								<div class="w3-row" style="padding-left: 20px">
									<div class="w3-col l6 m6 s6">
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>WASTE WATER TREATMENT PLANT</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>SEPTIC VAULT/IMHOFF TANK</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>SANITARY SEWER CONNECTION</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>SUB-SURFACE SAND FILTER</span></div>
									</div>
									<div class="w3-col l6 m6 s6">
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>SURFACE DRAINAGE</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>STREET CANAL</span></div>
										<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>WATER COURSE</span></div>
									</div>
								</div>
							</div>
						</div>
						<div class="w3-row">
							<div class="w3-col l6 m6 s6" style="padding-left: 20px">
								<div class="form_label">NUMBER OF STOREYS OF BUILDING</div>
								<div style="padding-left: 20px">
									<div><div class="div_placeholder_underlined" style="width: 150px"></div></div>
									<div>PROPOSED DATE<br>START OF INSTALLATION <div class="div_placeholder_underlined" style="width: 120px"></div></div>
									<div>EXPECTED DATE<br>OF COMPLETION <div class="div_placeholder_underlined" style="width: 160px"></div></div>
								</div>
							</div>
							<div class="w3-col l6 m6 s6">
								<div class="form_label">TOTAL AREA OF BUILDING/SUBDIVISION</div>
								<div style="padding-left: 20px">
									<div class="div_placeholder_underlined" style="width: 150px"></div> SQ. M.
									<div>TOTAL COST<br>OF INSTALLATION P<div class="div_placeholder_underlined" style="width: 135px"></div></div>
									<div>PREPARED BY <div class="div_placeholder_underlined" style="width: 160px"></div></div>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
		

		<div class="box_numbers">BOX 2 (TO BE ACCOMPLISHED BY BUILDING OFFICIAL)</div>
		<div style="width: 100%; border-radius: 25px; border: 2px solid black; font-size: 7pt; page-break-after: always;">
			<div class="form_label text_bold" style="padding-left: 20px">ACTION TAKEN</div>
			<div class="w3-row">
				<div class="w3-col l8 m8 s8" style="padding-left: 40px">
					PERMIT IS HEREBY GRANTED TO INSTALL THE SANITARY/PLUMBING<br>FIXTURE ENUMERATED HEREIN SUBJECT TO THE FOLLOWING<br>CONDITIONS<br>
					<ol style="list-style-type: 1; margin: 0px!important;">
						<li>THAT THE PROPOSED INSTALLATION SHALL BE IN ACCORDANCE WITH APPROVE PLANS FILE WIH THIS OFFICE AND COFORMITY WITH THE NATIONAL BUILDING CODE.</li>
						<li>THAT A DULY LICENSED SANITARY ENGINEER/MASTER PLUMBER BE ENGAGED TO UNDERTAKE THE INSTALLATION/CONSTRUCTION.</li>
						<li>THAT A CERTIFICATE OF COMPLETION DULY SIGNED BY A SANITARY ENGINEER/MASTER PLUMBER IN CHARGE OF THE INSTALLATION SHALL BE SUBMITTED NOT LATER THAN SEVEN (7) DAYS AFTER COMPLETION OF THE INSTALLATION.</li>
						<li>THAT A CERTIFICATE OF FINAL INSPECTION AND A CERTIFICATE OF OCCUPANCY SHALL BE SECURED PRIOR TO THE ACTUAL OCCUPANCY OF<!---KULANG--></li>
					</ol>
				</div>
				<div class="w3-col l4 m4 s4">
					<div style="margin: 50px 0px">
						<div class="w3-center">
							<div class="div_placeholder_underlined" style="width: 70%"></div>
							<div>BUILDING OFFICIAL</div>
						</div>
						<div class="w3-center" style="margin-top: 20px">
							<div class="div_placeholder_underlined" style="width: 40%"></div>
							<div>DATE</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="box_numbers">BOX 3 <span style="font-weight: normal;">(TO BE ACCOMPLISHED BY THE RECEIVING & RECORDING SECTION)</span></div>
		<div style="width: 100%; border-radius: 25px; border: 2px solid black; font-size: 8pt;">
			<div class="form_label text_bold w3-center">BUILDING DOCUMENTS</div>
			<div class="w3-row">
				<div class="w3-col l6 m6 s6" style="padding-left: 40px">
					<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>SANITARY PLUMBING PLANS & SPECIFICATIONS</span></div>
					<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>BILL OF MATERIALS</span></div>
				</div>
				<div class="w3-col l6 m6 s6" style="padding-left: 40px">
					<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>COST OF ESTIMATES</span></div>
					<div><div class="checkbox_large">&#x2610;<!--change to &#x2612; when ticked--> </div><span>OTHERS (SPECIFY)</span><div class="div_placeholder_underlined" style="width: 200px"></div></div>
					<div class="div_placeholder_underlined" style="width: 90%"></div>
				</div>
			</div>
		</div>

		<div class="box_numbers">BOX 4 <span style="font-weight: normal;">(TO BE ACCOMPLISHED BY DIVISION/SECTION CONCERNED)</span></div>
		<div style="width: 100%; border-radius: 25px; border: 2px solid black; font-size: 8pt;">
			<div class="form_label text_bold w3-center">ASSESSED FEES</div>
			<table width="100%">
				<tr style="border-top: 1px solid black">
					<td width="20%"></td>
					<td class="w3-center" style="border-left: 1px solid black">AMOUNT DUE</td>
					<td class="w3-center" style="border-left: 1px solid black">ASSESSED BY</td>
					<td class="w3-center" style="border-left: 1px solid black">O.R. NUMBER</td>
					<td class="w3-center" style="border-left: 1px solid black">DATE PAID</td>
				</tr>
				<tr style="border-top: 1px solid black">
					<td ><div class="div_placeholder"></div></td>
					<td style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
				</tr>
				<tr style="border-top: 1px solid black">
					<td ><div class="div_placeholder"></div></td>
					<td style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
				</tr>
			</table>
		</div>

		<div class="box_numbers">BOX 5 <span style="font-weight: normal;">(TO BE ACCOMPLISHED BY DIVISION/SECTION CONCERNED)</span></div>
		<div style="width: 100%; border-radius: 25px; border: 2px solid black; font-size: 8pt;">
			<div class="form_label text_bold w3-center">PROGRESS FLOW</div>
			<table width="100%">
				<tr style="border-top: 1px solid black">
					<td rowspan="2">
						<div style="padding-left: 10px">NOTED</div>
						<div style="padding-left: 30px">CHIEF PROCESSING DIVISION/SECTION</div>
					</td>
					<td colspan="2" class="w3-center" style="border-left: 1px solid black">IN</td>
					<td colspan="2" class="w3-center" style="border-left: 1px solid black">OUT</td>
					<td class="w3-center" style="border-left: 1px solid black"></td>
					<td class="w3-center" style="border-left: 1px solid black"></td>
				</tr>
				<tr style="border-top: 1px solid black">
					<td class="w3-center">TIME</td>
					<td class="w3-center" style="border-left: 1px solid black">DATE</td>
					<td class="w3-center" style="border-left: 1px solid black">TIME</td>
					<td class="w3-center" style="border-left: 1px solid black">DATE</td>
					<td class="w3-center" style="border-left: 1px solid black">ACTION/REMARKS</td>
					<td class="w3-center" style="border-left: 1px solid black">PROCESSED BY</td>
				</tr>
				<tr style="border-top: 1px solid black">
					<td style="padding-left: 30px">RECEIVING AND RECORDING</td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
				</tr>
				<tr style="border-top: 1px solid black">
					<td style="padding-left: 30px">GEODETIC (LINE AND GRADE)</td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
				</tr>
				<tr style="border-top: 1px solid black">
					<td style="padding-left: 30px">SANITARY</td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
					<td class="w3-center" style="border-left: 1px solid black"><div class="div_placeholder"></div></td>
				</tr>
			</table>
		</div>
		<div>WE HEREBY AFFIX OUR HANDS SIGNIFYING OUR CONFORMITY TO THE INFORMATIO HEREIN ABOVE SETFORTH.</div>

		
		<div class="w3-row">
			<div class="w3-col l6 m6 s6">
				<div class="box_numbers">BOX 6</div>
				<div style="border-radius: 25px; border: 2px solid black; font-size: 8pt">
					<table style="width: 100%">
						<tr>
							<td colspan="2" style="padding-left: 10px">SANITARY ENGINEER/MASTER PLUMBER<br>IN CHARGE OF INSTALLATION</td>
							<td style="border-left: 1px solid black;">PRC REG NO.<br><div class="div_placeholder"><!--PRC REG NO.--></div></td>
						</tr>
						<tr style="border-top: 1px solid black;">
							<td colspan="3" style="padding-left: 10px">PRINT NAME <div class="div_placeholder"><!-- PRINT NAME --></div></td>
						</tr>
						<tr style="border-top: 1px solid black;">
							<td colspan="3" style="padding-left: 10px">ADDRESS <div class="div_placeholder"><!-- ADDRESS --></div></td>
						</tr>
						<tr style="border-top: 1px solid black;">
							<td style="padding-left: 10px">PTR. No.<br/><div class="div_placeholder"><!-- PTR. No. --></div></td>
							<td style="border-left: 1px solid black;">DATE ISSUED<br/><div class="div_placeholder"><!-- DATE ISSUED --></div></td>
							<td style="border-left: 1px solid black;">PLACE ISSUED<br/><div class="div_placeholder"><!-- PLACE ISSUED --></div></td>
						</tr>
						<tr style="border-top: 1px solid black;">
							<td colspan="2" style="padding-left: 10px">SIGNATURE<br/><div class="div_placeholder"><!-- SIGNATURE --></div></td>
							<td style="border-left: 1px solid black;">TAN<br/><div class="div_placeholder"><!-- TAN --></div></td>
						</tr>
					</table>
				</div>
			</div>

			<div class="w3-col l6 m6 s6" style="padding-left: 7px;">
				<div class="box_numbers">BOX 8</div>
				<div style="border-radius: 25px; border: 2px solid black; font-size: 8pt">
					<table style="width: 100%;">
						<tr>
							<td colspan="3">
								<div style="padding-left: 10px">SIGNATURE</div>
								<div class="w3-center" style="margin-top: 45px">
									<div class="div_placeholder_underlined" style="width: 70%"></div>
									<div class="w3-center">APPLICANT</div>
								</div>
								
							</td>
						</tr>
						<tr style="border-top: 1px solid black;">
							<td class="w3-center">RES CERT. NO.</td>
							<td class="w3-center" style="border-left: 1px solid black;">DATE ISSUED</td>
							<td class="w3-center" style="border-left: 1px solid black;">PLACE ISSUED</td>
						</tr>
						<tr  style="border-top: 1px solid black;">
							<td height="35px"><div class="div_placeholder"></div></td>
							<td height="35px" style="border-left: 1px solid black;"><div class="div_placeholder"></div></td>
							<td height="35px" style="border-left: 1px solid black;"><div class="div_placeholder"></div></td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="w3-row">
			<div class="w3-col l6 m6 s6">
				<div class="box_numbers">BOX 7</div>
				<div style="border-radius: 25px; border: 2px solid black; font-size: 8pt">
					<table style="width: 100%">
						<tr>
							<td colspan="2" style="padding-left: 10px">SANITARY ENGINEER/MASTER PLUMBER<br>IN CHARGE OF INSTALLATION</td>
							<td style="border-left: 1px solid black;">PRC REG NO.<br><div class="div_placeholder"><!--PRC REG NO.--></div></td>
						</tr>
						<tr style="border-top: 1px solid black;">
							<td colspan="3" style="padding-left: 10px">PRINT NAME <div class="div_placeholder"><!-- PRINT NAME --></div></td>
						</tr>
						<tr style="border-top: 1px solid black;">
							<td colspan="3" style="padding-left: 10px">ADDRESS <div class="div_placeholder"><!-- ADDRESS --></div></td>
						</tr>
						<tr style="border-top: 1px solid black;">
							<td style="padding-left: 10px">PTR. No.<br/><div class="div_placeholder"><!-- PTR. No. --></div></td>
							<td style="border-left: 1px solid black;">DATE ISSUED<br/><div class="div_placeholder"><!-- DATE ISSUED --></div></td>
							<td style="border-left: 1px solid black;">PLACE ISSUED<br/><div class="div_placeholder"><!-- PLACE ISSUED --></div></td>
						</tr>
						<tr style="border-top: 1px solid black;">
							<td colspan="2" style="padding-left: 10px">SIGNATURE<br/><div class="div_placeholder"><!-- SIGNATURE --></div></td>
							<td style="border-left: 1px solid black;">TAN<br/><div class="div_placeholder"><!-- TAN --></div></td>
						</tr>
					</table>
				</div>
			</div>
		</div>

	</div>

	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
</body>
</html>