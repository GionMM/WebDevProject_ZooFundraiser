<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

if ( (isset( $_SESSION[ "loggedin" ] )) && ($_SESSION[ "loggedin" ] != true )) {
	header( "location: main.php" );
	exit;
}

require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adoption checkout page</title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="../css/form-validation.css" rel="stylesheet">
	<link href="../css/album.css" rel="stylesheet">

	<style>
		body {
			background-color: cornflowerblue;
		}
		
		/* HIDE RADIO */
		[type=radio] {
			position: absolute;
			opacity: 0;
			width: 0;
			height: 0;
		}
		
		/* IMAGE STYLES */
		[type=radio]+ img {
			cursor: pointer;
		}
		
		/* CHECKED STYLES */
		[type=radio]:checked+ img {
			outline: 2px solid #f00;
		}
		
		div.card {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		}

	</style>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light ">
		<div class="container">
			<a class="navbar-brand" href="#">Website logo &#124; <span class="lead">Adoption</span></a>
<!--
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
-->
        </button>	
			
					<ul class="navbar-nav ml-auto">
<!--
				<li><a class="nav-link" href="#"><span class="fa fa-user-circle"></span> Sign Up</a>
				</li>
-->
				<li><a class="nav-link" href="./adoption.php"><span class="fa fa-home"></span> Home</a>
				</li>
			</ul>
		
		</div>
	</nav>


	<div class="container" style="margin-top: 2em">

		<div class="card" style="width: 100%;">
			<div class="card-body">
				<!--
				<div class="py-5 text-center">
										<img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
					<h2>Order summary</h2>
				</div>
-->
				<div class="row">
					<div class="col-md-4 order-md-2 mb-4">
						<h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Order summary</span>
<!--            <span class="badge badge-secondary badge-pill">3</span>-->
          </h4>
						<ul class="list-group mb-3">
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div>
									<h6 class="my-0">Monthly Price</h6>
									<small class="text-muted">As per adoption, you are automatically charged once a month on the date you signed up.</small>

								</div>
<!--
								<span class="text-muted">RM 100
								</span>
-->
							</li>

							<li class="list-group-item d-flex justify-content-between">
								<span>Total (RM)</span>
								<strong id="totalPrice">0</strong>
							</li>
						</ul>
					</div>
					<div class="col-md-8 order-md-1">
						<h4 class="mb-3">Adoption applicant</h4>
<!--						<form class="needs-validation" novalidate>-->
						<form>
							<div class="row">
								<div class="col-md-12 mb-3">
									<label for="fullName">Full name</label>
									<input type="text" class="form-control" id="fullName" placeholder="" value="" required>
									<div class="invalid-feedback">
										Valid full name is required.
									</div>
								</div>
								<!--
								<div class="col-md-6 mb-3">
									<label for="lastName">Last name</label>
									<input type="text" class="form-control" id="lastName" placeholder="" value="" required>
									<div class="invalid-feedback">
										Valid last name is required.
									</div>
								</div>
-->
							</div>

							<div class="mb-3">
								<label for="email">Email <span class="text-muted">(Optional)</span></label>
								<input type="email" class="form-control" id="email" placeholder="you@example.com">
								<div class="invalid-feedback">
									Please enter a valid email address.
								</div>
							</div>

							<div class="mb-3">
								<label for="phone">Phone number</label>
								<input type="text" class="form-control" id="phone" placeholder="" required>
								<div class="invalid-feedback">
									Phone number required.
								</div>
							</div>

							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

							<div class="mb-3">
								<label for="animal">Animal</label>
								<div class="row" id="radioAnimal">
									<div class="col">
										<img src="../images/panda2.jpg">
										<br>
										<div class="custom-control custom-radio">
											<input id="panda" name="animalChoice" type="radio" class="custom-control-input" required onClick="updateTotal()">
											<label class="custom-control-label" for="panda">Panda</label>
										</div>

									</div>
									<div class="col">
										<img src="../images/tiger2.jpg">
										<br>
										<div class="custom-control custom-radio">
											<input id="tiger" name="animalChoice" type="radio" class="custom-control-input" required onClick="updateTotal()">
											<label class="custom-control-label" for="tiger">Tiger</label>
										</div>

									</div>
									<div class="col">
										<img src="../images/leopard2.jpg">
										<br>
										<div class="custom-control custom-radio">
											<input id="leopard" name="animalChoice" type="radio" class="custom-control-input" required onClick="updateTotal()">
											<label class="custom-control-label" for="leopard">Leopard</label>
										</div>

									</div>
									<div class="col">
										<img src="../images/orangutan2.jpg">
										<br>
										<div class="custom-control custom-radio">
											<input id="orangUtan" name="animalChoice" type="radio" class="custom-control-input" required onClick="updateTotal()">
											<label class="custom-control-label" for="orangUtan">Orang utan</label>
										</div>

									</div>
								</div>
										<script>
//												var amount = document.querySelector('#amount');
//
//												amount.addEventListener('input', restrictNumber);
//												function restrictNumber (e) {  
//												  var newValue = this.value.replace(new RegExp(/[^\d+\.\d{0,2}$]/,'ig'), "");
//												  this.value = newValue;
//													
//													document.getElementById("totalSummary").innerHTML = "RM "+Math.round(newValue * 100) / 100;
//												}
											function updateTotal (e) {
												if (document.getElementById('panda').checked) {
												  total = 200;
												document.getElementById("totalPrice").innerHTML = "RM "+total;
												}
												if (document.getElementById('tiger').checked) {
												  total = 180;
													document.getElementById("totalPrice").innerHTML = "RM "+total;
												}
												if (document.getElementById('leopard').checked) {
												  total = 170;
													document.getElementById("totalPrice").innerHTML = "RM "+total;
												}
												if (document.getElementById('orangUtan').checked) {
												  total = 160;
													document.getElementById("totalPrice").innerHTML = "RM "+total;
												}
											}
										</script>
							</div>

							<hr class="mb-4">

							<h4 class="mb-3">Payment</h4>

							<div class="d-block my-3">
								<div class="custom-control custom-radio">
									<input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
									<label class="custom-control-label" for="credit">Credit card</label>
								</div>
								<div class="custom-control custom-radio">
									<input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
									<label class="custom-control-label" for="debit">Debit card</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="cc-name">Name on card</label>
									<input type="text" class="form-control" id="cc-name" placeholder="" required value="Jose Gilbert">
									<small class="text-muted">Full name as displayed on card</small>
									<div class="invalid-feedback">
										Name on card is required
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<label for="cc-number">Credit card number</label>
									<input type="text" class="form-control" id="cc-number" placeholder="" required value="4690780431356074">
									<div class="invalid-feedback">
										Credit card number is required
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 mb-3">
									<label for="cc-expiration">Expiration</label>
									<input type="text" class="form-control" id="cc-expiration" placeholder="" required value="07/2025">
									<div class="invalid-feedback">
										Expiration date required
									</div>
								</div>
								<div class="col-md-3 mb-3">
									<label for="cc-expiration">CVV</label>
									<input type="text" class="form-control" id="cc-cvv" placeholder="" required value="593">
									<div class="invalid-feedback">
										Security code required
									</div>
								</div>
							</div>
							<hr class="mb-4">
							
							<button class="btn btn-primary btn-lg btn-block" onClick="myPayment()">Proceed Payment</button>
							
							<script>
								function myPayment() {
	
									if (confirm("Are you sure? You won't be able to go back to this page.")) {
										
										window.location.href='done-payment.php';
									  } 
									
									return false;
								}
							
							</script>
						</form>
					</div>
				</div>
			</div>
			<!--
					<h5 class="card-title">Choose animals:</h5>
					<h6 class="card-subtitle mb-2 text-muted">I want to adopt</h6>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="#" class="card-link">Card link</a>
					<a href="#" class="card-link">Another link</a>
-->
		</div>


	</div>
	</div>




	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../js/jquery-3.3.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap-4.3.1.js"></script>
</body>
</html>