<?php

session_start();

require_once "config.php";
?>
<!DOCTYPE html>
<html>
<title>
	Done Payment
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
			background-color: rgba(44,68,130,0.80);
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

	</style>
</head>

<body>

	<div class="card shadow" style="width: 50%">
		<div class="card-body">
			<form class="form-signin">
				<div class="text-center mb-4">
					<img class="mb-0" src="../images/payment-done.jpg" alt="" width="400" >
				</div>
				<div class="text-center mb-4">
				<h3>Your Payment is Successful!</h3>
				</div>
				<div class="text-center mb-4">
				<small>Thank you for your payment, An automated payment receipt will be sent to your registered email address.</small>
				</div>



"
				<a class="btn btn-lg btn-primary btn-block" type="submit" href="main.php">Return to Home</a>
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