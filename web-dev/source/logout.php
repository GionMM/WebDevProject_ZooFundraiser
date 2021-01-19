<?php
session_start();

require_once "config.php";

session_destroy();

?>
<!DOCTYPE html>
<html>
<title>
	Logout
</title>
<head>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap -->
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<style>
		:root {
			--input-padding-x: .75rem;
			--input-padding-y: .75rem;
		}
		
		html,
		body {
			height: 100%;
		}
		
		body {
			display: -ms-flexbox;
			display: -webkit-box;
			display: flex;
			-ms-flex-align: center;
			-ms-flex-pack: center;
			-webkit-box-align: center;
			align-items: center;
			-webkit-box-pack: center;
			justify-content: center;
			padding-top: 40px;
			padding-bottom: 40px;
			background: linear-gradient(45deg, #92baac 45px, transparent 45px)64px 64px, linear-gradient(45deg, #92baac 45px, transparent 45px, transparent 91px, #e1ebbd 91px, #e1ebbd 135px, transparent 135px), linear-gradient(-45deg, #92baac 23px, transparent 23px, transparent 68px, #92baac 68px, #92baac 113px, transparent 113px, transparent 158px, #92baac 158px);
			background-color: #e1ebbd;
			background-size: 128px 128px;
		}
		
		.form-signin {
			width: 100%;
			max-width: 420px;
			padding: 15px;
			margin: 0 auto;
		}
		
		.form-label-group {
			position: relative;
			margin-bottom: 1rem;
		}
		
		.form-label-group> input,
		.form-label-group> label {
			padding: var(--input-padding-y) var(--input-padding-x);
		}
		
		.form-label-group> label {
			position: absolute;
			top: 0;
			left: 0;
			display: block;
			width: 100%;
			margin-bottom: 0; /* Override default `<label>` margin */
			line-height: 1.5;
			color: #495057;
			border: 1px solid transparent;
			border-radius: .25rem;
			transition: all .1s ease-in-out;
		}
		
		.form-label-group input::-webkit-input-placeholder {
			color: transparent;
		}
		
		.form-label-group input:-ms-input-placeholder {
			color: transparent;
		}
		
		.form-label-group input::-ms-input-placeholder {
			color: transparent;
		}
		
		.form-label-group input::-moz-placeholder {
			color: transparent;
		}
		
		.form-label-group input::placeholder {
			color: transparent;
		}
		
		.form-label-group input:not(:placeholder-shown) {
			padding-top: calc(var(--input-padding-y)+ var(--input-padding-y) * (2 / 3));
			padding-bottom: calc(var(--input-padding-y) / 3);
		}
		
		.form-label-group input:not(:placeholder-shown)~ label {
			padding-top: calc(var(--input-padding-y) / 3);
			padding-bottom: calc(var(--input-padding-y) / 3);
			font-size: 12px;
			color: #777;
		}
		
		/* headline */
		.headline {
			/*font-family: Calibri, "Helvetica", san-serif;*/
			line-height: 1.5em;
			color: black;
			/*			font-size: 20px;*/
		}
		
		.headline:after {
			content: ' ';
			display: block;
			border: 2px solid salmon;
			width: 100%;
		}
		
		h1 {
			/*			font-family: "Times New Roman", Times, serif !important;*/
			font-family: Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman", "serif";
			font-weight: bold;
		}

	</style>
</head>

<body>

	<div class="card shadow" style="width: 50%">
		<div class="card-body">
			<form class="form-signin">
				<div class="text-center mb-4">
					<h1><span class="headline">LOGOUT</span></h1>
					<h3>You are now logged out</h3>
				</div>
				<div class="text-center mb-4">
					<small>Click <a href="main.php">here</a> to return to website homepage.</small>
				</div>
			</form>
		</div>
	</div>


	<!--
	
<div class="wrapper">
		<div style="color: green;">
				<i class="fa fa-check-circle fa-4x" aria-hidden="true"></i>
		</div>
		<h1 style="padding: 0px; margin-top: 4em;">
          Your Payment is Successfull!
        </h1>
	<small>Thank you for your payment, An automated payment receipt will be sent to your registered email address.</small>
	
	<div style="position: relative; top:180px;">Click <a href="main.php">here</a> to return to home page.</div>
	</div>
-->
</body>
</html>