<?php
session_start();

if ( ( isset( $_SESSION[ "loggedin" ] ) ) && ( $_SESSION[ "loggedin" ] != true ) ) {
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
	<title>Cart checkout page</title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="../css/form-validation.css" rel="stylesheet">
	<link href="../css/album.css" rel="stylesheet">
	<link href="../css/quantity.css" rel="stylesheet">

	<style>
		body {
			background-color: blueviolet;
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
			<a class="navbar-brand" href="#">Website logo &#124; <span class="lead">Cart checkout</span></a>

			<ul class="navbar-nav ml-auto">
				<li><a class="nav-link" href="./adoption.php"><span class="fa fa-home"></span> Home</a>
				</li>
			</ul>

		</div>
	</nav>


	<div class="container" style="margin-top: 2em">

		<div class="card" style="width: 100%;">
			<div class="card-body">
				<div class="row">
					<div class="col-md-4 order-md-2 mb-4">
						<h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Order summary</span>
<!--            <span class="badge badge-secondary badge-pill">3</span>-->
          </h4>
					

						<ul class="list-group mb-3">
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div>
									<h6 class="my-0">Red hoodie</h6>
									<small class="text-muted">Quantity: 1</small>
								</div>
								<span class="text-muted">MYR 35.99
								</span>
							</li>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div>
									<h6 class="my-0">Animal</h6>
									<small class="text-muted">Name: <i>Panda</i></small>

								</div>
								<span class="text-muted">MYR 0</span>
							</li>
							<li class="list-group-item d-flex justify-content-between bg-light">
								<div class="text-success">
									<h6 class="my-0">Promo code</h6>
									<small>EXAMPLECODE</small>
								</div>
								<span class="text-success">-RM 5</span>
							</li>


							<li class="list-group-item d-flex justify-content-between">
								<span>Total (RM)</span>
								<strong>30.99</strong>
							</li>
						</ul>

						<form class="card p-2">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Promo code">
								<div class="input-group-append">
									<button type="submit" class="btn btn-secondary">Redeem</button>
								</div>
							</div>
						</form>


					</div>
					<div class="col-md-8 order-md-1">
						<h4 class="mb-3">Billing address</h4>
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

							</div>

							<div class="mb-3">
								<label for="email">Email <span class="text-muted">(Optional)</span></label>
								<input type="email" class="form-control" id="email" placeholder="you@example.com">
								<div class="invalid-feedback">
									Please enter a valid email address for shipping updates.
								</div>
							</div>
							
							<div class="mb-3">
								<label for="phone">Phone number</label>
								<input type="text" class="form-control" id="phone" placeholder="" required>
								<div class="invalid-feedback">
									Phone number required.
								</div>
							</div>

							<div class="mb-3">
								<label for="address">Full Address</label>
								<input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
								<div class="invalid-feedback">
									Please enter your shipping address.
								</div>
							</div>

							<div class="row">
								<div class="col-md-8 mb-3">
									<label for="state">State</label>
									<select class="custom-select d-block w-100" id="state" required>
										<option value="">Choose...</option>
										<option>California</option>
									</select>
									<div class="invalid-feedback">
										Please provide a valid state.
									</div>
								</div>
								<div class="col-md-4 mb-3">
									<label for="zip">Zip</label>
									<input type="text" class="form-control" id="zip" placeholder="" required>
									<div class="invalid-feedback">
										Zip code required.
									</div>
								</div>
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
		</div>
	</div>




	</div>
	</div>




	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../js/jquery-3.3.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap-4.3.1.js"></script>
	<script src="../js/input-number.js"></script>
</body>
</html>