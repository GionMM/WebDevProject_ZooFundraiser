<?php
if ( !isset( $_SESSION ) ) {
	session_start();
}

if ( ( isset( $_SESSION[ "loggedin" ] ) ) && ( $_SESSION[ "loggedin" ] != true ) ) {
	header( "location: main.php" );
	exit;
}

require_once "config.php";
?>
<?php
$error_message = "";

if ( isset( $_POST[ 'proceedPayment' ] ) ) {

	$value = $_POST[ 'animalChoice' ];

	$parts = explode( '+', $value );
	$adopt_animal_id = $parts[ 0 ];

	$user_id = $_SESSION[ 'id' ];
	$date = date( 'Y-m-d H:i:s' );

	$sql = "SELECT * FROM adoption WHERE user_id = '" . $user_id . "' AND animal_id = '" . $adopt_animal_id . "' ";
	$result = $link->query( $sql );

	if ( ( $result->num_rows > 0 ) ) {
		$error_message = "You've already subcribe to adopt this animal. Choose different animal.";
	} else {
		$sqlAdoption = "INSERT INTO adoption (user_id, animal_id, payment_method, datetime) VALUES ('" . $user_id . "', '" . $adopt_animal_id . "', '1', '" . $date . "')";

		if ( mysqli_query( $link, $sqlAdoption ) ) {
			echo "<script>";
			echo "window.location.href='done-payment.php'";
			echo "</script>";
		} else {
			echo "<script>";
			echo "alert('There's something wrong.);";
			echo "</script>";
		}

	}

}
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
		
		.help-block {
			color: red;
		}

	</style>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light ">
		<div class="container">
			<a class="navbar-brand" href="#">Website logo &#124; <span class="lead">Adoption</span></a>
			</button>

			<ul class="navbar-nav ml-auto">

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
								<span>Adopt</span>
								<strong id="animalDetails">Species (name)</strong>
							</li>


							<li class="list-group-item d-flex justify-content-between">
								<span>Total (RM)</span>
								<strong id="totalPrice">0</strong>
							</li>
						</ul>
						<span class="help-block">
							<?php echo $error_message; ?>
						</span>
					</div>
					<div class="col-md-8 order-md-1">
						<h4 class="mb-3">Adoption applicant</h4>

						<form name="myForm" onSubmit="validateForm()" method="post">
							<!--
							<div class="row">
								<div class="col-md-12 mb-3">
									<label for="fullName">Full name</label>
									<input type="text" class="form-control" id="fullName" placeholder="" value="" required>
									<div class="invalid-feedback">
										Valid full name is required.
									</div>
								</div>
							</div>
-->

							<!--
							<div class="mb-3">
								<label for="email">Email <span class="text-muted">(Optional)</span></label>
								<input type="email" class="form-control" id="email" placeholder="you@example.com">
								<div class="invalid-feedback">
									Please enter a valid email address.
								</div>
							</div>
-->

							<!--
							<div class="mb-3">
								<label for="phone">Phone number</label>
								<input type="text" class="form-control" id="phone" placeholder="" required>
								<div class="invalid-feedback">
									Phone number required.
								</div>
							</div>
-->

							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


							<div class="mb-3">
								<label for="animal">Choose animal to adopt:</label>
								<div class="row" id="radioAnimal">
									<?php 
										$query = "SELECT * FROM animal";
									
										$result = mysqli_query($link, $query);

										 while($row = mysqli_fetch_array($result)) {

											 if ( $result -> num_rows > 0) {
												 $animal_id 		= $row[ "animal_id" ];
												 $animal_name 		= $row[ "animal_name" ];
												 $animal_species 	= $row[ "animal_species" ];
												 $animal_price 		= $row[ "annual_adoption_price" ];
												 $animal_photo		= $row[ "animal_photo" ];
												 
												 echo '<div class="col-md-3">';
												 echo '<img src="'.$animal_photo.'" alt="Animal image" style="width:100px;">';
												 echo '<br>';
												 echo '<div class="custom-control custom-radio">';
												 echo '<input id="'.$animal_name.'" name="animalChoice" type="radio" class="custom-control-input" required onClick="updateTotal()" value="'.$animal_id.'+'.$animal_price.'+'.$animal_species.' ('.$animal_name.')">';
												 echo '<label class="custom-control-label" for="'.$animal_name.'" >'.$animal_species.'</label>';
												 echo '</div>';
												 echo '</div>';
											 }
										 }
									?>
								</div>
								<script>
									function updateTotal( e ) {

										var x = document.querySelector( 'input[name = "animalChoice"]:checked' ).value;
										var [ id, price, name ] = x.split( '+' );
										document.getElementById( "totalPrice" ).innerHTML = price;
										document.getElementById( "animalDetails" ).innerHTML = name;
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

							<button class="btn btn-primary btn-lg btn-block" onClick="return confirm('Are you sure?n\You won't be able to go back to this page.')" name="proceedPayment">Proceed Payment</button>
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