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
	<title>Fencing Permit</title>
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
		<div>*********</div>
		<div class="w3-center text_bold">Republic of the Philippines</div>
		<div class="w3-center">City Municipality of <span></span></div>
		<div class="w3-center">Province of <span></span></div>		
		<div class="w3-center text_bold">OFFICE OF THE BUILDING OFFICIAL</div>
		<div class="w3-center text_bold" style="font-size: 16pt">FENCING PERMIT</div>
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
						<th colspan="9">FP NO.</th>
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
				<td class="w3-center form_label">FIRST NAME<div class="div_placeholder"><<strong><?php echo $applicant_info['fname']; ?></strong>/div></td>
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
					<div class="w3-row form_label" style="margin: 0px 10px; font-size: 8pt">
						<div class="w3-col l4 m4 s4">
							<div>&#x2610;<!--change to &#x2612; when ticked--> NEW CONSTRUCTION</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div class="w3-row">
								<div class="w3-col l4 m4 s4">
									<div>&#x2610;<!--change to &#x2612; when ticked--> REPAIR</div>
								</div>
								<div class="w3-col l7 m7 s7 w3-border-bottom">
									<div class="div_placeholder"></div>
								</div>
							</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div class="w3-row">
								<div class="w3-col l5 m5 s5">
									<div>&#x2610;<!--change to &#x2612; when ticked--> OTHERS (Specify)</div>
								</div>
								<div class="w3-col l6 m6 s6 w3-border-bottom">
									<div class="div_placeholder"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="w3-row form_label" style="margin: 0px 10px; font-size: 8pt;">
						<div class="w3-col l4 m4 s4">
							<div>&#x2610;<!--change to &#x2612; when ticked--> ERECTION</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div class="w3-row">
								<div class="w3-col l4 m4 s4">
									<div>&#x2610;<!--change to &#x2612; when ticked--> DEMOLITION</div>
								</div>
								<div class="w3-col l7 m7 s7 w3-border-bottom">
									<div class="div_placeholder"></div>
								</div>
							</div>
						</div>
						<div class="w3-col l4 m4 s4">
							<div class="w3-row">
								<div class="w3-col l11 m11 s11 w3-border-bottom">
									<div class="div_placeholder"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="w3-row form_label" style="margin: 0px 10px; font-size: 8pt">
						<div class="w3-col l4 m4 s4">
							<div>&#x2610;<!--change to &#x2612; when ticked--> ADDITION</div>
						</div>
					</div>
				</td>
			</tr>
		</table>

		<div class="w3-row">
			<div class="w3-col l6 m6 s6">
				<div class="box_numbers">BOX 2</div>
				<table style="width: 100%">
					<tr class="bordered">
						<td colspan="2" class="form_label text_bold">DESIGN PROFESSIONAL, PLANS & SPECIFICATIONS<br></td>
					</tr>
					<tr class="bordered">
						<td colspan="2">
							<div class="w3-row" style="padding-top: 30px;">
								<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
								<div class="w3-col l7 m7 s7 w3-border-bottom w3-center">
									<div class="div_placeholder"><!--ARCHITECT OR CIVIL ENGINEER NAME--></div>
								</div>
								<div class="w3-col l1 m1 s1 w3-right-align">
									Date
								</div>
								<div class="w3-col l2 m2 s2 w3-border-bottom w3-center">
									<div class="div_placeholder"><!--ARCHITECT OR CIVIL ENGINEER NAME--></div>
								</div>
								<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
							</div>
							<div class="w3-center form_label text_bold">ARCHITECT OR CIVIL ENGINEER</div>
							<div class="w3-center form_label">(Signed and Sealed Over Printed Name)</div>
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
			<div class="w3-col l6 m6 s6" style="padding-left: 10px">
				<div class="box_numbers">BOX 3</div>
				<table style="width: 100%">
					<tr class="bordered">
						<td colspan="2" class="form_label text_bold">FULL-TIME INSPECTOR AND SUPERVISOR OF CONSTRUCTION WORKS<br></td>
					</tr>
					<tr class="bordered">
						<td colspan="2">
							<div class="w3-row" style="padding-top: 30px;">
								<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
								<div class="w3-col l7 m7 s7 w3-border-bottom w3-center">
									<div class="div_placeholder"><!--ARCHITECT OR CIVIL ENGINEER NAME--></div>
								</div>
								<div class="w3-col l1 m1 s1 w3-right-align">
									Date
								</div>
								<div class="w3-col l2 m2 s2 w3-border-bottom w3-center">
									<div class="div_placeholder"><!--ARCHITECT OR CIVIL ENGINEER NAME--></div>
								</div>
								<div class="w3-col l1 m1 s1"><div class="div_placeholder"></div></div>
							</div>
							<div class="w3-center form_label text_bold">ARCHITECT OR CIVIL ENGINEER</div>
							<div class="w3-center form_label">(Signed and Sealed Over Printed Name)</div>
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

		<div class="box_numbers">BOX 4 (TO BE ACCOMPLISHED BY THE APPLICANT)</div>
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

		<div class="box_numbers">BOX 5</div>
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
					<div style="font-size: 7pt;">(Full-Time Inspector and Supervisor of Fencing Works)</div>
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

		<div class="box_numbers">BOX 6 (TO BE ACCOMPLISHED BY THE DESIGN PROFESSIONAL)</div>
		<div style="font-size: 8pt; padding: 3px 5px; border: 1px solid black">
			<div class="w3-row">
				<div class="w3-col l2 m2 s2">MEASUREMENTS</div>
				<div class="w3-col l3 m3 s3 w3-border-bottom"><div class="div_placeholder"></div></div>
				<div class="w3-col l2 m2 s2">LENGTH IN METERS</div>
				<div class="w3-col l3 m3 s3 w3-border-bottom"><div class="div_placeholder"></div></div>
				<div class="w3-col l2 m2 s2">HEIGHT IN METERS</div>
			</div>
			<div class="w3-row">
				<div class="w3-col l2 m2 s2">TYPE OF FENCING</div>
				<div class="w3-col l5 m5 s5">
					<div>&#x2610;<!--change to &#x2612; when ticked--> INDIGENOUS MATERIALS</div>
					<div>&#x2610;<!--change to &#x2612; when ticked--> R.C. (*** ***)</div>
					<div>&#x2610;<!--change to &#x2612; when ticked--> R.C. and *** HOLLOW BLOCKS</div>
					<div>&#x2610;<!--change to &#x2612; when ticked--> R.C. and BRICKS</div>
					<div>&#x2610;<!--change to &#x2612; when ticked--> R.C. and *** WIRE</div>
				</div>
				<div class="w3-col l5 m5 s5">
					<div>&#x2610;<!--change to &#x2612; when ticked--> R.C. (*** ***)</div>
					<div>&#x2610;<!--change to &#x2612; when ticked--> R.C. (*** ***)</div>
					<div>&#x2610;<!--change to &#x2612; when ticked--> OTHERS (Specify)<span class="div_placeholder w3-border-bottom"></div></span>					
					<div>&#x2610;<!--change to &#x2612; when ticked--> <span class="div_placeholder w3-border-bottom"></div></div>
					<div>&#x2610;<!--change to &#x2612; when ticked--> <span class="div_placeholder w3-border-bottom"></div></div>
				</div>
			</div>
		</div>
		
		<div class="box_numbers">BOX 7</div>
		<table style="width: 100%;">
			<tr>
				<td class="bordered w3-center text_bold" colspan="6">PROGRESS FLOW</td>
			</tr>
			<tr>
				<td class="bordered" rowspan="2"></td>
				<td class="bordered w3-center text_bold" colspan="2">IN</td>
				<td class="bordered w3-center text_bold" colspan="2">OUT</td>
				<td class="bordered w3-center text_bold" rowspan="2">PROCESSED BY</td>
			</tr>
			<tr>
				<td class="bordered w3-center text_bold">DATE</td>
				<td class="bordered w3-center text_bold">TIME</td>
				<td class="bordered w3-center text_bold">DATE</td>
				<td class="bordered w3-center text_bold">TIME</td>
			</tr>
			<tr>
				<td class="bordered" style="padding-left: 10px">LINE AND GRADE (GEODETIC)</td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
			</tr>
			<tr>
				<td class="bordered" style="padding-left: 10px">CIVIL/STRUCTURAL</td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
			</tr>
			<tr>
				<td class="bordered" style="padding-left: 10px">ELECTRICAL</td>
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
		</table>
		<table style="width: 100%">
			<tr>
				<td class="bordered w3-center text_bold" colspan="6" style="border-top: none">ASSESSED FEES</td>
			</tr>
			<tr>
				<td class="bordered"></td>
				<td class="bordered w3-center text_bold">Amount Due</td>
				<td class="bordered w3-center text_bold">O.R. Number</td>
				<td class="bordered w3-center text_bold">Date Paid</td>
				<td class="bordered w3-center text_bold">Processed By</td>
			</tr>
			<tr>
				<td class="bordered" style="padding-left: 10px">LINE AND GRADE (GEODETIC)</td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
			</tr>
			<tr>
				<td class="bordered" style="padding-left: 10px">FENCING</td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
			</tr>
			<tr>
				<td class="bordered" style="padding-left: 10px">ELECTRICAL (If Any)</td>
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
			</tr>
			<tr>
				<td class="bordered"style="padding-left: 10px"><div class="div_placeholder"></div></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
			</tr>
			<tr>
				<td class="bordered text_bold" style="text-align: right; padding-right: 5px">TOTAL</td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
				<td class="bordered"></td>
			</tr>
		</table>

		<div class="box_numbers">BOX 8 (TO BE ACCOMPLISHED BY THE BUILDING OFFICIAL)</div>
		<div class="bordered" style="padding: 10px 5px">
			<div class="text_bold">ACTION TAKEN:</div>
			<p class="text_bold">PERMIT IS HEREBY ISSUED SUBJECT TO THE FOLLOWING CONDITIONS:</p>
			<ol type="1" style="margin: 0px!important">
				<li>That under Article 1723 of the Civil Code if the Philippines, the engineer or architect who draw up the plans and specifications is liable for damages within fifteen (15) years from tge completion of the structure. It should collapse due to defect in the plans or specifications or defects in the ground. The engineer or architect who supervises the construction shall be solidarily liable with the constractor should the edifice collapse due to defect in the construction or the use of inferior materials.</li>
				<li>That the proposed construction/erection/addition, etc. shall be in conformrity with the provisions of the "National Buillding Code" (P.D. ****) and its Implementing Rules and Regulations.</li>
				<ol type="a">
					<li>That prior to any commencement of the proposed projects and construction an actual relocation survey shall be conducted by responsible licensed Geodetic Engineer.</li>
					<li>That before commending the excavation the person making or causing the escavation to be made shall verify in writing the owner of adjoining building not less than ten (10) days before such escavation is to be made and show how the adjoining building should be protected.</li>
					<li>That the owner of the fennce shall engage the services of responsible licensed Architect or Civil Engineer to *** the full time inspection and supervision of the construction work.</li>
					<li>That there shall be kept at the jobsites at all times a logbook wherein the actual progress of construcion including test conducted, weather condition and other perfinent data are to be recorded, same shall be made available to scrutiny and comments by the OBO representative during the conduct of his/her inspection pursuant to Section 2017 of the Naional Building Code.</li>
				</ol>
			</ol>
			<div style="height: 20px"></div>
			<p class="text_bold">PERMIT ISSUED BY:</p>
			<div style="height: 50px"></div>
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