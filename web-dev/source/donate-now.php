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
<?php
	if (isset($_POST['proceedPayment'])) {
		
		$totalSummary = $_POST['amount'];
		$totalSummary = round($totalSummary, 2);
		
		$user_id = $_SESSION['id'];
		$date = date( 'Y-m-d H:i:s' );
		
		
		$sqlDonation = "INSERT INTO donation (user_id, payment_method, amount, datetime) VALUES ('".$user_id."', '1', '".$totalSummary."', '".$date."')";
		
			if(mysqli_query($link, $sqlDonation))
			{
				echo "<script>";
				echo "window.location.href='done-payment.php'";
				echo "</script>";
			}
			else
			{
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
	<title>Donation checkout page</title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="../css/form-validation.css" rel="stylesheet">
	<link href="../css/album.css" rel="stylesheet">

	<style>
		body {
			background-color: darkcyan;
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
			<a class="navbar-brand" href="#">Website logo &#124; <span class="lead">Donation</span></a>
        </button>	
			
					<ul class="navbar-nav ml-auto">
				<li><a class="nav-link" href="./donation.php"><span class="fa fa-home"></span> Home</a>
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
          </h4>
					
						<ul class="list-group mb-3">
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div>
									<h6 class="my-0">Amount</h6>
									<small class="text-muted">You are free to donate as much or as little an amount.:)</small>

								</div>
								<span class="text-muted">
								</span>
							</li>

							<li class="list-group-item d-flex justify-content-between">
								<span>Total (MYR)</span>
								<strong id="totalSummary">0</strong>
							</li>
						</ul>
					</div>
					<div class="col-md-8 order-md-1">
						<h4 class="mb-3">Donation</h4>
<!--						<form class="needs-validation" novalidate>-->
						<form name="myForm" onSubmit="validateForm()" method="post">
							<div class="row">
								<div class="col-md-12 mb-3">
									<label>Please enter amount (MYR):</label>

									
										<input type="text" class="form-control" id="amount" name="amount" placeholder="" value="" required>
										<script>
												var amount = document.querySelector('#amount');

												amount.addEventListener('input', restrictNumber);
												function restrictNumber (e) {  
												  var newValue = this.value.replace(new RegExp(/[^\d+\.\d{0,2}$]/,'ig'), "");
												  this.value = newValue;
													
													document.getElementById("totalSummary").innerHTML = "RM "+Math.round(newValue * 100) / 100;
												}
										</script>
										<div class="invalid-feedback">
											Valid amount is required.
										</div>

										
									
									
									
									
									
									
								</div>
							</div>

							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
									<script>
												var amount = document.querySelector('#cc-number');

												amount.addEventListener('input', restrictNumber);
												function restrictNumber (e) {  
												  var newValue = this.value.replace(new RegExp(/[^\d]/,'ig'), "");
												  this.value = newValue;
												}
										</script>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 mb-3">
									<label for="cc-expiration">Expiration</label>
									<input type="text" class="form-control" id="cc-expiration" placeholder="" required value="07/2025">
									<script>
												var amount = document.querySelector('#cc-expiration');

												amount.addEventListener('input', restrictNumber);
												function restrictNumber (e) {  
												  var newValue = this.value.replace(new RegExp(/[^\d{2}+\/\d{4}$]/,'ig'), "");
												  this.value = newValue;
												}
										</script>
									<div class="invalid-feedback">
										Expiration date required
									</div>
								</div>
								<div class="col-md-3 mb-3">
									<label for="cc-expiration">CVV</label>
									<input type="text" class="form-control" id="cc-cvv" placeholder="" required value="593">
									<script>
												var amount = document.querySelector('#cc-cvv');

												amount.addEventListener('input', restrictNumber);
												function restrictNumber (e) {  
												  var newValue = this.value.replace(new RegExp(/[^\d{3}]/,'ig'), "");
												  this.value = newValue;
												}
										</script>
									<div class="invalid-feedback">
										Security code required
									</div>
								</div>
							</div>
							<hr class="mb-4">
							
							<button class="btn btn-primary btn-lg btn-block" name="proceedPayment" value="'.$merch_id.'" onClick="return confirm('Are you sure?')" >Proceed Payment</button>
							
<!--
							<script>
								function myPayment() {
	
									if (confirm("Are you sure? You won't be able to go back to this page.")) {
										
										window.location.href='done-payment.php';
									  } 
									
									return false;
								}
							
							</script>
-->
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
</body>
</html>