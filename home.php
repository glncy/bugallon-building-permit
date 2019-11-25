<?php
include('process/auth.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | OBO-Bugallon Office</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo_img.png">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/obofonticon.css">
	<style type="text/css">
		body{
			font-family: "Microsoft JengHei", sans-serif;
			background: #99CC00;
			height: 100vh;
		}
		.w3-modal-content{
			width: 50%;
		}
		.w3-modal-content footer .w3-round-xxlarge{
			background: #0099CC; 
			color: white; 
			width: 50%;
		}
		.cont_dashboard{
			width: 100vw;
			padding: 0px 30%;
		}
		.cont_dashboard > div{
			background: white;
		}
		.cont_dashboard .w3-section{
			padding: 0px 5%;
		}
		.cont_dashboard .w3-section:last-child{
			padding-bottom: 5%;
		}
		h2{
			padding-top: 5%;
			font-weight: 500;
		}
		.cont_dashboard .l6{
			padding: 0px 10px;
		}
		.cont_dashboard .home_buttons{
			width: 100%;
			height: 200px;
			color: white;
			background: #0099CC;
		}
		.cont_dashboard i{
			font-size: 40pt;
		}
		.cont_dashboard #content{
			height: 100%!important; 
			width: 100%!important; 
			padding: 25px;
		}
		.cont_dashboard #hometext{
			font-size: 16pt;
			font-weight: 500;
			text-overflow: clip;
		}
		.footer{
			background-color: #e4e0da;
			position: absolute;
			bottom: 0px;
			width: 100vw;
		}
		@media screen and (max-width: 676px){
			.cont_dashboard{
				 padding: 0px 50px;
			}
		}
		@media screen and (min-width: 677px) and (max-width: 1024px){
			.cont_dashboard{
				 padding: 0px 100px;
			}
		}
	</style>
</head>
<body class="w3-cell w3-cell-middle">
	<div id="modal_profile_setting" class="w3-modal">
	  	<div class="w3-modal-content">
	   		<header class="w3-container">
	      		<h3>Change Password</h3>
	    	</header>
	    	<div class="w3-container">
				<form id="changePassword" action="process/change_password.php" method="POST">
					<label>Current Password</label>
					<input class="w3-input" type="password" name="currentPw">
					<br/>
					<label>New Password</label>
					<input class="w3-input" type="password" name="newPw">
					</br>
					<label>Re-type New Password</label>
					<input class="w3-input" type="password" name="retypeNewPw">
				</form>				
	    	</div>
	    	<footer class="w3-container w3-bar w3-padding-16">
	      		<button class="w3-bar-item w3-button w3-round-xxlarge" onclick="document.getElementById('modal_profile_setting').style.display='none'">Cancel</button>
	      		<button class="w3-bar-item w3-button w3-round-xxlarge" onclick="document.getElementById('changePassword').submit();">Save</button>
	    	</footer>
	  	</div>
	</div>

	<div id="modal_logout" class="w3-modal">
	  	<div class="w3-modal-content">
	   		<header class="w3-container">
	      		<h3>Logout</h3>
	    	</header>
	    	<div class="w3-container">
	      		Are you sure you want to logout?	
	    	</div>
	    	<footer class="w3-container w3-bar w3-padding-16">
	      		<button class="w3-bar-item w3-button w3-round-xxlarge" onclick="document.getElementById('modal_logout').style.display='none'">No</button>
	      		<a class="w3-bar-item w3-button w3-round-xxlarge"  href="logout.php">Yes</a>
	    	</footer>
	  	</div>
	</div>

	<div class="w3-container cont_dashboard">
		<div class="w3-card w3-round-large">
			<h2 class="w3-center">DASHBOARD</h2>
			<div class="w3-row w3-section">
				<div class="w3-col l6 m6">
					<a class="w3-button w3-round-xlarge home_buttons" href="addpermit.php">
						<div id="content">
							<i class="demo-icon icon-doc-add"></i>
							<div id="hometext">ADD</div>
						</div>
					</a>	
				</div>
				<div class="w3-col l6 m6">
					<a class="w3-button w3-round-xlarge home_buttons" href="archive.php">
						<div id="content">
							<i class="demo-icon icon-archive"></i>
							<div id="hometext">VIEW</div>
						</div>
					</a>
				</div>
			</div>
			<div class="w3-row w3-section">
				<div class="w3-col l6 m6">
					<button class="w3-button w3-round-xlarge home_buttons" onclick="document.getElementById('modal_profile_setting').style.display='initial'">
						<div id="content">
							<i class="demo-icon icon-wrench-outline"></i>
							<div id="hometext" style="margin-left: -26%;">CHANGE PASSWORD</div>
						</div>
					</button>	
				</div>
				<div class="w3-col l6 m6">
					<button class="w3-button w3-round-xlarge home_buttons" onclick="document.getElementById('modal_logout').style.display='initial'">
						<div id="content">
							<i class="demo-icon icon-power-outline"></i>
							<div id="hometext">LOGOUT</div>
						</div>
					</button>
				</div>
			</div>	
		</div>
	</div>

	<footer class="w3-center footer">
	    <p>Bugallon Office <i class="fa fa-copyright"></i>&copy; Copyright 2019</p>
	 </footer>

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">

	</script>
</body>
</html>