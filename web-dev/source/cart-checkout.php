<?php
session_start();

if ( ( isset( $_SESSION[ "loggedin" ] ) ) && ( $_SESSION[ "loggedin" ] != true ) ) {
	header( "location: main.php" );
	exit;
} else {
	$user_id = $_SESSION[ 'id' ];
}

require_once "config.php";
?>
<?php
$error_message = "";

if ( isset( $_POST[ 'proceedPayment' ] ) ) {

	$date = date( 'Y-m-d H:i:s' );

	$fullname = $_POST[ 'fullName' ];
	$phone = $_POST[ 'phone' ];
	$address = $_POST[ 'address' ];
	$zip = $_POST[ 'zip' ];

	$address = $fullname . ', ' . $phone . ', ' . $address . ', ' . $zip;

	$resultTotal = mysqli_query( $link, "SELECT sum(c.quantity*m.merch_price) FROM merch m, cart c WHERE m.merch_id=c.merch_id AND c.user_id='" . $user_id . "' " );
	$row = mysqli_fetch_assoc( $resultTotal );
	$totalAmount = $row[ 'sum(c.quantity*m.merch_price)' ];

	$sqlCheckout = "INSERT INTO orders (user_id, payment_method, amount, datetime, delivery_address) VALUES ('" . $user_id . "', '1', '" . $totalAmount . "', CURRENT_TIMESTAMP(), '" . $address . "')";
	
	if ( mysqli_query( $link, $sqlCheckout ) ) {
	
		$query="SELECT `order_id` FROM `orders` WHERE `user_id`=$user_id ORDER BY `datetime` DESC LIMIT 1";
		$result = mysqli_query($link, $query) or die("Insert Orders Failed");
		$row = mysqli_fetch_array($result);
		$order_id=$row["order_id"];

		$query = "SELECT * FROM merch m, cart c WHERE m.merch_id=c.merch_id AND c.user_id='$user_id'";
		$result = mysqli_query($link, $query);
		while ($row = mysqli_fetch_array($result)) {

		if ($result->num_rows > 0) {
			$merch_id 		= $row["merch_id"];
			$quantity		= $row["quantity"];

			$query="INSERT INTO `orders_merch`(`order_id`, `merch_id`, `quantity`) VALUES ($order_id,$merch_id,$quantity)";
			mysqli_query($link, $query) or die("Insert Orders_Merch Failed");			
			}
	  	}
		mysqli_query( $link, 'DELETE from cart WHERE user_id = ' . $user_id . ' ' );
		
		echo "<script>";
		echo "window.location.href='done-payment.php'";
		echo "</script>";
	} else {
		echo "<script>";
		echo "alert('There's something wrong.);";
		echo "</script>";
	}

}
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
						<a class="navbar-brand"href="main.php"><img src="../images/logo.png" style="width:120px"> &#124; <span class="lead">Adoption</span></a>

			<ul class="navbar-nav ml-auto">
				<li><a class="nav-link" href="./store-home.php"><span class="fa fa-home"></span> Home</a>
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

							<?php 
							$query = "SELECT * FROM merch m, cart c WHERE m.merch_id=c.merch_id AND c.user_id='".$user_id."'";
							
							$result = mysqli_query($link, $query);
							
								while($row = mysqli_fetch_array($result)) {

			 
									 if ( $result -> num_rows > 0) {
										 $merch_id 		= $row[ "merch_id" ];
										 $merch_name 	= $row[ "merch_name" ];
										 $merch_price 	= $row[ "merch_price" ];
										 $quantity		= $row[ "quantity" ];
										 
										 echo '<li class="list-group-item d-flex justify-content-between lh-condensed">';
										 echo '<div>';
										 echo '<h6 class="my-0">'.$merch_name.'</h6>';
										 echo '<small class="text-muted">Quantity: '.$quantity.'</small>';
										 echo '</div>';
										 echo '<span class="text-muted">RM'.$quantity*$merch_price.' ';
										 echo '</span>';
										 echo '</li>';
										 
									 }
								}
										 
							
							?>

							<li class="list-group-item d-flex justify-content-between bg-light">
								<div class="text-success">
									<h6 class="my-0">Shipping fee</h6>
<!--									<small></small>-->
								</div>
								<span class="text-success">+RM10</span>
							</li>

							<?php

							//							$queryTotal = "SELECT sum(c.quantity*m.merch_price) FROM merch m, cart c WHERE m.merch_id=c.merch_id AND c.user_id='".$user_id."'";

							$resultTotal = mysqli_query( $link, "SELECT sum(c.quantity*m.merch_price) FROM merch m, cart c WHERE m.merch_id=c.merch_id AND c.user_id='" . $user_id . "' " );
							$row = mysqli_fetch_assoc( $resultTotal );
							$sum = $row[ 'sum(c.quantity*m.merch_price)' ];
							$sum = $sum+10;

							echo '<li class="list-group-item d-flex justify-content-between">';
							echo '<span>Total (RM)</span>';
							echo '<strong id="totalAmount">' . $sum. '</strong>';
							echo '</li>';

							?>
							<span class="help-block">
								<?php echo $error_message; ?>
							</span>

						</ul>

<!--
						<form class="card p-2">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Promo code">
								<div class="input-group-append">
									<button type="submit" class="btn btn-secondary">Redeem</button>
								</div>
							</div>
						</form>
-->


					</div>
					<div class="col-md-8 order-md-1">
						<h4 class="mb-3">Billing address</h4>

						<form method="post">
							<div class="row">
								<div class="col-md-12 mb-3">
									<label for="fullName">Full name</label>
									<input type="text" class="form-control" id="fullName" name="fullName" placeholder="" value="" required>
									<div class="invalid-feedback">
										Valid full name is required.
									</div>
								</div>

							</div>

							<!--
							<div class="mb-3">
								<label for="email">Email <span class="text-muted">(Optional)</span></label>
								<input type="email" class="form-control" id="email" placeholder="you@example.com">
								<div class="invalid-feedback">
									Please enter a valid email address for shipping updates.
								</div>
							</div>
-->

							<div class="mb-3">
								<label for="phone">Phone number</label>
								<input type="text" class="form-control" id="phone" name="phone" placeholder="" required>
								<div class="invalid-feedback">
									Phone number required.
								</div>
							</div>
							
							<script>
							var x = document.querySelector('#phone');

							x.addEventListener('input', restrictNumber);
								function restrictNumber (e) {  
									var newValue = this.value.replace(new RegExp(/[^\d]/,'ig'), "");
												  this.value = newValue;
													
								
								}
							</script>

							<div class="mb-3">
								<label for="address">Full Address</label>
								<input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
								<div class="invalid-feedback">
									Please enter your shipping address.
								</div>
							</div>

							<div class="row">
								<div class="col-md-8 mb-3">
									<label for="state">State</label>
									<select class="custom-select d-block w-100" id="state" required>
										<option value="">Choose...</option>
										<option>Wilayah Persekutuan Kuala Lumpur</option>
										<option>Wilayah Persekutuan Putrajaya</option>
										<option>Wilayah Persekutuan Labuan</option>
										<option>Selangor</option>
										<option>Negeri Sembilan</option>
										<option>Johor</option>
										<option>Melaka</option>
										<option>Pahang</option>
										<option>Terengganu</option>
										<option>Kelantan</option>
										<option>Perlis</option>
										<option>Kedah</option>
										<option>Pulau Pinang</option>
										<option>Perak</option>
										<option>Sabah</option>
										<option>Sarawak</option>
									</select>
									<div class="invalid-feedback">
										Please provide a valid state.
									</div>
								</div>
								<div class="col-md-4 mb-3">
									<label for="zip">Zip</label>
									<input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
									<div class="invalid-feedback">
										Zip code required.
									</div>
									
									<script>
							var x = document.querySelector('#zip');

							x.addEventListener('input', restrictNumber);
								function restrictNumber (e) {  
									var newValue = this.value.replace(new RegExp(/[^\d]/,'ig'), "");
												  this.value = newValue;
													
								
								}
							</script>
									
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



							<button class="btn btn-primary btn-lg btn-block" name="proceedPayment">Proceed Payment</button>


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