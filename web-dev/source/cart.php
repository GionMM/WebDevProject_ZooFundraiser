<?php
session_start();

if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"] != true)) {
	header("location: main.php");
	exit;
} else {
	$user_id = $_SESSION['id'];
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
		[type=radio]+img {
			cursor: pointer;
		}

		/* CHECKED STYLES */
		[type=radio]:checked+img {
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
				<li><a class="nav-link" href="./adoption.php"><span class="fa fa-home"></span> Home</a>
				</li>
			</ul>

		</div>
	</nav>

	<?php
	if (isset($_POST['updateQuantity'])) {
		$user_id = $_SESSION['id'];
		$merch_id = $_POST['merch_id'];
		$quantity = $_POST['quantity'];

		if ($quantity == 0) {
			$sql = "DELETE FROM `cart` WHERE `merch_id`=$merch_id AND `user_id`=$user_id";
			mysqli_query($link, $sql) or die("Remove Failed");
		} else if ($quantity >= 1) {
			$sql = "UPDATE `cart` SET `quantity`= '$quantity' WHERE `user_id`='$user_id' AND `merch_id`='$merch_id' ";
			mysqli_query($link, $sql) or die("Update Quantity Failed");
		}
	}
	?>


	<div class="container" style="margin-top: 2em">

		<div class="card" style="width: 100%;">
			<div class="card-body">
				<div class="row">
					<?php
					$sqlCartQuantity = 'SELECT sum(quantity) FROM cart WHERE user_id="$user_id"';

					$resultCartQuantity = mysqli_query($link, $sqlCartQuantity);

					while ($row = mysqli_fetch_array($resultCartQuantity)) {

						if ($resultCartQuantity->num_rows > 0) {

							$cartQuantity		= $row["sum(quantity)"];
						}
					}
					?>

					<div class="col-md-8 order-md-1">
						<h4 class="mb-3">Cart (<?php echo $cartQuantity; ?> items)</h4>


						<?php
						$query = "SELECT * FROM merch m, cart c WHERE m.merch_id=c.merch_id AND c.user_id='$user_id'";
						$result = mysqli_query($link, $query);
						$total = 0;

						while ($row = mysqli_fetch_array($result)) {

							if ($result->num_rows > 0) {
								$merch_id 		= $row["merch_id"];
								$merch_name 	= $row["merch_name"];
								$merch_price 	= $row["merch_price"];
								$merch_photo 	= $row["merch_photo"];
								$quantity		= $row["quantity"];

								$total += ($merch_price * $quantity);

						?>
								<div class="row" style="margin-top:0.5em;">
									<div class="col-md-5">
										<div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
											<img class="img-thumbnail" src="data:image/jpeg;base64,<?php echo (base64_encode($merch_photo)); ?>">
										</div>
									</div>
									<div class="col-md-7">
										<div>
											<div class="d-flex justify-content-between align-items-center">
												<div>
													<h5><?php echo $merch_name; ?></h5>
													<p class="mb-3 text-muted text-uppercase small">ID - <?php echo $merch_id ?></p>

													<div class="input-group">
														<form method="POST">
															<input type="button" value="-" class="button-minus" data-field="quantity">
															<input type="text" name="merch_id" value="<?php echo $merch_id; ?>" required hidden>
															<input type="number" value="<?php echo $quantity; ?>" name="quantity" class="quantity-field" min="1" max="10" readonly>
															<input type="button" value="+" class="button-plus" data-field="quantity">
															<button class="btn btn-primary" name="updateQuantity" type="submit">Update Quantity</button>
														</form>
													</div>


												</div>
											</div>
											<div class="d-flex justify-content-between align-items-center">
												<div>
													<form method="POST">
														<input type="text" name="merch_id" value="<?php echo $merch_id; ?>" required hidden>
														<input type="number" value="0" name="quantity" required hidden>
														<button class="btn btn-danger" name="updateQuantity" type="submit">Remove Item</button>
													</form>
												</div>
												<p class="mb-0"><span><strong><?php echo 'RM ' . number_format(($merch_price * $quantity), 2, '.', ''); ?></strong></span>
												</p>
											</div>
										</div>
									</div>
								</div>


						<?php

							}
						} ?>
					</div>

					<div class="col-md-4 order-md-2 mb-4">
						<h4 class="d-flex justify-content-between align-items-center mb-3">
							<span class="text-muted">Order summary</span>
							<!--            <span class="badge badge-secondary badge-pill">3</span>-->
						</h4>


						<ul class="list-group mb-3">
							<li class="list-group-item d-flex justify-content-between">
								<span>Subtotal</span>
								<strong><?php echo 'RM ' . number_format($total, 2, '.', '') ?></strong>
							</li>
						</ul>

					</div>


					<!--
							<div class="row">
								<div class="col-md-5">
									<div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
										<img class="img-fluid w-100" src="../images/tiger-backpack.jpg" alt="Sample">
									</div>
								</div>
								<div class="col-md-7">
									<div>
										<div class="d-flex justify-content-between">
											<div>
												<h5>Red hoodie</h5>
												<p class="mb-3 text-muted text-uppercase small">Shirt - red</p>
												<p class="mb-2 text-muted text-uppercase small">Color: red</p>
												<p class="mb-3 text-muted text-uppercase small">Size: M</p>
											</div>
											<div>

												<div class="input-group">
													<input type="button" value="-" class="button-minus" data-field="quantity">
													<input type="number" step="1" max="" value="1" name="quantity" class="quantity-field">
													<input type="button" value="+" class="button-plus" data-field="quantity">
												</div>


											</div>
										</div>
										<div class="d-flex justify-content-between align-items-center">
											<div>
												<a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
											</div>
											<p class="mb-0"><span><strong>RM  35.99</strong></span>
											</p>
										</div>
									</div>
								</div>
							</div>
-->




					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

					<hr class="mb-4">


				</div>
			</div>
		<div class="container" style="margin-top: 2em">
		<div class="input-group">
		<a href="cart-checkout.php" class="btn btn-primary btn-lg btn-block"> Continue to checkout </a>
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