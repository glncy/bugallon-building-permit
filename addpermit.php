<!DOCTYPE html>
<html>
<head>
	<title>Add New Permit | OBO-Bugallon Office</title>
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

	<!--MODALS!-->

	<div id="modal_clear_form" class="w3-modal">
	  	<div class="w3-modal-content">
	   		<header class="w3-container">
	      		<h2>Confirm</h2>
	    	</header>
	    	<div class="w3-container">
	      		<p>Are you sure you want to delete form? Any changes will not be saved.</p>
	    	</div>
	    	<footer class="w3-container w3-bar w3-padding-16">
	      		<button class="w3-bar-item w3-button w3-round-xxlarge" onclick="document.getElementById('form').remove()">Yes</button>
	      		<button class="w3-bar-item w3-button w3-round-xxlarge" onclick="document.getElementById('modal_clear_form').style.display='none'">No</button>
	    	</footer>
	  	</div>
	</div>

	<div id="modal_adding_applicant" class="w3-modal">
	  	<div class="w3-modal-content">
	   		<header class="w3-container">
	      		<center><h2>Submitting Applicant...</h2></center>
	    	</header>
	  	</div>
	</div>

	<div id="modal_save_form" class="w3-modal">
	  	<div class="w3-modal-content">
	   		<header class="w3-container">
	      		<h2>Confirm</h2>
	    	</header>
	    	<div class="w3-container">
	      		<p>Are you sure you want to save form contents?</p>
	    	</div>
	    	<footer class="w3-container w3-bar w3-padding-16">
	      		<button class="w3-bar-item w3-button w3-round-xxlarge" onclick="saveForm()">Yes</button>
	      		<button class="w3-bar-item w3-button w3-round-xxlarge" onclick="document.getElementById('modal_save_form').style.display='none'">No</button>
	    	</footer>
	  	</div>
	</div>
	<?php
	if ((isset($_GET['type']))&&(isset($_GET['id']))) {
	?>
	<div id="modal_form_saved" class="w3-modal" style="display: initial;">
	  	<div class="w3-modal-content">
	   		<header class="w3-container">
	   			<span onclick="document.getElementById('modal_form_saved').style.display='none'" class="w3-button w3-display-topright"><a href="addpermit.php"><i class="demo-icon icon-cancel-1"></i></a></span>
	      		<h2><i class="demo-icon icon-ok-1"></i>Permit Successfully Saved!</h2>
	    	</header>
	    	<div class="w3-container w3-bar w3-padding-16">
	      		<!--<button class="w3-bar-item w3-button w3-round-xxlarge"><i class="demo-icon icon-plus-1"></i> Add New Permit</button>-->
	      		<a class="w3-bar-item w3-button w3-round-xxlarge" id="btn_print" onclick="printPermit('<?= $_GET['type'] ?>','<?= $_GET['id'] ?>')"><i class="demo-icon icon-print-2"></i> Print</a>
	    	</div>
	  	</div>
	</div>
	<?php
	}
	?>

	<div id="modal_existing_building" class="w3-modal">
	  	<div class="w3-modal-content">
	   		<header class="w3-container">
	   			<span onclick="document.getElementById('modal_existing_building').style.display='none'" class="w3-button w3-display-topright"><a href="#"><i class="demo-icon icon-cancel-1"></i></a></span>
	      		<h2>Existing Building</h2>
			</header>
			<div class="w3-container">
				<div class="w3-cell-row">	
					<div class="w3-cell" id="exist_data">
					</div>
				</div>
	    	</div>
	    	<div class="w3-container w3-bar w3-padding-16">
	      		<button type="button" class="w3-bar-item w3-button w3-round-xxlarge" onclick="newBuilding();"><i class="demo-icon icon-plus-1"></i> Add New Building</button>
	    	</div>
	  	</div>
	</div>

	<div id="main">
		<div class="w3-container cont_content">
			<!-- <form method="GET" id="form_search_applicant">
				<div class="w3-row">
					<div class="w3-quarter w3-cell w3-cell-middle w3-center">
						<h6>Search Applicant:</h6>
					</div>
					<div class="w3-threequarter w3-cell w3-cell-middle">
						<input class="w3-input w3-border w3-round-xlarge" type="text" name="applicant">
						<button class="w3-button w3-round-xxlarge"><i class="demo-icon icon-search"></i> </button>
					</div>
				</div>
			</form> -->
			<div id="selectApplicant">
				<div class="w3-bar" style="padding-top: 20px; padding-bottom: 10px;">
					<button class="w3-button w3-blue w3-round-xxlarge" onclick="showNewApplicant();">New Applicant</button>
					<button class="w3-button w3-red w3-round-xxlarge" onclick="showExistingApplicant();">Existing Applicant</button>
				</div>
				<div class="w3-cell-row w3-row contold" style="display:none;" id="existingApplicant">
					<div class="w3-col l12 m12 w3-cell">
						<div class="w3-card w3-round-large w3-white">
							<div class="w3-container">
								<div class="w3-cell-row">	
									<div class="w3-cell">
										<table class="w3-table w3-bordered display dataTable" id="data_table" style="width:100%;">
											<thead>
												<tr>
													<th class="tableheaders">First Name</th>
													<th class="tableheaders">Last Name</th>
													<th class="tableheaders">M.I.</th>
													<th class="tableheaders">Action</th> 
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
				<div class="w3-cell-row w3-row contold" id="newApplicant">
					<div class="w3-col l12 m12 w3-cell">
						<div class="w3-card w3-round-large w3-white">
							<div class="w3-container">
								<h3>Applicant Information</h3>
							</div>
							<div class="w3-container">
								<h6>Name of Owner/Applicant</h6>
							</div>
							<div class="w3-container">
								<div class="w3-cell-row">	
									<div class="w3-cell">
										<label>Last Name</label>
										<input class="w3-input" type="text" id="lname">
									</div>
									<div class="w3-cell">
										<label>First Name</label>
										<input class="w3-input" type="text" id="fname">
									</div>
									<div class="w3-cell">
										<label>MI</label>
										<input class="w3-input" type="text" id="mi">
									</div>
									<div class="w3-cell">
										<label>TIN</label>
										<input class="w3-input" type="text" id="tin">
									</div>
								</div>
								<div class="w3-cell-row">
									<div class="w3-cell">
										<label>Add. No.</label>
										<input class="w3-input" type="text" id="add_no">
									</div>
									<div class="w3-cell">
										<label>Street</label>
										<input class="w3-input" type="text" id="street">
									</div>
								</div>
								<div class="w3-cell-row">
									<div class="w3-cell">
										<label>Barangay</label>
										<input class="w3-input" type="text" id="barangay">
									</div>
									<div class="w3-cell">
										<label>Municipality</label>
										<input class="w3-input" type="text" id="municipality">
									</div>
									<div class="w3-cell">
										<label>ZIP Code</label>
										<input class="w3-input" type="text" id="zip_code">
									</div>
									<div class="w3-cell">
										<label>Tel/Fax No.</label>
										<input class="w3-input" type="text" id="tel_no">
									</div>
								</div>
								<br/>
								<button class="w3-button w3-round-xxlarge w3-green w3-large" onclick="newData();">Submit</button>
							</div>
						</div>
					</div>

					<!-- <div class="w3-col l6 m12 w3-cell">
						<div class="w3-card w3-white w3-round-large">
							<div class="w3-container">
								<h3>Buildings Registered (<span></span>)</h3>
							</div>
							<div class="w3-container">
								<h6>Building Information</h6>
							</div>
							<div class="w3-container">
								<div class="w3-cell-row">
									<div class="w3-cell">
										<label>Lot No.</label>
										<input class="w3-input" type="text">
									</div>
									<div class="w3-cell">
										<label>Blk No.</label>
										<input class="w3-input" type="text">
									</div>
									<div class="w3-cell">
										<label>TCT No.</label>
										<input class="w3-input" type="text">
									</div>
									<div class="w3-cell">
										<label>Tax Dec. No.</label>
										<input class="w3-input" type="text">
									</div>
								</div>
								<div class="w3-cell-row">
									<div class="w3-cell">
										<label>Street</label>
										<input class="w3-input" type="text">
									</div>
									<div class="w3-cell">
										<label>Barangay</label>
										<input class="w3-input" type="text">
									</div>
									<div class="w3-cell">
										<label>Municipality</label>
										<input class="w3-input" type="text">
									</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
			
			<!--ADD NEW PERMIT BUTTON !-->
			<div style="display:none;" id="forms_to_fill">
				<div class="w3-row" id="cont_add_permit">
					<div class="w3-quarter w3-cell w3-cell-middle w3-center">
						<h6>Add Permit:</h6>
					</div>
					<div class="w3-threequarter w3-cell w3-cell-middle">
						<select class="w3-select w3-round-xxlarge" name="permit" id="sel_permit">
							<!-- <option disabled selected>Select one...</option>
							<option value="agricultural">Agricultural Engineering Permit</option>
							<option value="building">Building Permit</option>
							<option value="demolition">Demolition Permit</option>
							<option value="electrical">Electrical Permit</option>
							<option value="electronics">Electronics Permit</option>
							<option value="fencing">Fencing Permit</option>
							<option value="mechanical">Mechanical Permit</option>
							<option value="sanitary">Sanitary/Plumbing Permit</option> -->
						</select>
						<button class="w3-button w3-round-xxlarge" onclick="loadForm()"><i class="demo-icon icon-plus-1"></i> </button>
					</div>
				</div>

				<!--FORM CONTAINER!-->
				<div id="contform">
					<form method="POST" action="process/add_form.php" id="form_permit">
						<div id="buildingid_holder">
						</div>
						<div id="form" w3-include-html="">
						</div>
					</form>
					<br/>
					<footer class="w3-row">
						<div class="w3-col l6 m6 w3-padding-small">
							<button class="w3-button w3-round-xxlarge w3-block" onclick="document.getElementById('modal_clear_form').style.display='block'" id="btn_remove_forms" disabled>REMOVE FORM</button>
						</div>
						<div class="w3-col m6 l6 w3-padding-small">
							<button class="w3-button w3-round-xxlarge w3-block" onclick="document.getElementById('modal_save_form').style.display='block'" id="btn_save_forms" disabled>SAVE</button>
						</div>
					</footer>
				</div>
			</div>	
		</div>

	</div>

	

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/w3.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(window).ready(function(){
			$("#data_table").DataTable({
				"ajax" : {
					"url" : "process/get_applicants.php",
					"dataSrc": ""
				},
				"columns" : [
					{ data : "fname"},
					{ data : "lname"},
					{ data : "mi"},
					{ data : "id" , 
						render : function (data, type, row) {
							var temp = '<input type="hidden" value=\''+JSON.stringify(row)+'\' id="dataHandler_'+data+'"><button onclick="dataSelect('+data+')">Select</button>';
							return temp;
						}
					}
				]
			});
		});
	</script>
</body>
</html>