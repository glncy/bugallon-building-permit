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
	<title>Electrical Permit</title>
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
		.div_checkbox_filled{
			background: black;
		}
		.tbl_header td, .div_checkbox{
			width: 10pt;
			height: 10pt;
			display: inline-flex;
		}
		.bordered, .tbl_header td, .div_checkbox{
			 border: 1px solid black;
		}
		.div_placeholder{
			height: 14pt;
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
			font-size: 9pt;
			padding-left: 5px;
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
		<div>FORM NO. 96-001-E</div>
		<div class="w3-center">OFFICE OF THE LOCAL BUILDING OFFICIAL</div>
		<br>
		<div class="w3-center"><span>___________________</span></div>
		<div class="w3-center">CITY/MUNICIPALITY</div>		
		<div class="w3-row">
			<div class="w3-col l4 m4 s4">
				APPLICATION NO.
			</div>
			<div class="w3-col l4 m4 s4 w3-center">
				AREA CODE <span>______</span>
			</div>
			<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			<div class="w3-col l3 m3 s3">
				DATE OF APPLICATION
			</div>
		</div>
		<div class="w3-row">
			<div class="w3-col l4 m4 s4">
				<div class="bordered" style="width: 80%"><div class="div_placeholder"><!--APPLICATION NO.--></div></div>
			</div>
			<div class="w3-col l4 m4 s4 w3-center"><div class="div_placeholder"></div></div>
			<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			<div class="w3-col l3 m3 s3 w3-center">
				<div class="bordered"><div class="div_placeholder"><!--DATE OF APPLICATION--></div></div>
			</div>
		</div>
		<div class="w3-row">
			<div class="w3-col l3 m3 s3 w3-border-bottom w3-center">
				<div class="div_placeholder"><!--DATE OF PROPOSED INSTALLATION.--></div>
			</div>
			<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			<div class="w3-col l4 m4 s4 w3-center"><div class="div_placeholder"></div></div>
			<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			<div class="w3-col l3 m3 s3 w3-center w3-border-bottom">
				<div class="div_placeholder"><!--EXPECTED DATE OF COMPLETION--></div>
			</div>
		</div>
		<div class="w3-row">
			<div class="w3-col l4 m4 s4">Date of proposed of Installation</div>
			<div class="w3-col l4 m4 s4 w3-center"><div class="div_placeholder"></div></div>
			<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			<div class="w3-col l3 m3 s3 w3-center">Expected Date of Completion</div>
		</div>
		<div class="w3-center text_bold" style="font-size: 12pt;">APPLICATION FOR ELECTRICAL PERMIT</div>
		<div class="w3-center" style="font-size: 12pt;">(Accomplished in print and in duplicate)</div>
		<div class="box_numbers">BOX 1. (TO BE ACCOMPLISHED BY A DULY QUALIFIED ELECTRICAL PRACTITIONER)</div>
		<table style="width: 100%">
			<tr class="bordered">
				<td style="width: 30%">
					<div class="w3-row">
						<div class="w3-col l7 m7 s7 form_label">OWNER/APPLICANT:</div>
						<div class="w3-col l5 m5 s5 form_label">LAST NAME<div class="div_placeholder"><!--last name--><strong><?php echo $applicant_info['lname']; ?></strong></div></div>
					</div>
					
				</td>
				<td class="w3-center form_label">FIRST NAME<div class="div_placeholder"><!--first name--><strong><?php echo $applicant_info['fname']; ?></strong></div></td>
				<td class="w3-center form_label">MIDDLE NAME<div class="div_placeholder"><!--mi--><strong><?php echo $applicant_info['mi']; ?></strong></div></td>
				<td width="20%" class="bordered form_label w3-center">TIN <div class="div_placeholder"><!--TIN--><strong><?php echo $applicant_info['tin']; ?></strong></div></td>
			</tr>
			<tr>
				<td colspan="3" class="bordered">
					<div class="w3-row">
						<div class="w3-col l2 m2 s2 form_label">ADDRESS:</div>
						<div class="w3-col l1 m1 s1 form_label">NO.<div class="div_placeholder_2"><!--address no.--><strong><?php echo $applicant_info['add_no']; ?></strong></div></div>
						<div class="w3-col l2 m2 s2 form_label">STREET<div class="div_placeholder_2"><!--address street--><strong><?php echo $applicant_info['street']; ?></strong></div></div>
						<div class="w3-col l3 m3 s3 form_label">BARANGAY<div class="div_placeholder_2"><!--address brgy--><strong><?php echo $applicant_info['barangay']; ?></strong></div></div>
						<div class="w3-col l4 m4 s4 form_label">CITY/MUNICIPALITY<div class="div_placeholder_2"><!--city/municipality--><strong><?php echo $applicant_info['municipality']; ?></strong></div></div>
					</div>
				</td>
				<td class="bordered form_label w3-center">TEL./FAX NO.<div class="div_placeholder"><!--tel. no.--><strong><?php echo $applicant_info['tel_no']; ?></strong></div></td>
			</tr>
			<tr>
				<td colspan="4" class="bordered">
					<div class="w3-row form_label">
						<div class="w3-col l3 m3 s3">LOCATION OF INSTALLATION:</div>
						<div class="w3-col l1 m1 s1">
							NO. <div class="div_placeholder"><!--no.--></div>
						</div>
						<div class="w3-col l2 m2 s2">
							STREET <div class="div_placeholder"><!--street--></div>
						</div>
						<div class="w3-col l3 m3 s3">
							BARANGAY <div class="div_placeholder"><!--brgy--></div>
						</div>
						<div class="w3-col l3 m3 s3">
							CITY/MUNICIPALITY <div class="div_placeholder"><!--city/municipality--></div>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="4" class="bordered" style="padding: 2px 5px;">
					<div class="w3-row">
						<div class="w3-col l4 m4 s4">
							<div class="form_label">SCOPE OF WORK</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div class="w3-row">
								<div class="w3-col l5 m5 s5 form_label">
									<div>&#x2610;<!--change to &#x2612; when ticked--> ADDITION OF</div>
								</div>
								<div class="w3-col l6 m6 s6 w3-border-bottom">
									<div class="div_placeholder"></div>
								</div>
							</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div>&#x2610;<!--change to &#x2612; when ticked--> OTHERS (SPECIFY)</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l4 m4 s4 form_label">
							<div>&#x2610;<!--change to &#x2612; when ticked-->NEW INSTALLATION</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div class="w3-row">
								<div class="w3-col l5 m5 s5 form_label">
									<div>&#x2610;<!--change to &#x2612; when ticked--> REPAIR OF</div>
								</div>
								<div class="w3-col l6 m6 s6 w3-border-bottom">
									<div class="div_placeholder"></div>
								</div>
							</div>
						</div>
						<div class="w3-col l4 m4 s4 w3-border-bottom">
							<div class="div_placeholder"></div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l4 m4 s4 form_label">
							<div>&#x2610;<!--change to &#x2612; when ticked-->ANNUAL INSPECTION</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div class="w3-row">
								<div class="w3-col l5 m5 s5 form_label">
									<div>&#x2610;<!--change to &#x2612; when ticked--> REMOVAL OF</div>
								</div>
								<div class="w3-col l6 m6 s6 w3-border-bottom">
									<div class="div_placeholder"></div>
								</div>
							</div>
						</div>
						<div class="w3-col l4 m4 s4 w3-border-bottom">
							<div class="div_placeholder"></div>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="4" class="bordered" style="padding: 2px 5px;">
					<div class="form_label">TYPE OF OCCUPANCY OR USE</div>
					<div class="w3-row">
						<div class="w3-col l4 m4 s4 form_label" style="padding-left: 5px">
							<div>&#x2610;<!--change to &#x2612; when ticked--> A. RESIDENTIAL DWELLING</div>
						</div>
						<div class="w3-col l4 m4 s4 form_label">
							<div>&#x2610;<!--change to &#x2612; when ticked--> E. BUSINESS & MERCANTILE</div>
						</div>
						<div class="w3-col l4 m4 s4 form_label">
							<div>&#x2610;<!--change to &#x2612; when ticked--> <span style="font-size: 7pt">I. ASSEMBLY OCCUPANT LOAD 1000 OR MORE</span></div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l4 m4 s4 form_label" style="padding-left: 5px">
							<div>&#x2610;<!--change to &#x2612; when ticked--> B. RESIDENTIAL HOTEL, APARTMENT</div>
						</div>
						<div class="w3-col l4 m4 s4 form_label">
							<div>&#x2610;<!--change to &#x2612; when ticked--> F. INDUSTRIAL</div>
						</div>
						<div class="w3-col l4 m4 s4 form_label">
							<div>&#x2610;<!--change to &#x2612; when ticked--> J. ACCESSORY</span></div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l4 m4 s4 form_label" style="padding-left: 5px">
							<div>&#x2610;<!--change to &#x2612; when ticked--> C.EDUCATION & RECREATION</div>
						</div>
						<div class="w3-col l4 m4 s4 form_label">
							<div>&#x2610;<!--change to &#x2612; when ticked--> G. STORAGE & HAZARDOUS</div>
						</div>
						<div class="w3-col l4 m4 s4 form_label">
							<div class="w3-row" >
								<div class="w3-col l7 m7 s7">
									<div>&#x2610;<!--change to &#x2612; when ticked--> OTHERS (SPECIFY)</div>
								</div>
								<div class="w3-col l5 m5 s5 w3-border-bottom">
									<div class="div_placeholder"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l4 m4 s4 form_label" style="padding-left: 5px">
							<div>&#x2610;<!--change to &#x2612; when ticked--> D. INSTITUTIONAL</div>
						</div>
						<div class="w3-col l8 m8 s8 form_label">
							<div>&#x2610;<!--change to &#x2612; when ticked--> H. ASSEMBLY OTHER THAN GROUP 1</div>
						</div>
					</div>
				</td>
			</tr>
			<tr style="font-size: 8pt;">
				<td colspan="2" class="bordered" style="padding: 2px 5px">
					<div>NO. OF OUTLETS</div>
					<div class="w3-row">
						<div class="w3-col l7 m7 s7" style="padding-left: 30px">
							<span>___</span> LIGHTS
						</div>
						<div class="w3-col l5 m5 s5">
							<span>___</span> SPO, COOKING UNIT
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l7 m7 s7" style="padding-left: 30px">
							<span>___</span> CONVENIENCE/RECEPTACLE
						</div>
						<div class="w3-col l5 m5 s5">
							<span>___</span> SPO, WATER HEATER
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l7 m7 s7" style="padding-left: 30px">
							<span>___</span> SPO, AIRCON
						</div>
						<div class="w3-col l5 m5 s5">
							<span>___</span> SPO, WATER PUMP
						</div>
					</div>
				</td>
				<td colspan="2" class="bordered" style="padding: 2px 5px">
					<div>NUMBER OF EQUIPMENT/WIRING DEVICES</div>
					<div class="w3-row">
						<div class="w3-col l7 m7 s7" style="padding-left: 50px">
							<span>___</span> TOGGLE SWITCH
						</div>
						<div class="w3-col l5 m5 s5">
							<span>___</span> FA DETECTORS
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l7 m7 s7" style="padding-left: 50px">
							<span>___</span> BELLS/BUZZERS
						</div>
						<div class="w3-col l5 m5 s5">
							<span>___</span> OTHERS
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l7 m7 s7" style="padding-left: 50px">
							<span>___</span> PUSH BUTTON
						</div>
						<div class="w3-col l5 m5 s5">
							(See Attachment List)
						</div>
					</div>
				</td>
			</tr>
		</table>

		<div class="box_numbers">BOX 2 (PROFESSIONAL ELECTRICAL ENGINEER WHO SIGNED AND SEALED PLANS & SPECIFICATIONS)</div>
		<table class="bordered" style="width: 100%">
			<tr>
				<td class="bordered form_label">
					NAME
				</td>
				<td class="bordered form_label">
					<div class="div_placeholder"><!--NAME--></div>	
				</td>
				<td class="bordered form_label" width="33.33%">
					<div class="w3-row">
						<div class="w3-col l7 m7 s7">
							PRC REG NO. <span><!--PRC--></span>
						</div>
						<div class="w3-col l5 m5 s5">
							VALIDITY <span><!--VALIDITY--></span>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="bordered form_label">
					ADDRESS
				</td>
				<td class="bordered form_label">
					<div class="div_placeholder"><!--ADDRESS--></div>	
				</td>
				<td class="bordered form_label">
					TEL/FAX NO. <span><!--TEL NO.--></span>
				</td>
			</tr>
			<tr>
				<td class="bordered form_label">
					PTR NO. <span><!--PTR NO.--></span>
				</td>
				<td class="bordered form_label">
					DATE SIGNED <span><!--DATE SIGNED--></span>
				</td>
				<td class="bordered form_label">
					PLACE ISSUED <span><!--PLACE ISSUED--></span>
				</td>
			</tr>
			<tr>
				<td class="bordered form_label">
					SIGNATURE
				</td>
				<td class="bordered form_label">
					DATE SIGNED <span><!--DATE SIGNED--></span>
				</td>
				<td class="bordered form_label">
					TIN <span><!--TIN--></span>
				</td>
			</tr>
		</table>

		<div class="box_numbers">BOX 3 (ELECTRICAL CONTRACTOR-200 AMPERE MAIN & ABOVE)</div>
		<table style="width: 100%">
			<tr>
				<td class="bordered form_label" width="50%">
					NAME
					<div class="div_placeholder"><!--NAME--></div>
				</td>
				<td class="bordered" colspan="2">
					<div class="w3-row">
						<div class="w3-col l6 m6 s6 form_label">
							<div>PCAB LIC. NO. <span><!--lic no.--></span></div>
						</div>
						<div class="w3-col l6 m6 s6">(SPECIALTY ELECTRICAL)</div>
						<div class="w3-col l12 m12 s12 form_label">VALIDITY <span><!--validity--></span></div>
					</div>
				</td>
			</tr>
			<tr class="bordered">
				<td class="form_label" width="50%">
					ADDRESS <span><!--ADDRESS--></span>
				</td>
				<td width="20%">
					<div class="div_placeholder"></div>
				</td>
				<td class="bordered form_label">
					TEL/FAX NO. <span><!--TEL NO.--></span>
				</td>
			</tr>
		</table>

		<div class="box_numbers">BOX 4 (PERSON IN-CHARGE OF INSTALLATION)</div>
		<table class="bordered" style="width: 100%">
			<tr>
				<td class="bordered" style="font-size: 8pt; width: 32%">
					<div>&#x2610;<!--change to &#x2612; when ticked--> PROFESSIONAL ELECTRICAL ENGINEER</div>
				</td>
				<td class="bordered" style="font-size: 8pt; width: 33.33%">
					<div>&#x2610;<!--change to &#x2612; when ticked--> REGISTERED ELECTRICAL ENGINEER</div>
				</td>
				<td class="bordered" style="font-size: 8pt; width: 33.33%">
					<div>&#x2610;<!--change to &#x2612; when ticked--> REGISTERED MASTER ELECTRICIAN (not exceeding 600 Volts & 500kVA)	</div>
				</td>
			</tr>
			<tr>
				<td class="bordered form_label">
					NAME
				</td>
				<td class="bordered form_label">
					<div class="div_placeholder"><!--NAME--></div>	
				</td>
				<td class="bordered form_label" width="33.33%">
					<div class="w3-row">
						<div class="w3-col l7 m7 s7">
							PRC REG NO. <span><!--PRC--></span>
						</div>
						<div class="w3-col l5 m5 s5">
							VALIDITY <span><!--VALIDITY--></span>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="bordered form_label">
					ADDRESS
				</td>
				<td class="bordered form_label">
					<div class="div_placeholder"><!--ADDRESS--></div>	
				</td>
				<td class="bordered form_label">
					TEL/FAX NO. <span><!--TEL NO.--></span>
				</td>
			</tr>
			<tr>
				<td class="bordered form_label">
					PTR NO. <span><!--PTR NO.--></span>
				</td>
				<td class="bordered form_label">
					DATE SIGNED <span><!--DATE SIGNED--></span>
				</td>
				<td class="bordered form_label">
					PLACE ISSUED <span><!--PLACE ISSUED--></span>
				</td>
			</tr>
			<tr>
				<td class="bordered form_label">
					SIGNATURE
				</td>
				<td class="bordered form_label">
					DATE SIGNED <span><!--DATE SIGNED--></span>
				</td>
				<td class="bordered form_label">
					TIN <span><!--TIN--></span>
				</td>
			</tr>
		</table>

		<div class="box_numbers">BOX 5 (OWNER/AUTHORIZED/REPRESENTATIVE)</div>
		<table class="bordered" style="width: 100%">
			<tr>
				<td class="bordered form_label w3-center">NAME</td>
				<td class="bordered form_label w3-center">SIGNATURE</td>
				<td class="bordered form_label w3-center" width="15%">TIN</td>
				<td class="bordered form_label" rowspan="2" style="width: 33.33%; padding: 2px 5px">
					<div class="w3-row">
						<div class="w3-col l6 m6 s6 form_label">
							CTC NO.
						</div>
						<div class="w3-col l6 m6 s6 w3-border-bottom">
							<div class="div_placeholder"><!--ctc no.--></div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l6 m6 s6 form_label">
							DATE ISSUED
						</div>
						<div class="w3-col l6 m6 s6 w3-border-bottom">
							<div class="div_placeholder"><!--date issued--></div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l6 m6 s6 form_label">
							PLACED ISSUED
						</div>
						<div class="w3-col l6 m6 s6 w3-border-bottom">
							<div class="div_placeholder"><!--placed issued--></div>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="bordered"><div class="div_placeholder"><!--name--></div></td>
				<td class="bordered"><div class="div_placeholder"><!--signature--></div></td>
				<td class="bordered"><div class="div_placeholder"><!--tin--></div></td>
			</tr>
		</table>

		<div class="box_numbers">BOX 6 (TO BE RECEIVED BY RECEIVING/RECORDING SECTION)</div>
		<table style="width: 100%; page-break-after: always">
			<tr>
				<td class="bordered w3-center form_label" width="50%">ELECTRICAL PLANS & SPECIFICATIONS (5 SETS)</td>
				<td class="bordered w3-center form_label" style="padding: 5px">
					<div class="w3-row">
						<div class="w3-col l4 m4 s4">
							RECEIVED BY:
						</div>
						<div class="w3-col l8 m8 s8 w3-border-bottom w3-center">
							<div class="div_placeholder"><!--received by name--></div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l4 m4 s4"><div class="div_placeholder"></div></div>
						<div class="w3-col l8 m8 s8 w3-center">
							<div class="div_placeholder">(Signature Over Printed Name)</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l4 m4 s4">
							DATE RECEIVED
						</div>
						<div class="w3-col l8 m8 s8 w3-border-bottom w3-center">
							<div class="div_placeholder"><!--date received--></div>
						</div>
					</div>
				</td>
			</tr>
		</table>

		<!--page break-->

		<div class="w3-center">REPUBLIC OF THE PHILIPPINES</div>
		<div class="w3-center">OFFICE OF THE LOCAL BUILDING OFFICIAL</div>
		<br>
		<div class="w3-row">
			<div class="w3-col l4 m4 s4"><div class="div_placeholder"></div></div>
			<div class="w3-col l4 m4 s4 w3-border-bottom"><div class="div_placeholder w3-center"><!--CITY/MUNICIPALITY--></div></div>
			<div class="w3-col l4 m4 s4"><div class="div_placeholder"></div></div>
		</div>
		<div class="w3-row">
			<div class="w3-col l4 m4 s4"><div class="div_placeholder"></div></div>
			<div class="w3-col l4 m4 s4 w3-center text_bold">DISTRICT/CITY/MUNICIPALITY</div>
			<div class="w3-col l4 m4 s4"><div class="div_placeholder"></div></div>
		</div>
		<div class="w3-row">
			<div class="w3-col l4 m4 s4"><div class="div_placeholder"></div></div>
			<div class="w3-col l4 m4 s4 w3-center">AREA CODE <span>__________________</span></div>
			<div class="w3-col l4 m4 s4"><div class="div_placeholder"></div></div>
		</div>
		<div class="w3-row">
			<div class="w3-col l5 m5 s5" style="font-size: 7pt; font-style: italic;">
				PERMIT NO.:
			</div>
			<div class="w3-col l3 m3 s3"><div class="div_placeholder"></div></div>
			<div class="w3-col l4 m4 s4" style="font-size: 7pt; font-style: italic;">
				APPLICATION NO.:
			</div>
		<div class="w3-row">
			<div class="w3-col l5 m5 s5">
				<div class="bordered" style="width: 80%; height: 30px"><div class="div_placeholder"><!--PERMIT NO.--></div></div>
			</div>
			<div class="w3-col l3 m3 s3"><div class="div_placeholder"></div></div>
			<div class="w3-col l4 m4 s4 w3-center">
				<div class="bordered"style="height: 30px"><div class="div_placeholder"><!--APPLICATION NO.--></div></div>
			</div>
		</div>
		<div class="w3-row">
			<div class="w3-col l4 m4 s4">
				<div class="w3-row">
					<div class="w3-col" style="width: 100px">
						DATE ISSUED:
					</div>
					<div class="w3-rest w3-border-bottom w3-center">
						<div class="div_placeholder"><!--DATE ISSUED--></div>
					</div>
				</div>
				<div class="w3-row">
					<div class="w3-col" style="width: 150px">
						PAID UNDER O.R. NO.:
					</div>
					<div class="w3-rest w3-border-bottom w3-center">
						<div class="div_placeholder"><!--O.R. NO.--></div>
					</div>
				</div>
				<div class="w3-row">
					<div class="w3-col" style="width: 60px">
						AMOUNT:
					</div>
					<div class="w3-rest w3-border-bottom w3-center">
						<div class="div_placeholder"><!--AMNT--></div>
					</div>
				</div>
				<div class="w3-row">
					<div class="w3-col" style="width: 50px">
						DATE:
					</div>
					<div class="w3-rest w3-border-bottom w3-center">
						<div class="div_placeholder"><!--DATE--></div>
					</div>
				</div>
			</div>
			<div class="w3-col l4 m4 s4"><div class="div_placeholder"></div></div>
			<div class="w3-col l4 m4 s4">
				<div class="w3-row">
					<div class="w3-col" style="width: 100px">
						DATE ISSUED:
					</div>
					<div class="w3-rest w3-border-bottom w3-center">
						<div class="div_placeholder"><!--DATE ISSUED--></div>
					</div>
				</div>
			</div>
		</div>
		<div class="w3-center text_bold" style="font-size: 14pt;">ELECTRICAL PERMIT</div>
		<div class="w3-center" style="font-size: 12pt; margin-bottom: 50px">(To be Accomplished by the Office Concerned)</div>
		<div class="box_numbers text_bold">BOX 1</div>
		<table style="width: 100%; font-size: 10pt;">
			<tr class="bordered">
				<td width="80%">
					<div class="w3-row">
						<div class="w3-col l4 m4 s4 form_label">NAME OF OWNER/APPLICANT:</div>
						<div class="w3-col l2 m2 s2 form_label w3-center">LAST NAME</div>
						<div class="w3-col l2 m2 s2 form_label w3-center">FIRST NAME</div>
						<div class="w3-col l4 m4 s4 form_label w3-center">MIDDLE NAME</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l4 m4 s4 form_label"><div class="div_placeholder"></div></div>
						<div class="w3-col l2 m2 s2 form_label w3-center"><div class="div_placeholder"><!--last name--></div></div>
						<div class="w3-col l2 m2 s2 form_label w3-center"><div class="div_placeholder"><!--first name--></div></div>
						<div class="w3-col l4 m4 s4 form_label w3-center"><div class="div_placeholder"><!--middle name--></div></div>
					</div>	
				</td>
				<td width="20%" class="form_label">TIN: <div class="div_placeholder"><!--TIN--></div></td>
			</tr>
			<tr class="bordered">
				<td width="80%">
					<div class="w3-row">
						<div class="w3-col l2 m2 s2 form_label">ADDRESS:</div>
						<div class="w3-col l1 m1 s1 form_label">NO.<div class="div_placeholder_2"><!--address no.--></div></div>
						<div class="w3-col l2 m2 s2 form_label">STREET<div class="div_placeholder_2"><!--address street--></div></div>
						<div class="w3-col l3 m3 s3 form_label">BARANGAY<div class="div_placeholder_2"><!--address brgy--></div></div>
						<div class="w3-col l4 m4 s4 form_label">CITY/MUNICIPALITY<div class="div_placeholder_2"><!--city/municipality--></div></div>
					</div>	
				</td>
				<td width="20%" class="form_label">TEL/FAX NO. <div class="div_placeholder"><!--TEL FAX NO.--></div></td>
			</tr>
			<tr>
				<td colspan="2" class="bordered">
					<div class="w3-row form_label">
						<div class="w3-col l3 m3 s3">LOCATION OF INSTALLATION:</div>
						<div class="w3-col l1 m1 s1">
							NO. <div class="div_placeholder"><!--no.--></div>
						</div>
						<div class="w3-col l2 m2 s2">
							STREET <div class="div_placeholder"><!--street--></div>
						</div>
						<div class="w3-col l3 m3 s3">
							BARANGAY <div class="div_placeholder"><!--brgy--></div>
						</div>
						<div class="w3-col l3 m3 s3">
							CITY/MUNICIPALITY <div class="div_placeholder"><!--city/municipality--></div>
						</div>
					</div>
				</td>
			</tr>
		</table>


		<div class="box_numbers text_bold">BOX 2</div>
		<table class="bordered" style="width: 100%">
			<tr>
				<td colspan="4" class="form_label text_bold w3-center bordered">ASSESSED FEES</td>
			</tr>
			<tr>
				<td class="bordered form_label w3-center">AMOUNT DUE</td>
				<td class="bordered form_label w3-center">ASSESSED</td>
				<td class="bordered form_label w3-center">O.R. NUMBER</td>
				<td class="bordered form_label w3-center">DATE PAID</td>
			</tr>
			<tr>
				<td class="bordered form_label w3-center"><div class="div_placeholder"></div></td>
				<td class="bordered form_label w3-center"><div class="div_placeholder"></div></td>
				<td class="bordered form_label w3-center"><div class="div_placeholder"></div></td>
				<td class="bordered form_label w3-center"><div class="div_placeholder"></div></td>
			</tr>
			<tr>
				<td class="bordered form_label w3-center"><div class="div_placeholder"></div></td>
				<td class="bordered form_label w3-center"><div class="div_placeholder"></div></td>
				<td class="bordered form_label w3-center"><div class="div_placeholder"></div></td>
				<td class="bordered form_label w3-center"><div class="div_placeholder"></div></td>
			</tr>
			<tr>
				<td class="bordered form_label w3-center"><div class="div_placeholder"></div></td>
				<td class="bordered form_label w3-center"><div class="div_placeholder"></div></td>
				<td class="bordered form_label w3-center"><div class="div_placeholder"></div></td>
				<td class="bordered form_label w3-center"><div class="div_placeholder"></div></td>
			</tr>
		</table>

		<div class="box_numbers text_bold">BOX 3</div>
		<div style="border: 2px solid black; padding: 3px 10px; font-size: 8pt;">
			<div style="padding-left: 30px;">PERMIT IS HEREBY GRANTED TO INSTALL THE ELECTRICAL WIRING, DEVICES AND EQUIPMENT ENUMERATED IN THE APPLICATION SUBJECT TO THE FOLLOWING CONDITIONS:</div>
			<ol id="list_rules">
				<li>THAT THE PROPOSED INSTALLATIONS BE IN ACCORDANCE WITH THE APPROVED PLANS FILLED WITH THIS OFFICE EAND IN CONFORMITY WITH THE PROVISIONS OF THE LATEST EDITION OF THE PHILIPPINE ELECTRICAL CODE.</li>
				<li>THAT A DULY LICENSED ELECTRICAL PRACTITIONER BE INCHARGE OF THE INSTALLATION/CONSTRUCTION.</li>
				<li>THAT A CERTIFICATE OF A COMPLETION DULY SIGNED BY THE ELECTRICAL PRACTITIONER INCHARGE OF THE INSTALLATION BE SUBMITTED NOT LATER THAN SEVEN (7) DAYS AFTER COMPLETION OF THE INSTALLATION.</li>
				<li>THAT A CERTIFICATE OF FINAL ELECTRICAL INSPECTION BE SECURED PRIOR TO THE ACTUAL OCCUPANCY OF THE BUILDING.</li>
				<li>THIS PERMIT SHALL BE POSTED AT THE DOOR OR SITE OF WORK.</li>
			</ol>
			<div style="margin-top: 20px;">APPROVED:</div>
			<br>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
				<div class="w3-col l5 m5 s5 w3-border-bottom"><div class="div_placeholder"></div></div>
				<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
				<div class="w3-col l3 m3 s3 w3-border-bottom w3-center"><div class="div_placeholder"><!--DATE--></div></div>
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			</div>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
				<div class="w3-col l5 m5 s5 w3-center">ELECTRICAL ENGINEERING OF THE BUILDING OFFICE</div>
				<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
				<div class="w3-col l3 m3 s3 w3-center">DATE</div>
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			</div>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
				<div class="w3-col l5 m5 s5 w3-center">(Signature Over Printed Name)</div>
				<div class="w3-col l6 m6 s6"><div class="div_placeholder"></div></div>
			</div>
			<br><br>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
				<div class="w3-col l5 m5 s5 w3-border-bottom w3-center"><div class="div_placeholder"><!--PRC REG. NO & VALIDITY--></div></div>
				<div class="w3-col l6 m6 s6"><div class="div_placeholder"></div></div>
			</div>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
				<div class="w3-col l5 m5 s5 w3-center">PRC REG. NO & VALIDITY</div>
				<div class="w3-col l6 m6 s6"><div class="div_placeholder"></div></div>
			</div>
			<br>
			<div>NOTED:</div>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
				<div class="w3-col l5 m5 s5 w3-border-bottom"><div class="div_placeholder"></div></div>
				<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
				<div class="w3-col l3 m3 s3 w3-border-bottom w3-center"><div class="div_placeholder"><!--DATE--></div></div>
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			</div>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
				<div class="w3-col l5 m5 s5 w3-center">BUILDING OFFICIAL</div>
				<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
				<div class="w3-col l3 m3 s3 w3-center">DATE</div>
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			</div>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
				<div class="w3-col l5 m5 s5 w3-center">(Signature Over Printed Name)</div>
				<div class="w3-col l6 m6 s6"><div class="div_placeholder"></div></div>
			</div>
		</div>
		<div><i>NOTE: 1. This permit maybe cancelled or revoked pursuant to Section 305 and 306 of the National Building code.</i></div>
		</div>
		</div>
		<div style="page-break-after: always;"><i>NOTE: 2. Alterations on this form are not allowed.</i></div>
	</div>

	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<style type="text/css">
		#list_rules{
			padding-left: 60px;
		}
		#list_rules li{
			margin:10px 0px;
		}
	</style>
</body>
</html>