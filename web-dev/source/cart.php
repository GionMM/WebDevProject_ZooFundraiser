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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart page</title>
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
			<a class="navbar-brand" href="#">Website logo &#124; <span class="lead">Shopping cart</span></a>

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
					<?php 
						$sqlCartQuantity = 'SELECT sum(quantity) FROM cart WHERE user_id="'.$user_id.'"';
						
						$resultCartQuantity = mysqli_query($link, $sqlCartQuantity);
		 
						 while($row = mysqli_fetch_array($resultCartQuantity)) {

							 if ( $resultCartQuantity -> num_rows > 0) {
								 
								 	$cartQuantity		= $row[ "sum(quantity)" ];
							 }
						 }
					?>

					<div class="col-md-12 order-md-1">
						<h4 class="mb-3">Cart (<?php echo $cartQuantity; ?> items)</h4>

						<form class="needs-validation" novalidate>

							<?php 
								$query = "SELECT * FROM merch m, cart c WHERE m.merch_id=c.merch_id AND c.user_id='".$user_id."'";
		 						$result = mysqli_query($link, $query);
							
								while($row = mysqli_fetch_array($result)) {
			 
									 if ( $result -> num_rows > 0) {
										 $merch_id 		= $row[ "merch_id" ];
										 $merch_name 	= $row[ "merch_name" ];
										 $merch_price 	= $row[ "merch_price" ];
										 $merch_photo 	= $row[ "merch_photo" ];
										 $quantity		= $row[ "quantity" ];
										 
									echo '<div class="row" style="margin-top:0.5em;">';
										 
									echo '<div class="col-md-3">';
									echo '<div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">';
									echo '<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode($merch_photo).' alt="Sample"> ';
									echo '</div>';
									echo '</div>';
										 
									echo '<div class="col-md-9">';
									echo '<div>';
									echo '<div class="d-flex justify-content-between align-items-center">';
									echo '<div>';
									echo '<h5>'.$merch_name.'</h5>';
									echo '<span><strong>RM '.$merch_price.'</strong></span>';
									echo '<p class="mb-3 text-muted text-uppercase small">ID - '.$merch_id.'</p>';
	
									echo '<div class="input-group">';
//									echo '<form method="POST">';
									
									$x = 'location.href="cart-increment.php?merch_id='.$merch_id.'" ';
									$y = 'location.href="cart-decrement.php?merch_id='.$merch_id.'" ';	
									$z = 'location.href="cart-remove-item.php?merch_id='.$merch_id.'" ';
										 
									echo '<input type="button" value="-" class="button-minus" data-field="quantity" onClick='.$y.' >';
									echo '<input data-id="'.$merch_id.'" data-price="'.$merch_price.'" type="number" step="1" value="'.$quantity.'" name="quantity" class="quantity-field" onKeyDown="return false">';
									echo '<input type="button" value="+" class="button-plus" data-field="quantity" onClick='.$x.' >';
//									echo '</form>';
									echo '</div>';
				
									echo '</div>';
									echo '</div>';
										 
									echo '<div class="d-flex justify-content-between align-items-center">';
									echo '<div>';
									echo '<a href="cart-remove-item.php?merch_id='.$merch_id.'" type="button" class="card-link-secondary small text-uppercase mr-3">';
									echo '<i class="fa fa-trash mr-1"></i> Remove item </a>';
									echo '</div>';
									echo '</div>';
										 
										 
									echo '</div>';
									echo '</div>';
									echo '</div><hr>';
		 
									 }
								}
							
							?>
<!--
								<script>
									function updateTotal( e ) {
										var cart_id = [];
										var cart_price = [];

										var x = document.querySelectorAll('input[type=number]');
										
										for (var i = 0; i < x.length; i++) {
											
											cart_id[i] = x[i].getAttribute('data-id');
											cart_price[i] = x[i].getAttribute('data-price');
											
										}
										
										document.getElementById( "totalPrice" ).innerHTML = "bitch";
										
									}

								</script>
-->
							
							
							
							<!-- increment and decrement button -->

<!--							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

							<a class="btn btn-primary btn-lg btn-block" type="submit" href="./cart-checkout.php" name="proceedPayment">Continue to checkout</a>

						</form>




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