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
	<title>Agricultural Permit</title>
	<link rel="icon" href="../images/logo_img.png">
	<link rel="stylesheet" href="../css/w3.css">
	<style type="text/css">
		body{
			font-family: "Arial Narrow", sans-serif;
			font-size: 10pt;
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
		<div class="text_bold" style="font-size: 14pt">ANNEX "A"</div>
		<div class="w3-center text_bold">Republic of the Philippines</div>
		<div class="w3-center">City Municipality of <span></span></div>
		<div class="w3-center">Province of <span></span></div>		
		<div class="w3-center text_bold">OFFICE OF THE BUILDING OFFICIAL</div>
		<div class="w3-center text_bold" style="font-size: 16pt">AGRICULTURAL ENGINEERING PERMIT FORM</div>
		<div class="w3-row">
			<div class="w3-col l4 m4 s4 w3-center">
				<table class="tbl_header">
					<tr>
						<th colspan="10">APPLICATION NO.</th>
					</tr>
					<tr>
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
						<th colspan="9">AEP NO.</th>
					</tr>
					<tr>
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
						<th colspan="9">BUILDING PERMIT NO.</th>
					</tr>
					<tr>
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
		<div class="text_bold">BOX 1. (TO BE ACCOMPLISHED IN PRINT BY THE OWNER/APPLICANT)</div>
		<!--<div class="w3-row">
			<div class="w3-col l8 m8 s8" id="div_bordered">
				<div class="w3-row">
					<div class="w3-col l3 m3 s3" id="form_label">
						OWNER/APPLICANT
						<div id="div_placeholder"></div>
					</div>
					<div class="w3-col l3 m3 s3" id="form_label">
						LAST NAME
						<div id="div_placeholder"></div>
					</div>
					<div class="w3-col l4 m4 s4" id="form_label">
						FIRST NAME
						<div id="div_placeholder"></div>
					</div>
					<div class="w3-col l2 m1 s2" id="form_label">
						MI
						<div id="div_placeholder"></div>
					</div>
				</div>
			</div>
			<div class="w3-col l4 m4 s4" id="div_bordered">
				TIN
				<div id="div_placeholder"></div>
			</div>
		</div>-->
		<table style="width: 100%">
			<tr class="bordered">
				<td style="width: 30%">
					<div class="w3-row">
						<div class="w3-col l8 m8 s8 form_label">OWNER/APPLICANT</div>
						<div class="w3-col l4 m4 s4 form_label">LAST NAME</div>
					</div>
					<div class="div_placeholder" >
						<div class="w3-col l8 m8 s8 form_label">--</div>
						<div class="w3-col l4 m4 s4 form_label"><strong><?php echo $applicant_info['lname']; ?></strong></div>
					</div>
				</td>
				<td class="w3-center form_label">FIRST NAME<div class="div_placeholder"><strong><?php echo $applicant_info['fname']; ?></strong></div></td>
				<td class="w3-center form_label">MI<div class="div_placeholder"><strong><?php echo $applicant_info['mi']; ?></strong></div></td>
				<td width="30%" class="bordered form_label">TIN <div class="div_placeholder"><strong><?php echo $applicant_info['tin']; ?></strong></div></td>
			</tr>
			<tr>
				<td class="form_label bordered">FOR CONSTRUCTION OWNED <div>BY ENTEPRISE</div></td>
				<td class="form_label bordered">FORM OF OWNERSHIP <div class="div_placeholder"></div></td>
				<td colspan="2" class="bordered form_label">USE OR CHARACTER OF OCCUPANCY<div class="div_placeholder"></div></td>
			</tr>
			<tr>
				<td colspan="3" class="bordered">
					<div class="w3-row">
						<div class="w3-col l2 m2 s2 form_label">ADDRESS</div>
						<div class="w3-col l1 m1 s1 form_label">NO.</div>
						<div class="w3-col l2 m2 s2 form_label">STREET</div>
						<div class="w3-col l2 m2 s2 form_label">BARANGAY</div>
						<div class="w3-col l3 m3 s3 form_label">CITY/MUNICIPALITY</div>
						<div class="w3-col l2 m2 s2 form_label">ZIP CODE</div>
					</div>
					<div class="div_placeholder_2">
						<div class="w3-row">
							<div class="w3-col l2 m2 s2">
								<span>--</span>
							</div>
							<div class="w3-col l1 m1 s1">
								<strong><?php echo $applicant_info['add_no']; ?></strong>
							</div>
							<div class="w3-col l2 m2 s2">
								<strong><?php echo $applicant_info['street']; ?></strong>
							</div>
							<div class="w3-col l2 m2 s2">
								<strong><?php echo $applicant_info['barangay']; ?></strong>
							</div>
							<div class="w3-col l3 m3 s3">
								<strong><?php echo $applicant_info['municipality']; ?></strong>
							</div>
							<div class="w3-col l2 m2 s2">
								<strong><?php echo $applicant_info['zip_code']; ?></strong>
							</div>
						</div>
					</div>
				</td>
				<td class="bordered form_label">TELEPHONE NO.<div class="div_placeholder"><strong><?php echo $applicant_info['tel_no']; ?></strong></div></td>
			</tr>
			<tr>
				<td colspan="4" class="bordered">
					<div class="w3-row form_label">
						<div class="w3-col l3 m3 s3">
							LOCATION OF CONSTRUCTION
						</div>
						<div class="w3-col l2 m2 s2">
							LOT NO. <div class="div_placeholder_underlined"></div>
						</div>
						<div class="w3-col l2 m2 s2">
							BLK. NO. <div class="div_placeholder_underlined"></div>
						</div>
						<div class="w3-col l2 m2 s2">
							TCT. NO. <div class="div_placeholder_underlined"></div>
						</div>
						<div class="w3-col l2 m2 s2">
							TAX DEC. NO. <div class="div_placeholder_underlined"></div>
						</div>
						<div class="w3-col l1 m1 s1"></div>
					</div>
					<div class="w3-row form_label">
						<div class="w3-col l3 m3 s3">
							STREET <div class="div_placeholder_underlined"></div>
						</div>
						<div class="w3-col l4 m4 s4">
							BARANGAY <div class="div_placeholder_underlined"></div>
						</div>
						<div class="w3-col l5 m5 s5">
							CITY/MUNICIPALITY OF <div class="div_placeholder_underlined"></div>
						</div>
						<div class="w3-col l1 m1 s1"></div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="4" class="bordered">
					<div class="text_bold form_label">SCOPE OF WORK</div>
					<div class="w3-row form_label" style="margin: 0px 10px;">
						<div class="w3-col l4 m4 s4">
							<div>&#x2610;<!--change to &#x2612; when ticked--> NEW CONSTRUCTION</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div>&#x2610;<!--change to &#x2612; when ticked--> IMPROVEMENT</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div>&#x2610;<!--change to &#x2612; when ticked--> OTHERS</div>
						</div>
					</div>
					<div class="w3-row form_label" style="margin: 0px 10px; margin-bottom: 5px">
						<div class="w3-col l4 m4 s4">
							<div>&#x2610;<!--change to &#x2612; when ticked--> REPAIR</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div>&#x2610;<!--change to &#x2612; when ticked--> RENOVATION</div>
						</div>
						<div class="w3-col l4 m4 s4 w3-border-bottom w3-center">
							<div class="div_placeholder"><!--OTHERS - DETAILS--></div>
						</div>
					</div>
				</td>
			</tr>
		</table>
		<div class="text_bold">BOX 2 (TO BE ACCOMPLISHED BY THE DESIGN PROFESSIONAL</div>
		<div class="bordered" style="padding: 5px;">
			<div class="text_bold form_label">AGRICULTURAL BUILDINGS, STRUCTURES AND FACILITIES TO BE CONSTRUCTED/REPAIRED/DEMOLISHED</div>
			<div class="w3-row form_label" style="margin: 10px 5px;">
				<div class="w3-col l4 m4 s4">
					<div>&#x2610;<!--change to &#x2612; when ticked--> LIVESTOCK AND POULTRY HOUSE</div>
				</div>
				<div class="w3-col l4 m4 s4">
					<div>&#x2610;<!--change to &#x2612; when ticked--> AGRICULTURAL/FISHERY STORAGE BUILDING/FACILITIES</div>
				</div>
				<div class="w3-col l4 m4 s4">
					<div>&#x2610;<!--change to &#x2612; when ticked--> AGRO/FISHERY/FORESTRY PROCESSING HOUSE/WASTE MANAGEMENT FACILITIES</div>
				</div>
			</div>
			<div class="w3-row form_label" style="margin: 10px 5px;">
				<div class="w3-col l4 m4 s4">
					<div>&#x2610;<!--change to &#x2612; when ticked--> AGRI/FISHERY MARKETING FACILITIES</div>
				</div>
				<div class="w3-col l4 m4 s4">
					<div>&#x2610;<!--change to &#x2612; when ticked--> AGRI/FISHERY RESEARCH CENTER</div>
				</div>
				<div class="w3-col l4 m4 s4">
					<div>&#x2610;<!--change to &#x2612; when ticked--> GREEN/SCREEN HOUSE</div>
				</div>
			</div>
			<div class="w3-row form_label" style="margin: 10px 5px;">
				<div class="w3-col l4 m4 s4">
					<div>&#x2610;<!--change to &#x2612; when ticked--> AGRI/FISHERY TRAINING/DEMO CENTER</div>
				</div>
				<div class="w3-col l4 m4 s4">
					<div>&#x2610;<!--change to &#x2612; when ticked--> FARM HOUSE</div>
				</div>
				<div class="w3-col l4 m4 s4">
					<div class="w3-row">
						<div class="w3-col l12 s12 m12">
							<div>&#x2610;<!--change to &#x2612; when ticked--> OTHERS</div>
						</div>
						<div class="w3-col l8 m8 s8 w3-border-bottom w3-center">
							<div class="div_placeholder"><!--OTHERS - DETAILS--></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="w3-row">
			<div class="w3-col l5 m5 s5">
				<div class="text_bold form_label">BOX 3</div>
				<table style="width: 100%">
					<tr class="bordered">
						<td colspan="2" class="w3-center form_label">DESIGN PROFESSIONAL<br>PLANS & SPECIFICATIONS<br></td>
					</tr>
					<tr class="bordered">
						<td colspan="2">
							<div class="w3-row" style="padding-top: 30px;">
								<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
								<div class="w3-col l8 m8 s8 w3-border-bottom w3-center">
									<div class="div_placeholder"><!--AGRICULTURAL ENGINEER NAME--></div>
								</div>
								<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
							</div>
							<div class="w3-center form_label text_bold">AGRICULTURAL ENGINEER</div>
							<div class="w3-center form_label">Signed and Sealed Over Printed Name</div>
							<div class="w3-center form_label">Date <div class="div_placeholder_underlined"></div></div>
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
			<div class="w3-col l7 m7 s7" style="padding-left: 7px;">
				<div class="text_bold form_label">BOX 4</div>
				<table style="width: 100%;">
					<tr class="bordered">
						<td colspan="2" class="w3-center form_label text_bold">SUPERVISOR/IN-CHARGE OF AGRICULTURAL ENGINEERING WORKS<br><br></td>
					</tr>
					<tr class="bordered">
						<td colspan="2">
							<div class="w3-row" style="padding-top: 30px;">
								<div class="w3-col l3 m3 s3"><div class="div_placeholder"></div></div>
								<div class="w3-col l6 m6 s6 w3-border-bottom w3-center">
									<div class="div_placeholder"><!--AGRICULTURAL ENGR. NAME--></div>
								</div>
								<div class="w3-col l3 m3 s3"><div class="div_placeholder"></div></div>
							</div>
							<div class="w3-center form_label text_bold">AGRICULTURAL ENGINEER</div>
							<div class="w3-center form_label">Signed and Sealed Over Printed Name</div>
							<div class="w3-center form_label">Date <div class="div_placeholder_underlined"></div></div>
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
			<div class="w3-col l5 m5 s5">
				<div class="text_bold form_label">BOX 5</div>
				<table style="width: 100%">
					<tr>
						<td colspan="3" class="form_label text_bold bordered">BUILDING OWNER</td>
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
						<td class="bordered form_label">PTR No. <div class="div_placeholder"></div></td>
						<td class="bordered form_label">Date Issued <div class="div_placeholder"></div></td>
						<td class="bordered form_label">Place Issued <div class="div_placeholder"></div></td>
					</tr>
				</table>
			</div>
			<div class="w3-col l7 m7 s7" style="padding-left: 7px;">
				<div class="text_bold form_label">BOX 6</div>
				<table style="width: 100%;">
					<tr>
						<td colspan="3" class="form_label text_bold bordered">WITH MY CONSENT : LOT OWNER</td>
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
						<td class="bordered form_label">PTR No. <div class="div_placeholder"></div></td>
						<td class="bordered form_label">Date Issued <div class="div_placeholder"></div></td>
						<td class="bordered form_label">Place Issued <div class="div_placeholder"></div></td>
					</tr>
				</table>
			</div>
		</div>

		<!--PAGE BREAK!-->

		<div class="text_bold">TO BE ACCOMPLISHED BY THE PROCESSING AND EVALUATION DIVISION</div>
		<div class="text_bold">BOX 7</div>
		<div class="bordered" style="padding: 5px 10px;">
			<div>RECEIVED BY</div>
			<div class="text_bold">FIVE (5) SETS OF AGRICULTURAL ENGINEERING DOCUMENTS</div>
			<div class="w3-row" style="padding-left: 10px">
				<div class="w3-col l6 m6 s6">
					<div>&#x2610;<!--change to &#x2612; when ticked--> LOCATION AND DEVELOPMENT PLAN</div>
				</div>
				<div class="w3-col l6 m6 s6">
					<div>&#x2610;<!--change to &#x2612; when ticked--> OPERATIONAL PLAN/PROCESS FLOW</div>
				</div>
			</div>
			<div class="w3-row" style="padding-left: 10px">
				<div class="w3-col l6 m6 s6">
					<div>&#x2610;<!--change to &#x2612; when ticked--> AGRICULTURAL BUILDING PLAN</div>
				</div>
				<div class="w3-col l6 m6 s6">
					<div>&#x2610;<!--change to &#x2612; when ticked--> TECHNICAL SPECIFICATIONS</div>
				</div>
			</div>
			<div class="w3-row form_label">
				<div class="w3-col l6 m6 s6">
					<div class="w3-row">
						<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
						<div class="w3-col l1 m1 s1 w3-border-bottom">
							<div class="div_placeholder"><!--FLOOR PLAN--></div>
						</div>
						<div class="w3-col l9 m9 s9">
							<div>1. Floor Plan</div>
							<ol type="a" style="margin: 0px!important">
								<li>Space Requirements/Specifications</li>
								<li>Drainage Plan, Water Requirements and Facilities/Specifications</li>
								<li>Lighting and Illumination Requirements</li>
								<li>Agricultural Machinery Equipment Lay-out/Specifications</li>
							</ol>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
						<div class="w3-col l1 m1 s1 w3-border-bottom">
							<div class="div_placeholder"><!-ELEVATION--></div>
						</div>
						<div class="w3-col l9 m9 s9">
							<div>2. Elevation</div>
							<ol type="a" style="margin: 0px!important">
								<li>Elevation Requirements/Specifications</li>
								<li>Foundations and Footings</li>
								<li>Ventilation Requirements/Specifications</li>
							</ol>
						</div>
					</div>
				</div>
				<div class="w3-col l6 m6 s6">
				</div>
			</div>
		</div>

		<div class="text_bold">BOX 8</div>
		<table style="width: 100%">
			<tr>
				<td class="bordered" colspan="6" style="padding-left: 10px"><br>PROGRESS FLOW</td>
			</tr>
			<tr>
				<td class="bordered" rowspan="2"></td>
				<td class="bordered w3-center" colspan="2">IN</td>
				<td class="bordered w3-center" colspan="2">OUT</td>
				<td class="bordered w3-center" rowspan="2">PROCESSED BY</td>
			</tr>
			<tr>
				<td class="bordered">DATE</td>
				<td class="bordered">TIME</td>
				<td class="bordered">DATE</td>
				<td class="bordered">TIME</td>
			</tr>
			<tr>
				<td class="bordered" style="padding-left: 10px">RECEIVING AND RECORDING</td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
			</tr>
			<tr>
				<td class="bordered" style="padding-left: 10px">AGRICULTURAL ENGINEERING<br>PLANS AND DESIGNS</td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
			</tr>
			<tr>
				<td class="bordered"style="padding-left: 10px">OTHERS (SPECIFY)</td>
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
				<li>That the proposed agricultural engineering works shall be in accordance with the agricultural engineering plans filed with this Office and in conformity with the provisions of the Philippine Agricultural Engineering Act og 1998, its Implementing Rules and Regulations and the Philippine Agricultural Engineering Standards.</li>
				<li>That prior to any commencement of agricultural engineering works, a duly accomplished prescribed "Notice of Construction" shall be submitted to the Office of the Building Official.</li>
				<li>That upon completion of the agricultural engineering works, the agricultural engineer in-chare in the supervision of the construction of agricultural building shall submit the entry to the logbook duly signed and sealed by the building official and shall also accomplish the Certificate of Completion stating that the agricultural engineering works of the agricultural building conforms to the provisions of the Philippine Agricultural Engineering Act of 1999, its Implementing Rules and Regulations and the Philippine Agricultural Engineering Standards.</li>
				<li>That this permit is null and void unless acocmpanied by the building permit.</li>
			</ol>
			<p class="text_bold">PERMIT ISSUED BY:</p>
			<div class="w3-row" style="padding-top: 30px;">
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