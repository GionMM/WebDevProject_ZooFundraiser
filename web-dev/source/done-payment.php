<?php

session_start();

require_once "config.php";		
?>
<!DOCTYPE html>
<html>
<title>
	Done Payment - 
</title>
<head>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 12px;
			margin: 0;
			padding: 0;
			height: 100%;
/*			width: 100%;*/
			min-width: 200px;
			position: relative;
			display: block;
		}
		
		body {
			background-image: url("../images/ny.jpg");
			height: 100%;
			background-repeat: no-repeat;
			background-size: cover;
			padding: 0;
			margin: 0;
		}
			.wrapper {
				position: relative;
			top:100px;
			height: 390px;
			width: 348.09448819px;
			display: block;
			background-color: #FFFFFF;
				margin: auto;
				
				padding: auto;
/*
			margin-top: auto;
  
			margin-left: auto;
			margin-right: auto;
*/
			position: relative;
			-webkit-border-radius: 11px;
			-moz-border-radius: 11px;
			border-radius: 11px;
			box-shadow: 0 8px 6px -6px #888888;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			text-align: center;
				
		}
	</style>
</head>

<body>
<div class="wrapper">
		<div style="color: green;">
				<i class="fa fa-check-circle fa-4x" aria-hidden="true"></i>
		</div>
		<h1 style="padding: 0px; margin-top: 4em;">
          Payment successful.
        </h1>
	
	<div style="position: relative; top:180px;">Click <a href="main.php">here</a> to return to home page.</div>
	</div>
</body>
</html>