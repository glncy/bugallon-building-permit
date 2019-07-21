<!DOCTYPE html>
<html>
<head>
	<title>Electrical Permit of Lorem Ipsum | OBO-Bugallon Office</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo_img.png">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/obofonticon.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<style type="text/css">
		body, h1, h5, h6, div, label{
			font-family: "Microsoft JengHei", sans-serif!important;
		}
		#openNav{
			width: auto!important;
		}
		#main{
			padding: 30px 10%;
		}
		#main #btn_reprint{
			width: 100%;
			background: #0099CC;
			color: white;
		}
		#iframe_permit{
			min-height: 80vh;
			background: white;
			width: 100%;
			height: 100%;
			margin-top: 10px;
		}
	</style>
	<script type="text/javascript" src="js/js_permit.js"></script>
</head>
<body>
	<?php
		require("sidenav.php");
		$permit_type = $_GET['permit'];
		$id =  $_GET['id']
	?>
	
	<button class="w3-button w3-xlarge w3-round-large w3-top" onclick="w3_open()" id="openNav"><i class="demo-icon icon-th-large-outline"></i></button>

	

	<div id="main">
	    <div class="w3-row">
	      <div class="w3-col l7 m7 s12">
	        <h5><?php printf(ucwords($permit_type)) ?> Permit No. 00001 for Lorem Ipsum</h5>
	      </div>
	      <div class="w3-col l5 m5 s12">
	         <a class="w3-button w3-round-xxlarge w3-bar-item" href="#" id="btn_reprint"><i class="demo-icon icon-print-2"></i> REPRINT</a>
	      </div>
	    </div>
    	<iframe id="iframe_permit" src="print/<?php printf($permit_type)?>permit.html"></iframe>
	</div>

	

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/w3.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
</body>
</html>