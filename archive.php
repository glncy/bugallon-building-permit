<!DOCTYPE html>
<html>
<head>
	<title>View processed permits | OBO-Bugallon Office</title>
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
    h3{
    	color: #0099CC;
    	font-weight: 500!important;
    }
    #openNav{
    	width: auto!important;
    }
    #cont_table{
        padding: 100px 10%;
    }
    #cont_table h2{
      font-weight: bold;
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
	<div id="main">
		<div id="cont_table">
        <h2 class="w3-center">Permits Master List</h2>         
            <table class="w3-table w3-bordered display dataTable" id="data_table">
                <thead>
                    <tr>
                        <th class="tableheaders">ID</th>
                        <th class="tableheaders">Date</th>
                        <th class="tableheaders">Permit</th>
                        <th class="tableheaders">Permit No.</th>
                        <th class="tableheaders">Applicant Name</th>
                        <th class="tableheaders">Action</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      	<td>1</td>
                      	<td>5/5/2019</td>
                      	<td>Electrical Permit</td>
                      	<td>00001</td>
                      	<td>Lorem Ipsum</td>
                      	<td><a href="viewpermit.php?permit=electrical&id=0" class="w3-btn w3-round-xxlarge" target="_blank"><i class="demo-icon icon-eye-outline"></i> VIEW</a></td>
                    </tr>
                    <tr>
                      	<td>2</td>
                      	<td>5/5/2019</td>
                      	<td>Electronics Permit</td>
                      	<td>00001</td>
                      	<td>Lorem Ipsum</td>
                      	<td><a href="viewpermit.php?permit=electronics&id=0" class="w3-btn w3-round-xxlarge" target="_blank"><i class="demo-icon icon-eye-outline"></i> VIEW</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
	</div>

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/w3.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
        	$.fn.DataTable.ext.pager.numbers_length = 5;
        	$.fn.DataTable.ext.pager.simple_numbers = function(page, pages) {
            	return ["previous", _numbers(page, pages), "next"];
        	};
        	$('#data_table').DataTable( {
            	"pagingType": "full_numbers"
        	});
        });
	</script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
</body>
</html>