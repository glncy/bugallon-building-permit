<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo_img.png">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/obofonticon.css">
	<style type="text/css">
		body{
			font-family: "Microsoft JengHei", sans-serif;
			background: #99CC00;
		}
		.w3-sidebar{
			font-size: 13pt;
		}
		#mySidebar a:hover, #mySidebar button:hover{
			color: #0099CC!important;
		}
	</style>
</head>
<body>

	<div id="modal_profile_setting" class="w3-modal">
	  	<div class="w3-modal-content" style="width: 50%">
	   		<header class="w3-container">
	      		<h2>Profile Setting</h2>
	    	</header>
	    	<div class="w3-container">
	      		<label>Password</label>
				<input class="w3-input" type="text">
				<label>Re-type password</label>
				<input class="w3-input" type="text">				
	    	</div>
	    	<footer class="w3-container w3-bar w3-padding-16">
	      		<button class="w3-bar-item w3-button w3-round-xxlarge" style="background: #0099CC; color: white; width: 50%" onclick="document.getElementById('modal_profile_setting').style.display='none'">Cancel</button>
	      		<button class="w3-bar-item w3-button w3-round-xxlarge" style="background: #0099CC; color: white; width: 50%" onclick="document.getElementById('modal_profile_setting').style.display='none'">Save</button>
	    	</footer>
	  	</div>
	</div>

	<div id="modal_logout" class="w3-modal">
	  	<div class="w3-modal-content" style="width: 50%">
	   		<header class="w3-container">
	      		<h2>Logout</h2>
	    	</header>
	    	<div class="w3-container">
	      		Are you sure you want to logout?			
	    	</div>
	    	<footer class="w3-container w3-bar w3-padding-16">
	      		<button class="w3-bar-item w3-button w3-round-xxlarge" style="background: #0099CC; color: white; width: 50%" onclick="document.getElementById('modal_logout').style.display='none'">No</button>
	      		<a class="w3-bar-item w3-button w3-round-xxlarge" style="background: #0099CC; color: white; width: 50%" href="index.php">Yes</a>
	    	</footer>
	  	</div>
	</div>

	<div class="w3-sidebar w3-bar-block w3-white w3-card w3-animate-left" style="display:none;z-index:2" id="mySidebar">
	  <button onclick="w3_close()" class="w3-bar-item w3-button w3-large"><i class="demo-icon icon-left-open"></i> Close</button>
	  <a class="w3-bar-item w3-button" href="addpermit.php"> <i class="demo-icon icon-doc-add"></i> Add Permit</a>
	  <a class="w3-bar-item w3-button" href="archive.php"> <i class="demo-icon icon-archive"></i> Archive</a>
	  <button class="w3-bar-item w3-button" onclick="document.getElementById('modal_profile_setting').style.display='block'"> <i class="demo-icon icon-wrench-outline"></i> Profile Setting</button>
	  <button class="w3-bar-item w3-button" onclick="document.getElementById('modal_logout').style.display='block'"> <i class="demo-icon icon-power-outline"></i> Logout</button>
	</div>

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		function w3_open() {
		  document.getElementById("main").style.marginLeft = "25%";
		  document.getElementById("mySidebar").style.width = "25%";
		  document.getElementById("mySidebar").style.display = "block";
		  document.getElementById("openNav").style.display = 'none';
		}

		function w3_close() {
		  document.getElementById("main").style.marginLeft = "0%";
		  document.getElementById("mySidebar").style.display = "none";
		  document.getElementById("openNav").style.display = "inline-block";
		}
	</script>
</body>
</html>