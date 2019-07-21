<!DOCTYPE html>
<html>
<head>
	<title>Office of the Building Official | Bugallon Office</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo_img.png">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/obofonticons.css">
	<style type="text/css">
		body{
			font-family: "Microsoft JengHei", sans-serif;
			background: #99CC00;
			height: 100vh;
		}
		#cont_logo_img{
			padding-top: 16px;
		}
		#cont_logo_img img{
			width: 20%;
			min-width: 100px;
			max-width: 150px;
		}
		.contform{
			width: 100vw;
			padding: 0px 30%;
		}
		form{
			background-color: white;
			padding-bottom: 16px;
		}
		.w3-section{
			padding: 5px 20%;
		}
		#btn-item .w3-button{
			width: 80%;
			background: #0099CC;
			color: white;
		}
		#btn-item .w3-button:hover{
			border: 1px solid #0099CC;
			background: white!important;
			color: #0099CC!important;
		}
		footer{
			background-color: #e4e0da;
			position: absolute;
			bottom: 0px;
			width: 100vw;
		}
		@media screen and (max-width: 676px){
			.contform{
				 padding: 0px 50px;
			}
		}
	</style>
</head>
<body class="w3-cell w3-center w3-cell-middle">
	<div class="w3-container contform">
		<form method="POST" action="home.php" class="w3-card w3-round-large" id="formLogin">
			<div class="w3-container" id="cont_logo_img"> 
				<img src="images/logo_img.png">
			</div>
			<div class="w3-row w3-section">
				<div class="w3-rest">
					<input class="w3-input" type="text" name="username" placeholder="Username" id="input_username">	
				</div>
			</div>
			<div class="w3-row w3-section">
				<div class="w3-rest">
					<input class="w3-input" type="text" name="password" placeholder="Password" id="input_password">	
				</div>
			</div>
			<div class="w3-container w3-padding-16" id="btn-item">
				<button type="submit" class="w3-button w3-round-xxlarge">LOGIN</button>			
			</div>
			<div class="w3-container" id="btn-item">
				<input type="reset" class="w3-button w3-round-xxlarge" value="CLEAR">
			</div>
		</form>
	</div>

	<footer class="w3-center">
	    <p>Bugallon Office <i class="fa fa-copyright"></i>&copy; Copyright 2019</p>
	 </footer>

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">

	</script>
</body>
</html>