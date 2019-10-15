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
	<title>Electronics Permit</title>
	<link rel="icon" href="../images/logo_img.png">
	<link rel="stylesheet" href="../css/w3.css">
	<style type="text/css">
		body{
			font-family: "Arial", sans-serif;
			font-size: 9pt;
			margin: 100px;
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
		.box_numbers{
			padding:  3px;
			font-weight: bold;
			font-size: 9pt;
		}
		.div_checkbox_filled{
			background: black;
		}
		.tbl_header td, .div_checkbox{
			width: 14pt;
			height: 16pt;
		}
		.bordered, .tbl_header #boxes td, .div_checkbox{
			 border: 1px solid black;
		}
		.div_placeholder{
			height: 12pt;
		}
		.div_placeholder_2{
			height: 10pt;
		}
		.div_placeholder_underlined{
			border-bottom: 1px solid black;
			display: inline;
		}
		.tbl_header{
			display: inline-table;
		}
		.form_label{
			font-size: 8pt;
			padding-left: 5px;
		}
		.tbl_box2{
			padding: 5px!important;
		}
		#cont_chkbox tr{
			padding: 10px; 
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
		<div style="font-size: 8pt">NBC FORM NO. A-07</div>
		<div class="bordered" style="width: 100px; height: 90px; position: absolute; font-size: 8pt; padding: 5px 10px">
			ELECTRONIC<br>FIRE ALARM<br>SYSTEM
		</div>
		<div class="w3-center text_bold">Republic of the Philippines</div>
		<div class="w3-center">City Municipality of <span>__________________</span></div>
		<div class="w3-center">Province of <span>________________________</span></div>		
		<div class="w3-center text_bold" style="font-size: 14pt">OFFICE OF THE BUILDING OFFICIAL</div>
		<div class="w3-center text_bold" style="font-size: 18pt">ELECTRONICS PERMIT</div>
		<div class="w3-row">
			<div class="w3-col l4 m4 s4">
				<table class="tbl_header">
					<tr>
						<td colspan="10">APPLICATION NO.</td>
					</tr>
					<tr id="boxes">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
			<div class="w3-col l4 m4 s4 w3-center">
				<table class="tbl_header">
					<tr>
						<td colspan="9">ELP NO.</td>
					</tr>
					<tr id="boxes">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
			<div class="w3-col l4 m4 s4 w3-right-align">
				<table class="tbl_header">
					<tr>
						<td colspan="9">BUILDING PERMIT NO.</td>
					</tr>
					<tr id="boxes">
						<td></td>
						<td></td>
						<td></td>
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
		<div class="box_numbers" style="margin-top: 7px">BOX 1. (TO BE ACCOMPLISHED BY THE OWNER/APPLICANT)</div>
		<table style="width: 100%">
			<tr class="bordered">
				<td colspan="4" style="width: 30%">
					<div class="w3-row">
						<div class="w3-col l3 m3 s3 form_label">OWNER/APPLICANT <div class="div_placeholder"></div></div>
						<div class="w3-col l4 m4 s4 form_label w3-center">LAST NAME <div class="div_placeholder"><!--INSERT LN--><strong><?php echo $applicant_info['lname']; ?></strong></div></div>
						<div class="w3-col l4 m4 s4 form_label w3-center">FIRST NAME NAME <div class="div_placeholder"><!--INSERT FN--><strong><?php echo $applicant_info['fname']; ?></strong></div></div>
						<div class="w3-col l1 m1 s1 form_label w3-center">MI <div class="div_placeholder"><!--INSERT MI--><strong><?php echo $applicant_info['mi']; ?></strong></div></div>
					</div>
				</td>
				<td width="20%" class="bordered form_label">TIN <div class="div_placeholder"><!--INSERT TIN--></div></td>
			</tr>
			<tr>
				<td class="form_label bordered" width="35%">FOR CONSTRUCTION OWNED <div>BY ENTEPRISE</div></td>
				<td class="form_label bordered" width="30%">FORM OF OWNERSHIP <div class="div_placeholder"><!--INSERT FORM OF OWNERSHIP--></div></td>
				<td colspan="3" class="bordered form_label text_bold" width="35%">USE OR CHARACTER OF OCCUPANCY<div class="div_placeholder"><!--INSERT USE OR TYPE--></div></td>
			</tr>
			<tr class="bordered">
				<td colspan="3" style="width: 30%">
					<div class="w3-row">
						<div class="w3-col l2 m2 s2 form_label">ADDRESS:<div class="div_placeholder"></div></div>
						<div class="w3-col l1 m1 s1 form_label">NO., <div class="div_placeholder"><!--INSERT NO.--><strong><?php echo $applicant_info['add_no']; ?></strong></div></div>
						<div class="w3-col l2 m2 s2 form_label">STREET, <div class="div_placeholder"><!--INSERT STREET--><strong><?php echo $applicant_info['street']; ?></strong></div></div>
						<div class="w3-col l2 m2 s2 form_label">BARANGAY,<div class="div_placeholder"><!--INSERT STREET--><strong><?php echo $applicant_info['barangay']; ?></strong></div></div>
						<div class="w3-col l3 m3 s3 form_label">CITY/MUNICIPALITY <div class="div_placeholder"><!--INSERT CITY/MUNI--><strong><?php echo $applicant_info['municipality']; ?></strong></div></div>
						<div class="w3-col l2 m2 s2 form_label">ZIP CODE <div class="div_placeholder"><!--INSERT ZIPCODE--><strong><?php echo $applicant_info['zip_code']; ?></strong></div></div>
					</div>
				</td>
				<td colspan="2" class="bordered form_label" width="25%">TELEPHONE NO <div class="div_placeholder"><strong><?php echo $applicant_info['tel_no']; ?></strong></div></td>
			</tr>
			<tr>
				<td colspan="5" class="bordered" style="padding-right: 5px; padding-bottom: 5px;">
					<div class="w3-row form_label">
						<div class="w3-col l3 m3 s3">
							LOCATION OF CONSTRUCTION
						</div>
						<div class="w3-col l2 m2 s2">
							<div class="w3-row">
								<div class="w3-col" style="width: 50px;">
									LOT NO.
								</div>
								<div class="w3-rest w3-border-bottom">
									<div class="div_placeholder"><!--INSERT LOT NO.--></div>
								</div>
							</div>
						</div>
						<div class="w3-col l2 m2 s2">
							<div class="w3-row">
								<div class="w3-col" style="width: 45px;">
									BLK NO.
								</div>
								<div class="w3-rest w3-border-bottom">
									<div class="div_placeholder"><!--INSERT BLK NO.--></div>
								</div>
							</div>
						</div>
						<div class="w3-col l2 m2 s2">
							<div class="w3-row">
								<div class="w3-col" style="width: 50px;">
									TCT NO.
								</div>
								<div class="w3-rest w3-border-bottom">
									<div class="div_placeholder"><!--INSERT TCT NO.--></div>
								</div>
							</div>
						</div>
						<div class="w3-col l3 m3 s3">
							<div class="w3-row">
								<div class="w3-col" style="width: 75px;">
									TAX DEC. NO.
								</div>
								<div class="w3-rest w3-border-bottom">
									<div class="div_placeholder"><!--INSERT TAX DEC NO.--></div>
								</div>
							</div>
						</div>
					</div>
					<div class="w3-row form_label">
						<div class="w3-col l3 m3 s3">
							<div class="w3-row">
								<div class="w3-col" style="width: 45px;">
									STREET
								</div>
								<div class="w3-rest w3-border-bottom">
									<div class="div_placeholder"><!--INSERT STREET--></div>
								</div>
							</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div class="w3-row">
								<div class="w3-col" style="width: 60px;">
									BARANGAY
								</div>
								<div class="w3-rest w3-border-bottom">
									<div class="div_placeholder"><!--INSERT BARANGAY--></div>
								</div>
							</div>
						</div>
						<div class="w3-col l5 m5 s5">
							<div class="w3-row">
								<div class="w3-col" style="width: 120px;">
									CITY/MUNICIPALITY OF
								</div>
								<div class="w3-rest w3-border-bottom">
									<div class="div_placeholder"><!--INSERT TAX DEC NO.--></div>
								</div>
							</div>
						</div>
						<div class="w3-col l1 m1 s1"></div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="5" class="bordered" style="padding-bottom: 5px">
					<div class="text_bold form_label">SCOPE OF WORK</div>
					<div class="w3-row form_label" style="margin: 0px 10px;">
						<div class="w3-col l4 m4 s4">
							<div>&#x2610;<!--change to &#x2612; when ticked--> NEW INSTALLATION</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div>&#x2610;<!--change to &#x2612; when ticked--> ANNUAL INSPECTION</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div class="w3-row"> 
								<div class="w3-col" style="width: 110px;">
									&#x2610;<!--change to &#x2612; when ticked--> OTHERS (Specify)
								</div>
								<div class="w3-rest w3-border-bottom">
									<div class="div_placeholder"><!--INSERT SPECIFIED--></div>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
		</table>

		<div class="box_numbers">BOX 2 (TO BE ACCOMPLISHED BY THE DESIGN PROFESSIONAL)</div>
		<table class="bordered tbl_box2" id="cont_chkbox" style="width: 100%; padding: 20px">
			<tr>
				<td colspan="3"><div class="text_bold form_label">NATURE OF INSTALLATION WORKS/EQUIPMENT SYSTEM:</div></td>
			</tr>
			<tr style="margin: 10px">
				<td width="33.33%" style="padding-left: 5px"><div>&#x2610;<!--change to &#x2612; when ticked--> TELECOMMUNICATION SYSTEM</div></td>
				<td width="33.33%"><div>&#x2610;<!--change to &#x2612; when ticked--> ELECTRONICS FIRE ALARM SYSTEM</div></td>
				<td width="33.33%" rowspan="5">
					<div>&#x2610;<!--change to &#x2612; when ticked--> ELECTRONICS COMPUTERIZED PROCESS CONTROLS AUTOMATION SYSTEM</div>
					<div>&#x2610;<!--change to &#x2612; when ticked--> BUILDING AUTOMATION MANAGEMENT AND CONTROL SYSTEM</div>
					<div>&#x2610;<!--change to &#x2612; when ticked--> BUILDING WIRING UTILIZING COPPER CABLE, FIBER OPTIC CABLE OR OTHER MEDIAL ELECTRONICS SYSTEM</div>
				</td>
			</tr>
			<tr>
				<td style="padding-left: 5px"><div>&#x2610;<!--change to &#x2612; when ticked--> BROADCASTING SYSTEM</div></td>
				<td><div>&#x2610;<!--change to &#x2612; when ticked--> SOUND COMMUNICATION SYSTEM</div></td>
			</tr>
			<tr>
				<td style="padding-left: 5px"><div>&#x2610;<!--change to &#x2612; when ticked--> TELEVISION SYSTEM</div></td>
				<td><div>&#x2610;<!--change to &#x2612; when ticked--> CENTRALIZED CLOCK SYSTEM</div></td>
			</tr>
			<tr>
				<td style="padding-left: 5px"><div>&#x2610;<!--change to &#x2612; when ticked--> INFORMATION TECHNOLOGY SYSTEM</div></td>
				<td><div>&#x2610;<!--change to &#x2612; when ticked--> SOUND SYSTEM</div></td>
			</tr>
			<tr>
				<td style="padding-left: 5px"><div>&#x2610;<!--change to &#x2612; when ticked--> SECURITY AND ALARM SYSTEM </div></td>
				<td><div>&#x2610;<!--change to &#x2612; when ticked--> ELECTRONICS CONTROL AND CONVEYOR SYSTEM</div></td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 0px 5px">
					<div class="w3-row">
						<div class="w3-col" style="width: 85%;">
							&#x2610;<!--change to &#x2612; when ticked--> ANY OTHER ELECTRONICS AND I.T. SYSTEMS, EQUIPMENT, DEVICE AND/OR COMPONENT (Specify)
						</div>
						<div class="w3-rest w3-border-bottom">
							<div class="div_placeholder"><!--INSERT SPECIFIED--></div>
						</div>
					</div>
				</td>
			</tr>
			<tr class="bordered">
				<td colspan="3" style="padding: 5px 20px">
					<div class="w3-row">
						<div class="w3-col" style="width: 100px">
							PREPARED BY
						</div>
						<div class="w3-rest w3-border-bottom">
							<div class="div_placeholder"><!--INSERT PREPARED BY--></div>
						</div>
					</div>
				</td>
			</tr>
		</table>

		<div class="w3-row">
			<div class="w3-col l6 m6 s6">
				<div class="text_bold form_label">BOX 3</div>
				<table style="width: 100%">
					<tr class="bordered">
						<td colspan="2" class="text_bold form_label">DESIGN PROFESSIONAL PLANS & SPECIFICATIONS<br></td>
					</tr>
					<tr class="bordered">
						<td colspan="2">
							<div class="w3-row" style="padding: 0px 10px; padding-top: 30px;">
								<div class="w3-col l8 m8 s8 w3-border-bottom w3-center">
									<div class="div_placeholder"><!--AGRICULTURAL ENGINEER NAME--></div>
								</div>
								<div class="w3-col l1 m1 s1">Date</div>
								<div class="w3-col l3 m3 s3 w3-border-bottom w3-center">
									<div class="div_placeholder"><!--DATE--></div>
								</div>
							</div>
							<div class="w3-row">
								<div class="w3-col l8 m8 s8 w3-center">
									<div class="w3-center form_label text_bold">PROFESSIONAL ELECTRONICS ENGINEER</div>
								</div>
							</div>
							<div class="w3-row">
								<div class="w3-col l8 m8 s8 w3-center">
									<div class="w3-center form_label">Signed and Sealed Over Printed Name</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="bordered form_label">Address</td>
					</tr>
					<tr>
						<td class="bordered form_label">PRC No.</td>
						<td class="bordered form_label">Validity</td>
					</tr>
					<tr>
						<td class="bordered form_label">PTR No.</td>
						<td class="bordered form_label">Date Issued</td>
					</tr>
					<tr>
						<td class="bordered form_label">Issued at</td>
						<td class="bordered form_label">TIN</td>
					</tr>
				</table>
			</div>
			<div class="w3-col l6 m6 s6" style="padding-left: 7px;">
				<div class="text_bold form_label">BOX 4</div>
				<table style="width: 100%;">
					<tr class="bordered">
						<td colspan="2" class="form_label text_bold">SUPERVISOR/IN-CHARGE OF ELECTRONICS WORKS</td>
					</tr>
					<tr class="bordered">
						<td colspan="2">
							<div class="w3-row" style="padding: 0px 10px; padding-top: 30px;">
								<div class="w3-col l8 m8 s8 w3-border-bottom w3-center">
									<div class="div_placeholder"><!--AGRICULTURAL ENGINEER NAME--></div>
								</div>
								<div class="w3-col l1 m1 s1">Date</div>
								<div class="w3-col l3 m3 s3 w3-border-bottom w3-center">
									<div class="div_placeholder"><!--DATE--></div>
								</div>
							</div>
							<div class="w3-row">
								<div class="w3-col l8 m8 s8 w3-center">
									<div class="w3-center form_label text_bold">PROFESSIONAL ELECTRONICS ENGINEER</div>
								</div>
							</div>
							<div class="w3-row">
								<div class="w3-col l8 m8 s8 w3-center">
									<div class="w3-center form_label">Signed and Sealed Over Printed Name</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="bordered form_label">Address</td>
					</tr>
					<tr>
						<td class="bordered form_label">PRC No.</td>
						<td class="bordered form_label">Validity</td>
					</tr>
					<tr>
						<td class="bordered form_label">PTR No.</td>
						<td class="bordered form_label">Date Issued</td>
					</tr>
					<tr>
						<td class="bordered form_label">Issued at</td>
						<td class="bordered form_label">TIN</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="w3-row" style="page-break-after: always">
			<div class="w3-col l6 m6 s6">
				<div class="text_bold form_label">BOX 5</div>
				<table style="width: 100%">
					<tr>
						<td colspan="3" class="form_label text_bold">BUILDING OWNER</td>
					</tr>
					<tr class="bordered">
						<td colspan="3">
							<div class="w3-row" style="padding-top: 30px;">
								<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
								<div class="w3-col l8 m8 s8 w3-border-bottom w3-center">
									<div class="div_placeholder"><!--BUILDING OWNER NAME--></div>
								</div>
								<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
							</div>
							<div class="w3-center form_label">(Signature Over Printed Name)</div>
							<div class="w3-center form_label">Date <div class="div_placeholder_underlined"></div></div>
						</td>
					</tr>
					<tr>
						<td colspan="3" class="bordered form_label">Address <div class="div_placeholder_underlined"></div></td>
					</tr>
					<tr>
						<td class="bordered form_label">C.T.C. No. <div class="div_placeholder"></div></td>
						<td class="bordered form_label">Date Issued <div class="div_placeholder"></div></td>
						<td class="bordered form_label">Place Issued <div class="div_placeholder"></div></td>
					</tr>
				</table>
			</div>
			<div class="w3-col l6 m6 s6" style="padding-left: 7px;">
				<div class="text_bold form_label">BOX 6</div>
				<table style="width: 100%;">
					<tr>
						<td colspan="3" class="form_label">WITH MY CONSENT : <span class="text_bold">LOT OWNER</span></td>
					</tr>
					<tr class="bordered">
						<td colspan="3">
							<div class="w3-row" style="padding-top: 30px;">
								<div class="w3-col l3 m3 s3"><div class="div_placeholder"></div></div>
								<div class="w3-col l6 m6 s6 w3-border-bottom w3-center">
									<div class="div_placeholder"><!--LOT OWNER NAME--></div>
								</div>
								<div class="w3-col l3 m3 s3"><div class="div_placeholder"></div></div>
							</div>
							<div class="w3-center form_label">(Signature Over Printed Name)</div>
							<div class="w3-center form_label">Date <div class="div_placeholder_underlined"></div></div>
						</td>
					</tr>
					<tr>
						<td colspan="3" class="bordered form_label">Address <div class="div_placeholder_underlined"></div></td>
					</tr>
					<tr>
						<td class="bordered form_label">C.T.C. No. <div class="div_placeholder"></div></td>
						<td class="bordered form_label">Date Issued <div class="div_placeholder"></div></td>
						<td class="bordered form_label">Place Issued <div class="div_placeholder"></div></td>
					</tr>
				</table>
			</div>
		</div>

		<!--PAGE BREAK!-->

		<div class="text_bold">BOX 7</div>
		<table style="width: 100%">
			<tr>
				<td class="bordered" style="padding: 5px">RECEIVED BY</td>
				<td class="bordered" style="padding: 5px">DATE</td>
			</tr>
			<tr>
				<td class="bordered" colspan="2">
					<div style="padding: 0px 20px; padding-bottom: 20px;">
						<div class="text_bold w3-center">FIVE (5) SETS OF ELECTRONICS DOCUMENTS</div>
						<div class="w3-row" style="padding-left: 10px">
							<div class="w3-col l7 m7 s7">
								<div>&#x2610;<!--change to &#x2612; when ticked--> ELETRONICS PLAN AND SPECIFICATIONS</div>
							</div>
							<div class="w3-col l5 m5 s5">
								<div>&#x2610;<!--change to &#x2612; when ticked--> COST ESTIMATES</div>
							</div>
						</div>
						<div class="w3-row" style="padding-left: 10px">
							<div class="w3-col l7 m7 s7">
								<div>&#x2610;<!--change to &#x2612; when ticked--> BILL OF MATERIALS</div>
							</div>
							<div class="w3-col l5 m5 s5">
								<div>&#x2610;<!--change to &#x2612; when ticked--> OTHERS (Specify)</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
		</table>
		

		<div class="text_bold">BOX 8</div>
		<table style="width: 100%">
			<tr>
				<td class="bordered w3-center text_bold" colspan="6">PROGRESS FLOW</td>
			</tr>
			<tr>
				<td class="bordered" rowspan="2"></td>
				<td class="bordered w3-center" colspan="2">IN</td>
				<td class="bordered w3-center" colspan="2">OUT</td>
				<td class="bordered w3-center" rowspan="2">PROCESSED BY</td>
			</tr>
			<tr>
				<td class="bordered w3-center">DATE</td>
				<td class="bordered w3-center">TIME</td>
				<td class="bordered w3-center">DATE</td>
				<td class="bordered w3-center">TIME</td>
			</tr>
			<tr>
				<td class="bordered" style="padding-left: 10px">ELECTRONICS</td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
			</tr>
			<tr>
				<td class="bordered" style="padding-left: 10px">OTHERS (Specify)</td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
			</tr>
			<tr>
				<td class="bordered"style="padding-left: 10px"><div class="div_placeholder"></div></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
			</tr>
			<tr>
				<td class="bordered"style="padding-left: 10px"><div class="div_placeholder"></div></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
			</tr>
		</table>

		<div class="text_bold">BOX 8</div>
		<div class="bordered" style="padding: 10px 5px">
			<div class="text_bold">ACTION TAKEN:</div>
			<p class="text_bold">PERMIT IS HEREBY ISSUED SUBJECT TO THE FOLLOWING</p>
			<ol type="1" style="margin: 0px!important">
				<li>That the proposed electronics works shall be in accordance with the electronics plans filed with this Office and in conformity with the latest Electronics Code of the Philippines, the National Building Code and its IRR.</li>
				<li>That prior to any commencement of agricultural engineering works, a duly accomplished prescribed <span class="text_bold">Notice of Construction"</span> shall be submitted to the Office of the Building Official.</li>
				<li>That upon completion of the electronics works, the licensed supervisor/in-charge shall submit the entry to the logbook duly signed and sealed to the building official including as-built plans and other documents and shall also accomplish the Certificate of Completion stating that the electronics works conform to the provisions of the Electronic Code of the Philippines, the National Building Code and its IRR.</li>
				<li>That this permit is null and void unless acocmpanied by the building permit.</li>
			</ol>
			<div style="height: 150px"></div>
			<p class="text_bold">PERMIT ISSUED BY:</p>
			<div style="height: 100px"></div>
			<div class="w3-row">
				<div class="w3-col l4 m4 s4"><div class="div_placeholder"></div></div>
				<div class="w3-col l4 m4 s4 w3-border-bottom w3-center">
					<div class="div_placeholder"><!--AGRICULTURAL ENGR. NAME--></div>
				</div>
				<div class="w3-col l4 m4 s4"><div class="div_placeholder"></div></div>
			</div>
			<div class="w3-center text_bold">BUILDING OFFICIAL</div>
			<div class="w3-center">(Signature Over Printed Name)</div>
			<div class="w3-center">Date <div class="div_placeholder_underlined"></div></div>
		</div>
	</div>
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
</body>
</html>