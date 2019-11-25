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
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
                        <th class="tableheaders">First Name</th>
                        <th class="tableheaders">Last Name</th>
                        <th class="tableheaders">M.I</th>
                        <th class="tableheaders">Action</th> 
                    </tr>
                </thead>
            </table>
        </div>
	</div>

  <!-- Modals -->

  <div id="modal_forms_view" class="w3-modal">
	  	<div class="w3-modal-content">
	   		<header class="w3-container">
	      		<center><h2>Applicant Forms</h2></center>
	    	</header>
        <div class="w3-container">
	      		<p id="resultView">No Permit Forms yet.</p>
	    	</div>
	    	<footer class="w3-container w3-bar w3-padding-16">
	      		<!-- <button class="w3-bar-item w3-button w3-round-xxlarge" onclick="window.location.href='addpermit.php';"></button> -->
	      		<button class="w3-bar-item w3-button w3-round-xxlarge" onclick="document.getElementById('modal_forms_view').style.display='none'">Close</button>
	    	</footer>
	  	</div>
	</div>

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/w3.js"></script>
	<script type="text/javascript">
	</script>
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
							var temp = '<input type="hidden" value=\''+JSON.stringify(row)+'\' id="dataHandler_'+data+'"><button onclick="dataSelect('+data+')">View</button>';
							return temp;
						}
					}
				]
			});
    });
  
  function dataSelect(data){
    var types = ['agricultural','demolition','electrical','electronics','fencing','mechanical','sanitary'];
	  var id = data;
	  var str = document.getElementById("dataHandler_"+id).value;
	  selectedApplicant = JSON.parse(str);
	  if (selectedApplicant.existing_buildings != "true"){
			document.getElementById("modal_forms_view").style.display = "initial";
	  }
	  else {
		  $.ajax({
			  url: "process/get_building.php",
			  type: "get",
			  data: {
				  applicant_id : selectedApplicant.id
			  },
			  success: async function(r){
				  var obj = JSON.parse(r);
				  var loopCount = obj.length;
				  var display = "<ol>";
				  var loop = 0;
				    while (loop < loopCount){
              display += "<li>Building No. : "+obj[loop].id+" | <button type='button' onclick=\"redirectToPermit('building','"+obj[loop].id+"')\">View Permit</button><br/><br/>";
              await fetchOtherForms(obj[loop].id).then((r) => display+=r);
              display += "<br/></li>";
					  loop++;
				  }
				  display += "</ol>";
          document.getElementById("resultView").innerHTML = display;
          document.getElementById("modal_forms_view").style.display = "initial";
			  }
		});
  }
}

  function redirectToPermit(type,id){
    window.open("print/"+type+"permit.php?id="+id);
  }

  async function fetchOtherForms(id){
    var checkIcon = '<center><i class="fa fa-check" aria-hidden="true" style="font-size: 35px; color: white; background-color: #00b894; padding-top: 9px;padding-bottom: 9px; padding-left: 12px; padding-right: 12px; border-radius: 100%;"></i></center';
    var timesIcon = '<td><center><i class="fa fa-times" aria-hidden="true" style="font-size: 35px; color: white; background-color: #ff7675; padding-top: 9px;padding-bottom: 9px; padding-left: 12px; padding-right: 12px; border-radius: 100%;"></i></center></td>';

    var display = "<table style='width: 100%;'><tr>"
    await $.ajax({
			  url: "process/get_forms.php",
			  type: "get",
			  data: {
				  id : id
			  },
			  success: function(r){
				  if (r[0].agricultural != null){
            display+="<td><a href='#' onclick=\"redirectToPermit('agricultural','"+r[0].agricultural+"')\">"+checkIcon+"</button></td>"
          }
          else {
            display+=timesIcon;
          }
          if (r[1].demolition != null){
            display+="<td><a href='#' onclick=\"redirectToPermit('demolition','"+r[1].demolition+"')\">"+checkIcon+"</a></td>"
          }
          else {
            display+=timesIcon;
          }
          if (r[2].electrical != null){
            display+="<td><a href='#' onclick=\"redirectToPermit('electrical','"+r[2].electrical+"')\">"+checkIcon+"</button></td>"
          }
          else {
            display+=timesIcon;
          }
          if (r[3].electronics != null){
            display+="<td><a href='#' onclick=\"redirectToPermit('electronics','"+r[3].electronics+"')\">"+checkIcon+"</a></td>"
          }
          else {
            display+=timesIcon;
          }
          if (r[4].fencing != null){
            display+="<td><a href='#' onclick=\"redirectToPermit('fencing','"+r[4].fencing+"')\">"+checkIcon+"</a></td>"
          }
          else {
            display+=timesIcon;
          }
          if (r[5].mechanical != null){
            display+="<td><a href='#' onclick=\"redirectToPermit('mechanical','"+r[5].mechanical+"')\">"+checkIcon+"</a></td>"
          }
          else {
            display+=timesIcon;
          }
          if (r[6].sanitary != null){
            display+="<td><a href='#' onclick=\"redirectToPermit('sanitary','"+r[6].sanitary+"')\">"+checkIcon+"</a></td>"
          }
          else {
            display+=timesIcon;
          }
			  }
    }).promise().then(() => display += "</tr><tr style='text-align: center; font-weight: bold;'><td>Agricultural</td><td>Demolition</td><td>Electrical</td><td>Electronics</td><td>Fencing</td><td>Mechanical</td><td>Sanitary</td></tr></table>");
    return display;
  }
	</script>
</body>
</html>