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
	<title>Demolition Permit</title>
	<link rel="icon" href="../images/logo_img.png">
	<link rel="stylesheet" href="../css/w3.css">
	<style type="text/css">
		body{
			font-family: "Arial Narrow", sans-serif;
			font-size: 10pt;
			margin: 100px;
		}
		.box_numbers{
			margin: 5px;
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
		<div class="w3-center text_bold" style="font-size: 16pt">DEMOLITION PERMIT</div>
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
		<div class="box_numbers">BOX 1. (TO BE ACCOMPLISHED IN PRINT BY THE OWNER/APPLICANT)</div>
		<table style="width: 100%">
			<tr class="bordered">
				<td style="width: 30%">
					<div class="w3-row">
						<div class="w3-col l8 m8 s8 form_label">OWNER/APPLICANT</div>
						<div class="w3-col l4 m4 s4 form_label">LAST NAME</div>
					</div>
					<div class="div_placeholder">
						<div class="w3-row">
							<div class="w3-col l8 m8 s8">
								<span>--</span>
							</div>
							<div class="w3-col l4 m4 s4">
								<strong><?php echo $applicant_info['lname']; ?></strong>
							</div>
						</div>
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
				<td colspan="4" class="bordered" style="padding-bottom: 5px;">
					<div class="text_bold form_label">SCOPE OF WORK</div>
					<div class="w3-cell-row form_label">
						<div class="w3-cell w3-row">
							<div class="w3-col l4 m4 s4" style="margin-left: 10px">
								<div>&#x2610;<!--change to &#x2612; when ticked--> DEMOLITION</div>
							</div>
							<div class="w3-col l6 m6 s6 w3-border-bottom">
								<div class="div_placeholder"></div>
							</div>
							<div class="w3-col l2 s2 m2"></div>
						</div>
						<div class="w3-cell w3-row" style="margin-left: 10px">
							<div class="w3-col l4 m4 s4">
								<div>&#x2610;<!--change to &#x2612; when ticked--> OTHERS (Specify)</div>
							</div>
							<div class="w3-col l6 m6 s6 w3-border-bottom">
								<div class="div_placeholder"></div>
							</div>
							<div class="w3-col l2 s2 m2"></div>
							<div class="w3-col l10 m10 s10 w3-border-bottom">
								<div class="div_placeholder"></div>
							</div>
							<div class="w3-col l2 s2 m2"></div>
						</div>
					</div>
				</td>
			</tr>
		</table>

		<div class="box_numbers">BOX 2</div>
		<table class="bordered" style="width: 100%">
			<tr>
				<td colspan="3" class="bordered form_label text_bold">FULL-TIME INSPECTOR AND SUPERVISOR OF DEMOLITION WORKS</td>
			</tr>
			<tr>
				<td class="bordered" rowspan="4" style="width: 50%">
					<div class="div_placeholder"></div>
					<div class="w3-row">
						<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
						<div class="w3-col l8 m8 s8 w3-border-bottom">
							<div class="div_placeholder"></div>
						</div>
						<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
					</div>
					<div class="w3-center form_label text_bold">ARCHITECT OR CIVIL ENGINEER</div>
					<div class="w3-center form_label">(Seal and Signature Over Printed Name)</div>
					<div class="w3-row">
						<div class="w3-col l3 m3 s3"><div class="div_placeholder"></div></div>
						<div class="w3-col l1 m1 s1">Date</div>
						<div class="w3-col l5 m5 s5">
							<div class="div_placeholder w3-border-bottom"></div>
						</div>
						<div class="w3-col l3 m3 s3"><div class="div_placeholder"></div></div>
					</div>
				</td>
				<td colspan="2" class="bordered">
					<div class="w3-row form_label">
						<div class="w3-col l8 m8 s8">
							Address
						</div>
						<div class="w3-col l4 m4 s4">
							Tel. No.
						</div>
					</div>
				</td>
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
				<td class="bordered form_label">Issued At</td>
				<td class="bordered form_label">TIN</td>
			</tr>
		</table>

		<div class="box_numbers">BOX 3 (TO BE ACCOMPLISHED BY THE APPLICANT)</div>
		<table class="bordered" style="width: 100%">
			<tr>
				<td colspan="3" class="bordered form_label">APPLICANT:</td>
				<td colspan="3" class="bordered form_label">WITH MY CONSENT : <span class="text_bold">LOT OWNER</span></td>
			</tr>
			<tr>
				<td class="bordered" colspan="3" style="width: 50%">
					<div class="div_placeholder"></div>
					<div class="w3-row">
						<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
						<div class="w3-col l8 m8 s8 w3-border-bottom">
							<div class="div_placeholder"></div>
						</div>
						<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
					</div>
					<div class="w3-center form_label">(Signature Over Printed Name)</div>
					<div class="w3-row">
						<div class="w3-col l3 m3 s3"><div class="div_placeholder"></div></div>
						<div class="w3-col l1 m1 s1">Date</div>
						<div class="w3-col l5 m5 s5">
							<div class="div_placeholder w3-border-bottom"></div>
						</div>
						<div class="w3-col l3 m3 s3"><div class="div_placeholder"></div></div>
					</div>
				</td>
				<td class="bordered" colspan="3" style="width: 50%">
					<div class="div_placeholder"></div>
					<div class="w3-row">
						<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
						<div class="w3-col l8 m8 s8 w3-border-bottom">
							<div class="div_placeholder"></div>
						</div>
						<div class="w3-col l2 m2 s2"><div class="div_placeholder"></div></div>
					</div>
					<div class="w3-center form_label">(Signature Over Printed Name)</div>
					<div class="w3-row">
						<div class="w3-col l3 m3 s3"><div class="div_placeholder"></div></div>
						<div class="w3-col l1 m1 s1">Date</div>
						<div class="w3-col l5 m5 s5">
							<div class="div_placeholder w3-border-bottom"></div>
						</div>
						<div class="w3-col l3 m3 s3"><div class="div_placeholder"></div></div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="3" class="bordered form_label">Address</td>
				<td colspan="3" class="bordered form_label">Address</td>
			</tr>
			<tr>
				<td class="bordered form_label">C.T.C No.</td>
				<td class="bordered form_label">Date Issued</td>
				<td class="bordered form_label">Place Issued</td>
				<td class="bordered form_label">C.T.C No.</td>
				<td class="bordered form_label">Date Issued</td>
				<td class="bordered form_label">Place Issued</td>
			</tr>
		</table>

		<div class="box_numbers">BOX 4</div>
		<div style="page-break-after: always; font-size: 8pt; padding: 3px 5px; border: 1px solid black">
			<div class="w3-row">
				<div class="w3-col l5 m5 s5">REPUBLIC OF THE PHILIPPINES</div>
				<div class="w3-col l7 m7 s7">) S.S</div>
				<div class="w3-col l12 m12 s12">CITY/MUNICIPALITY OF <div class="div_placeholder_underlined"></div></div>
			</div>
			<div style="text-indent: 25px">
				BEFORE ME, at the City/Municipality of <span>____________________________________</span>, on <span>__________________</span> personally appeared the following:
			</div>

			<div class="w3-row">
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
				<div class="w3-col l4 m4 s4 w3-border-bottom"><div class="div_placeholder"><!--APPLICANT NAME--></div></div>
				<div class="w3-col l6 m6 s6 w3-border-bottom">
					<div class="w3-cell-row">
						<div class="w3-cell"><div class="div_placeholder"><!--CTC. NO.--></div></div>
						<div class="w3-cell"><div class="div_placeholder"><!--Date Issued--></div></div>
						<div class="w3-cell"><div class="div_placeholder"><!--Place Issued--></div></div>
					</div>
				</div>
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			</div>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
				<div class="w3-col l4 m4 s4 w3-center">APPLICANT</div>
				<div class="w3-col l6 m6 s6">
					<div class="w3-cell-row">
						<div class="w3-cell w3-center">CTC. No.</div>
						<div class="w3-cell w3-center">Date Issued</div>
						<div class="w3-cell w3-center">Place Issued</div>
					</div>
				</div>
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			</div>

			<div class="w3-row">
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
				<div class="w3-col l4 m4 s4 w3-border-bottom"><div class="div_placeholder"><!--LICENSED ARCHITECT OR CIVIL ENGINEER NAME--></div></div>
				<div class="w3-col l6 m6 s6 w3-border-bottom">
					<div class="w3-cell-row">
						<div class="w3-cell"><div class="div_placeholder"><!--CTC. NO.--></div></div>
						<div class="w3-cell"><div class="div_placeholder"><!--Date Issued--></div></div>
						<div class="w3-cell"><div class="div_placeholder"><!--Place Issued--></div></div>
					</div>
				</div>
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			</div>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
				<div class="w3-col l4 m4 s4 w3-center">
					<div>LICENSED ARCHITECT OR CIVIL ENGINEER</div>
					<div style="font-size: 7pt;">(Full-Time Inspector and Supervisor of Demolition Works)</div>
				</div>
				<div class="w3-col l6 m6 s6">
					<div class="w3-cell-row">
						<div class="w3-cell w3-center">CTC. No.</div>
						<div class="w3-cell w3-center">Date Issued</div>
						<div class="w3-cell w3-center">Place Issued</div>
					</div>
				</div>
				<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
			</div>

			<div style="padding-top: 5px">whose signatures appeared herin above, known to me to be the same persons who executed this standard prescribed form and acknowledged to me that the same is their free and voluntary act and deed.</div>
			<div style="text-indent: 25px">
				WITHNESS MY HAND AND SEAL on the dte and place above written.
			</div>

			<div class="w3-row">
				<div class="w3-col l1 m1 s1">Doc. No.</div>
				<div class="w3-col l3 m3 s3 w3-border-bottom">
					<div class="div_placeholder_2"><!--DOC NO.--></div>
				</div>
				<div class="w3-col l3 m3 s3"><div class="div_placeholder_2"></div></div>
				<div class="w3-col l4 m4 s4 w3-border-bottom">
					<div class="div_placeholder_2"><!--NOATRY PUBLIC--></div>
				</div>
				<div class="w3-col l1 m1 s1"><div class="div_placeholder_2"></div></div>
			</div>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1">Page No.</div>
				<div class="w3-col l3 m3 s3 w3-border-bottom">
					<div class="div_placeholder_2"><!--PAGE NO.--></div>
				</div>
				<div class="w3-col l3 m3 s3"><div class="div_placeholder_2"></div></div>
				<div class="w3-col l4 m4 s4 w3-center">NOTARY PUBLIC (Until December <span>__________</span>)</div>
				<div class="w3-col l1 m1 s1"><div class="div_placeholder_2"></div></div>
			</div>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1">Book No.</div>
				<div class="w3-col l3 m3 s3 w3-border-bottom">
					<div class="div_placeholder_2"><!--BOOK NO.--></div>
				</div>
				<div class="w3-col l8 m8 s8"><div class="div_placeholder_2"></div></div>
			</div>
			<div class="w3-row">
				<div class="w3-col l1 m1 s1">Series No.</div>
				<div class="w3-col l3 m3 s3 w3-border-bottom">
					<div class="div_placeholder_2"><!--SERIES NO.--></div>
				</div>
				<div class="w3-col l8 m8 s8"><div class="div_placeholder_2"></div></div>
			</div>
		</div>

		<!--PAGE BREAK!-->

		<div class="box_numbers">BOX 5 (TO BE ACCOMPLISHED BY THE PROCESSING AND EVALUATION DIVISION)</div>
		<div style="border: 1px solid black; padding: 5px 25px;">
			<div class="w3-row">
				<div class="w3-col l6 m6 s6">
					<div class="w3-row">
						<div class="w3-col l3 m3 s3">FEE PAID</div>
						<div class="w3-col l9 m9 s9 w3-border-bottom w3-center"><div class="div_placeholder"><!--FEE PAID--></div></div>
					</div>
					<div class="w3-row">
						<div class="w3-col l3 m3 s3">DATE PAID</div>
						<div class="w3-col l9 m9 s9 w3-border-bottom w3-center"><div class="div_placeholder"><!--DATE PAID--></div></div>
					</div>
				</div>
				<div class="w3-col l6 m6 s6" style="padding-left: 25px;">
					<div class="w3-row">
						<div class="w3-col l6 m6 s6">OFFICIAL RECEIPT NO.</div>
						<div class="w3-col l6 m6 s6 w3-border-bottom w3-center"><div class="div_placeholder"><!--OFFICIAL RECEIPT NO.--></div></div>
					</div>
					<div class="w3-row">
						<div class="w3-col l4 m4 s4">DATE ISSUED</div>
						<div class="w3-col l8 m8 s8 w3-border-bottom w3-center"><div class="div_placeholder"><!--DATE ISSUED--></div></div>
					</div>
				</div>
			</div>
		</div>

		<div class="box_numbers">BOX 6</div>
		<div style="padding: 5px 10px; border: 1px solid black">
			<div class="text_bold">ACTION TAKEN:</div>
			<div class="w3-row">
				<div class="w3-col" style="width: 220px">
					Permit is hereby granted to demolish your
				</div>
				<div class="w3-rest w3-border-bottom">
					<div class="div_placeholder"><!--INSERT--></div>
				</div>
				<div class="w3-col l12 m12 s12 w3-border-bottom">
					<div class="div_placeholder"><!--INSERT--></div>
				</div>
				<div class="w3-col l12 m12 s12">subject to the following:</div>
			</div>
			<ol type="1" style="margin: 0px!important">
				<li>The demolition shall be undertaken in accordance with Rule XI on protection and safety requirements for construction and demolition of building/structure of the Implementing Rules and Regulations of the National Building Code of the Philippines (P.D. 1096) and shall be under the direct responsibility of a full time supervising Architect or Civil Engineer in charge of demolition.</li>
				<li>The demolition shall be undertaken only after the building has been vacated and all utility lines such as electric, gas, telephone and water installations have been disconnected.</li>
				<li>The demolition work/s by this permit shall be completed within a period of <span class="div_placeholder_underlined">______________</span> (<span> </span>) days from starting date thereof.</li>
				<li>Demolition</li>
				<ol type="a">
					<li>Precautions before demolition</li>
					<ol type="i">
						<li>Before commencing the work of demolition of a building/structure, all gas, electric, water and other meters shall be removed and the supply lines disconnected, except such as are especially provided or required for use in connection with the work of demolition.</li>
						<li>All fittings attached to the building and connected to any street lighting system, electrical supply or other utilities shall be removed.</li>
						<li>All electric power shall be shut off and all electric service lines shall be cut and disconnected by the power company at or outside the property line.</li>
						<li>All gas, water and other utility service lines shall be shut off and cut or capped, or otherwise controlled at or outside the building line. In each case, the utility company involved shall be notified in advance and its approval or cooperation obtained.</li>
						<li>No electric or other apparatus, other than those especially required for use in connection with the demolition work, shall remain electrically charged during demolition operations. When it is necessary to maintain any power, water or other uility lines during the process of demolition, such lines shall be temporarily relocated and protected with substantial covering to the saisfaction of the utility company concerned.</li>
						<li>All necessary steps shall be taken to prevent danger to persons arising from fire or explosion from leakage or accumulation of gas or vapor, and from flooding from uncapped water mains, sewers and/or culverts.</li>
						<li>Al entrances/exits to and from the building shall be property protected so as prevent any danger to persons engaged in the demolition work using such entrances/exits in the performance of their work.</li>
						<li>Glazed sashes and glazed doors shall be removed before the start of demolition operations.</li>
					</ol>
				</ol>
				<li>At least five (5) days before actual demolition work is started, you are required to advise the Office of the Building Official in writing.</li>
				<li>Strict compliance with the above conditions is required subject to monitoring by this Office of the Building Official and revocation of this permit in case of violation.</li>
			</ol>
			<p class="text_bold">PERMIT ISSUED BY:</p>
			<div class="w3-center">_________________________</div>
			<div class="w3-center text_bold">BUILDING OFFICIAL</div>
			<div class="w3-center">(Signature Over Printed Name)</div>
			<div class="w3-center">Date <div class="div_placeholder_underlined"><!--DATE SIGNED--></div></div>
		</div>
	</div>
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
</body>
</html>