<?php
include('../config/connection.php');
if (!isset($_GET['id'])) {
	header("Location: ../home.php");
}
else {
	$id = $_GET['id'];
	$sql = "SELECT * FROM bp_building WHERE id='$id' LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
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
	<title></title>
	<link rel="icon" href="../images/logo_img.png">
	<link rel="stylesheet" href="../css/w3.css">
	<style type="text/css">
		body{
			font-family: "Calibri", sans-serif;
			font-size: 9pt;
			margin: 100px;
		}
		table, div{
			page-break-after: avoid;
		}
		.text_bold{
			font-weight: bold;
		}
		table, tr, th, td{
			border-collapse: collapse;
		}
		th{
			font-weight: normal!important;
		}
		.div_header{
			margin: 0px!important;
			padding: 0px!important;
		}
		.div_nso_filled{
			margin: 5px;
			background: black;
			display: inline;
			width: 20pt;
		}
		.tbl_nso{
			background: white;
			width: 120pt;
			display: inline-table;
		}
		.tbl_nso_2 td{
			height: 15pt;
			border: 1px solid black;
			border-right: 0px solid black;
		}
		.tbl_nso td{
			max-width: 22pt!important;
			height: 26pt;
		}
		.tbl_header td, .div_checkbox{
			width: 16pt;
			height: 18pt;
		}
		.bordered_full{
			border: 1px solid black;
		}
		.bordered_full td, .bordered_full caption{
			border: 1px solid black;
			border-bottom: none;
		}
		.bordered{
			border: 1px solid black;
			border-right: 0px solid black;
			padding-left: 3px;
			padding-top: 5px;
		}
		.tbl_header td, .div_checkbox, .tbl_nso td{
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
		.text_font_9{
			font-size: 9pt;
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
		<div class="w3-center div_header" style="font-size: 9pt;">Province of Pangasinan</div>
		<div class="w3-center text_bold div_header">MUNICIPALITY OF BUGALLON</div>		
		<div class="w3-center text_bold div_header">OFFICE OF THE MUNICIPAL ENGINEER</div>
		<div class="w3-row">
			<div class="w3-col l9 m9 s9">
				<br/>
				<div class="w3-row">
					<div class="w3-col l4 m4 s4">
						APPLICATION NO.
					</div>
					<div class="w3-col l4 m4 s4">
						AREA CODE: 01034
					</div>
					<div class="w3-col l4 m4 s4">
						PERMIT NO.
					</div>
				</div>
				<div class="w3-row">
					<div class="w3-col l6 m6 s6">
						<table class="tbl_header">
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
					<div class="w3-col l6 m6 s6">
						<table class="tbl_header">
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
				<div class="text_bold w3-center" style="font-size: 18pt;">BUILDING PERMIT</div>
				<div class="w3-row">
					<div class="w3-col l6 m6 s6 w3-center">
						<div class="w3-border-bottom" style="width: 70%; margin: 0 auto;"></div>
						<div>DATE OF APPLICATION</div>
					</div>
					<div class="w3-col l6 m6 s6 w3-center">
						<div class="w3-border-bottom" style="width: 70%; margin: 0 auto;"></div>
						<div>DATE ISSUED</div>
					</div>
				</div>
				<div class="text_bold w3-center" style="font-size: 14pt;">ORIGINAL RENEWAL</div>

				<div>BOX 1 (TO BE ACCOMPLISHED BY DESIGNING ARCHITECT/CIVIL ENGINEER IN PRINT</div>
				<table style="width: 100%; border-left: 1px solid black;">
					<tr class="bordered">
						<td colspan="4">
							<div class="w3-row">
								<div class="w3-col l2 m2 s2">
									OWNER
								</div>
								<div class="w3-col l3 m3 s3">
									Last Name<br/>
								</div>
								<div class="w3-col l3 m3 s3">
									First Name
								</div>
								<div class="w3-col l2 m2 s2">
									M.I.
								</div>
								<div class="w3-col l2 m2 s2">
									Tax Acct. No.
								</div>
							</div>
							<div class="div_placeholder">
								<div class="w3-row">
									<div class="w3-col l2 m2 s2">
										<span>--</span>
									</div>
									<div class="w3-col l3 m3 s3">
										<strong><?php echo $applicant_info['lname']; ?></strong>
									</div>
									<div class="w3-col l3 m3 s3">
										<strong><?php echo $applicant_info['fname']; ?></strong>
									</div>
									<div class="w3-col l2 m2 s2">
										<strong><?php echo $applicant_info['mi']; ?></strong>
									</div>
									<div class="w3-col l2 m2 s2">
										<strong><?php echo $applicant_info['tin']; ?></strong>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td class="bordered">
							<div>For Construction</div>
							<div>by an Enterprise</div>
						</td>
						<td class="bordered">
							Owned Form of Ownership
							<div class="div_placeholder"></div>
						</td>
						<td colspan="2" class="bordered" width="100%">
							Main Economic Activity/kind of Business
							<div class="div_placeholder"></div>
						</td>
					</tr>
					<tr>
						<td class="bordered" colspan="3" width="60%">
							<div>ADDRESS</div>
							<div class="div_placeholder_2"><strong><?php echo $applicant_info['add_no']." ".$applicant_info['street']." ".$applicant_info['barangay']." ".$applicant_info['municipality']." ".$applicant_info['zip_code']; ?></strong></div>
						</td>
						<td class="bordered">
							<div>Tel. No.</div>
							<div class="div_placeholder_2"><strong><?php echo $applicant_info['tel_no']; ?></strong></div>
						</td>
					</tr>
					<tr>
						<td class="bordered" colspan="4">
							<div>LOCATION OF CONSTRUCTION</div>
							<div class="div_placeholder_2"></div>
						</td>
					</tr>
					<tr class="bordered">
						<td>
							<div style="padding-left: 3px">SCOPE OF WORK:</div>
							<div class="div_placeholder_2"></div>
							<div class="div_placeholder_2"></div>
							<div class="div_placeholder_2"></div>
							<div class="div_placeholder_2"></div>
							<div class="div_placeholder_2"></div>
						</td>
						<td>
							<div>1. NEW CONSTRUCTION</div>
							<div>2. ADDITION OF <div class="div_placeholder_underlined"></div></div>
							<div>3. REPAIR OF <div class="div_placeholder_underlined"></div></div>
							<div>4. RENOVATION OF <div class="div_placeholder_underlined"></div></div>
							<div>5. DEMOLITION OF <div class="div_placeholder_underlined"></div></div>
						</td>
						<td colspan="2">
							<div>OTHERS(SPECIFY)</div>
							<div>6. <div class="div_placeholder_underlined"></div> of <div class="div_placeholder_underlined"></div></div>
							<div>7. <div class="div_placeholder_underlined"></div> of <div class="div_placeholder_underlined"></div></div>
							<div style="padding-top: 10px; border: 1px solid black;">
								<div>Number of Units <div class="div_placeholder_underlined"></div></div>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="4" style="padding: 3px">
							<div class="text_bold">USE OR TYPE OCCUPANCY</div>
							<div class="w3-row">
								<div class="w3-col l6 m6 s6">
									<div class="text_bold">RESIDENTIAL</div>
									<div class="text_font_9">
										<div>11&#09;Single</div>
										<div>12&#09;Duplex</div>
										<div>13&#09;Rowhouse/Accessoria</div>
										<div>14&#09;Others (Specify) <div class="div_placeholder_underlined"></div></div>
									</div>
									<div class="text_bold">COMMERCIAL</div>
									<div class="text_font_9">
										<div>21&#09;Bank</div>
										<div>22&#09;Store</div>
										<div>23&#09;Hotel/Motel, Etc.</div>
										<div>24&#09;Office Condominium/Business Office Building</div>
										<div>25&#09;Restaurant, Etc.</div>
										<div>26&#09;Shop (e.g. Dress Shop, Tailoring Shop, Barber Shop etc.)</div>
										<div>27&#09;Gasoline Station</div>
										<div>28&#09;Market</div>
										<div>29&#09;Dormitory or Other Lodging House</div>
										<div>20&#09;Others (Specify) <div class="div_placeholder_underlined"></div></div>
									</div>
									<div class="text_bold">Othery Type of Occupancy</div>
									<div class="text_font_9">
										<div>60&#09;Others (Specify) <div class="div_placeholder_underlined"></div></div>
									</div>
								</div>
								<div class="w3-col l6 m6 s6">
									<div></div>
									<div class="text_bold">INDUSTRIAL</div>
									<div class="text_font_9">
										<div>31&#09;Factory/Plant</div>
										<div>32&#09;Repair Shop, Machine Shpop</div>
										<div>33&#09;Refinery</div>
										<div>34&#09;Printing Press</div>
										<div>35&#09;Warehouse</div>
										<div>30&#09;Others (Specify) <div class="div_placeholder_underlined"></div></div>
									</div>
									<div class="text_bold">INSTITUTIONAL</div>
									<div class="text_font_9">
										<div>41&#09;School</div>
										<div>42&#09;Church and Other Religious Structures</div>
										<div>43&#09;Hospital or Similar Structures</div>
										<div>44&#09;Welfare and Charitable Structures</div>
										<div>45&#09;Theater, Auditorium, Gymnasium, Court</div>
										<div>40&#09;Others (Specify) <div class="div_placeholder_underlined"></div></div>
									</div>
									<div class="text_bold">AGRICULTURAL</div>
									<div class="text_font_9">
										<div>51&#09;Barn (s), Poultry House (s), etc</div>
										<div>52&#09;Grain Mill</div>
										<div>50&#09;Others (Specify) <div class="div_placeholder_underlined"></div></div>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="4" style="padding-left: 3px;">
							<div class="text_font_9 text_bold">Street furniture, Landscaping & Signboards</div>
							<div class="text_font_9">
								<div>71&#09;Parks, Plazas, Monuments, Pools, Plant Boxes, etc</div>
								<div>72&#09;Sidewalks, Promenades, Terraces, Lamposts, Electric Poles, Telephone Poles, etc</div>
								<div>73&#09;Outdoor ads, Signboards, etc</div>
								<div>74&#09;Fence Closure</div>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div class="w3-col l3 m3 s3 w3-center">
				<div>APPENDIX B</div>
				<div>DO NOT FILL-UP (FOR NSO USE)</div>
				<table class="tbl_nso">
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
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
		<div class="bordered">BOX 2 (To be accomplished by the Receiving & Recording Section)</div>
		<div style="border-left: 1px solid black">
			<div class="w3-center">BUILDING DOCUMENTS (FIVE SETS EACH)</div>
			<div class="w3-row">
				<div class="w3-col l6 m6 s6 text_font_9" style="padding-left: 50px">
					<div>SITE DEVELOPMENT AND LOCATION PLAN</div>
					<div>ARCHITECTURAL PLAN & SPECIFICATIONS</div>
					<div>STRUCTURAL DESIGNS AND COMPUTATIONS</div>
					<div>SANITARY/PLUMBING PLANS & SPECIFICATIONS</div>
					<div>ELECTRICAL PLANS & SPECIFICATIONS</div>
				</div>
				<div class="w3-col l6 m6 s6 text_font_9" style="padding-left: 50px">
					<div>MECHANICAL PLANS & SPECIFICATIONS</div>
					<div>LOGBOOK (1 COPY)</div>
					<div>OTHERS (SPECIFY) <div class="div_placeholder_underlined"></div></div>
					<div><div class="div_placeholder_underlined"></div></div>
					<div><div class="div_placeholder_underlined"></div></div>
				</div>
			</div>
		</div>
		<div class="bordered">BOX 3 (To be accomplished by the Building Official)</div>
		<div style="border-left: 1px solid black; border-bottom: 1px solid black">
			<div>Action Taken</div>
			<div>PERMIT IS HEREBY GRANTED SUBJECT TO THE FOLLOWING CONDITION:</div>
			<div class="text_font_9">
				<ol type="1" style="margin: 0px;">
					<li>That the proposed construction/addition/repair/renovation/demolition/installation, etc. shall be in conformity with the national building code (P.D. 109g) and its corresponding implementing rules and regulations.</li>
					<li>That a duly licensed Architect/civil Engineer has been engaged to prepare plans and specifications and to undertake the supervision/inspection of the construction of the project.</li>
					<li>That a certificate of completion duly signed and sealed by the designing architect/engineer and the architect/engineer in-charge of construction shall be submitted not later than seven (7) days after completion of the construction of the project.</li>
					<li>That a "Certificate of Occupancy" shall be secured prior to actual occupancy of the building.</li>
				</ol>
			</div>
			<div style="font-size: 7pt;"><span class="text_bold">Note:</span> This permit may be cancelled or revked pursuant to Section 305 & 306 of the "National Building Code"</div>
		</div>
		<div style="page-break-after: always;">To be accomplished in five copies, one each for: Applicant (original), Assessor, National Statistics Office, Building Official, Fire Department</div>

		<div style="font-size: 10pt">
				<div class="text_bold">BOX 3A (TO BE ACCOMPLISHED BY DESIGNING ARCHITECT/CIVIL ENGINEER IN PRINT)</div>
				<table class="bordered_full" style="width: 100%">
					<tr>
						<td rowspan="7" colspan="3">
							<div class="w3-row">
								<div class="w3-col l8 m8 s8" style="padding: 5px">
									<div>ESTIMATED COST</div>
									<div>BUILDING P<div class="div_placeholder_underlined"></div></div>
									<div>ELECTRICAL P<div class="div_placeholder_underlined"></div></div>
									<div>MECHANICAL P<div class="div_placeholder_underlined"></div></div>
									<div>PLUMBING P<div class="div_placeholder_underlined"></div></div>
									<div>OTHERS P<div class="div_placeholder_underlined"></div></div>
									<div>TOTAL COST P<div class="div_placeholder_underlined"></div></div>
								</div>
								<div class="w3-col l4 m4 s4 bordered" style="padding-left: 3px">
									<div>COST OF EQUIPMENT INSTALLED</div>
									<div>P<div class="div_placeholder_underlined"></div></div>
									<div>P<div class="div_placeholder_underlined"></div></div>
									<div>P<div class="div_placeholder_underlined"></div></div>
								</div>
							</div>
						</td>
						<td rowspan="7" colspan="3">
							<div>NUMBER OF STOREYS<div class="div_placeholder_underlined"></div></div>
							<div>TOTAL FLOOR AREA<div class="div_placeholder_underlined"></div></div>
							<div>PROPOSED DATE OF CONSTRUCTION<div class="div_placeholder_underlined"></div></div>
							<div>EXPECTED DATE OF COMPLETION<div class="div_placeholder_underlined"></div></div>
							<div>MATERIAL OF CONST.<div class="div_placeholder_underlined"></div></div>
							<div>(WOOD, CONC., STEEL, MIXED)</div>
						</td>
						<td colspan="12">
							DO NOT FILL (NSO USE ONLY)
						</td>
					</tr>
					<tr class="tbl_nso_2">
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
						<td></td>
						<td></td>
					</tr>
					<tr class="tbl_nso_2">
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
						<td></td>
						<td></td>
					</tr>
					<tr class="tbl_nso_2">
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
						<td></td>
						<td></td>
					</tr><tr class="tbl_nso_2">
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
						<td></td>
						<td></td>
					</tr>
					<tr class="tbl_nso_2">
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
						<td></td>
						<td></td>
					</tr>
					<tr class="tbl_nso_2">
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
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="6">
							<div class="text_bold">BOX 4 (TO BE ACCOMPLISHED BY THE DIVISION/SECTION CONCERNED)</div>
						</td>
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
						<td></td>
						<td></td>
					</tr>
					<tr style="height: 16pt;">
						<td rowspan="2"></td>
						<td rowspan="2" class="w3-center">AMOUNT DUE</td>
						<td colspan="2" rowspan="2" class="w3-center">ASSESSED BY</td>
						<td rowspan="2" class="w3-center">O.R. NUMBER</td>
						<td rowspan="2"class="w3-center">DATE PAID</td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
					</tr>
					<tr class="tbl_nso_2">
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
					</tr>
					<tr>
						<td>LAND USE/ZONING</td>
						<td class="bordered_full"></td>
						<td class="bordered_full" colspan="2"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
					</tr>
					<tr>
						<td>LINE and GRADE</td>
						<td class="bordered_full"></td>
						<td class="bordered_full" colspan="2"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
					</tr>
					<tr>
						<td>BUILDING</td>
						<td class="bordered_full"></td>
						<td class="bordered_full" colspan="2"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
					</tr>
					<tr>
						<td>PLUMBING</td>
						<td class="bordered_full"></td>
						<td class="bordered_full" colspan="2"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
					</tr>
					<tr>
						<td>ELECTRICAL</td>
						<td class="bordered_full"></td>
						<td class="bordered_full" colspan="2"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
					</tr>
					<tr>
						<td>MECHANICAL</td>
						<td class="bordered_full"></td>
						<td class="bordered_full" colspan="2"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
						<td class="bordered_full"></td>
					</tr>
					<tr>
						<td>OTHERS</td>
						<td class="bordered_full"></td>
						<td class="bordered_full" colspan="2"></td>
						<td class="bordered_full" colspan="14" rowspan="2" style="border-bottom: 1px solid black">
							<div>REVIEWED:</div>
							<div>CHIEF, PROCESSING DIVISION/SECTION</div>
						</td>
					</tr>
					<tr style="border-bottom: 1px solid black">
						<td>TOTAL</td>
						<td class="bordered_full"></td>
						<td class="bordered_full" colspan="2"></td>
					</tr>
				</table>

				<div class="text_bold">BOX 5 (TO BE ACCOMPLISHED BY THE DIVISION/SECTION CONCERNED)</div>
				<table class="bordered_full" style="width: 100%">
					<caption class="text_bold">PROGRESS FLOW</caption>
					<tr>
						<td rowspan="3">
							<div class="text_bold">NOTED:</div>
							<div class="w3-center">CHIEF, PROCESSING DIVISION/SECTION</div>
						</td>
						<td colspan="2" class="w3-center">IN</td>
						<td colspan="2" class="w3-center">OUT</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td class="w3-center">TIME</td>
						<td class="w3-center">DATE</td>
						<td class="w3-center">TIME</td>
						<td class="w3-center">DATE</td>
						<td class="w3-center" rowspan="2">ACTION/<br>Remarks</td>
						<td class="w3-center" rowspan="2">PROCESSED<br>By</td>
					</tr>
					<tr>
						<td><div class="div_placeholder_2"></div></td>
						<td><div class="div_placeholder_2"></div></td>
						<td><div class="div_placeholder_2"></div></td>
						<td><div class="div_placeholder_2"></div></td>
					</tr>
					<tr>
						<td>Receiving and Recording</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Land Use and Zoning</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Geodetic (Line and Grade)</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Architectural</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Structural</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Sanitary/Plumbing</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Electrical</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr style="border-bottom: 1px solid black">
						<td>Mechanical</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>

				<div class="w3-center">
					WE HEREBY AFFIX OUR HANDS AND SIGNIFYING OUR CONFORMITY<br>TO THE INFORMATION HEREIN ABOVE SETFORTH
				</div>

				<div class="w3-row">
					<div class="w3-col l6 m6 s6">
						<div class="text_bold form_label">BOX 6</div>
						<table style="width: 100%">
							<tr class="bordered_full">
								<td>ARCHITECT/CIVIL ENGINEER<br>SIGNED and SEALED PLANS & <br>SPECIFICATIONS</td>
								<td>PRC REG NO. <div class="div_placeholder"></div> <div class="div_placeholder"></div></td>
							</tr>
							<tr class="bordered_full">
								<td colspan="2">
									PRINT NAME
								</td>
							</tr>
							<tr class="bordered_full">
								<td colspan="2" class="">ADDRESS</td>
							</tr>
							<tr class="bordered_full">
								<td colspan="2" class="">PTR. NO.</td>
							</tr>
							<tr class="bordered_full">
								<td colspan="2" class="">SIGNATURE</td>
							</tr>
						</table>
					</div>

					<div class="w3-col l6 m6 s6" style="padding-left: 7px;">
						<div class="text_bold form_label">BOX 8</div>
						<table style="width: 100%;">
							<tr class="bordered_full">
								<td colspan="3">
									<div>SIGNATURE</div>
									<div class="div_placeholder"></div>
									<div class="w3-center">APPLICATION</div>
								</td>
							</tr>
							<tr class="bordered_full">
								<td class="w3-center">Community Tax<br>Cert.</td>
								<td class="w3-center">Date Issued</td>
								<td class="w3-center">Place Issued</td>
							</tr>
							<tr>
								<td class="bordered_full">
									<div style="height: 50px;"><div>
								</td>
								<td class="bordered_full">
									<div style="height: 50px;"><div>
								</td>
								<td class="bordered_full">
									<div style="height: 50px;"><div>
								</td>
							</tr>
						</table>
					</div>
				</div>

				<div class="w3-row">
					<div class="w3-col l6 m6 s6">
						<div class="text_bold"><br>BOX 7</div>
						<table style="width: 100%">
							<tr class="bordered_full">
								<td colspan="2">ARCHITECT/CIVIL ENGINEER<br>IN-CHARGE OF CONSTRUCTION</td>
								<td>PRC REG NO. <div class="div_placeholder"></div> <div class="div_placeholder"></div></td>
							</tr>
							<tr class="bordered_full">
								<td colspan="3">
									PRINT NAME
								</td>
							</tr>
							<tr class="bordered_full">
								<td colspan="3" class="">ADDRESS</td>
							</tr>
							<tr class="bordered_full">
								<td>PTR. NO. <div class="div_placeholder"></div></td>
								<td>DATE ISSUED <div class="div_placeholder"></div></td>
								<td>PLACE ISSUED <div class="div_placeholder"></div></td>
							</tr>
							<tr class="bordered_full">
								<td colspan="2">SIGNATURE</td>
								<td>TAN</td>
							</tr>
						</table>
					</div>
					<div class="w3-col l6 m6 s6" style="padding-left: 7px;">
						<div>WITH MY CONSENT</div>
						<div class="text_bold">BOX 9 (TO BE ACCOMPLISHED BY THE OWNER)</div>
						<table style="width: 100%;">
							<tr class="bordered_full">
								<td class="bordered">TCT NO. <div class="div_placeholder"></div> <div class="div_placeholder"></div></td>
							</tr>
							<tr class="bordered_full">
								<td> PRINT NAME OF LOT OWNER
								</td>
							</tr>
							<tr>
								<td class="bordered_full">ADDRESS</div></td>
							</tr>
							<tr>
								<td class="bordered_full">COMMMUNITY TEXT CERT.<div class="div_placeholder"></div></div></td>
							</tr>
							<tr>
								<td class="bordered_full">SIGNATURE</td>
							</tr>
						</table>
					</div>
				</div>
		</div>
		
	</div>
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
</body>
</html>