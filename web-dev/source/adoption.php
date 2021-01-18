<?php
session_start();

require_once "config.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adoption page</title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--	<link href="css/carousel.css" rel="stylesheet">-->
	<style>
	html {
	  scroll-behavior: smooth;
	}
	</style>
	
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">Website logo</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
		

			<div class="collapse navbar-collapse" id="navbarsExample07">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item ">
						<a class="nav-link" href="./main.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">Donate</a>
						<div class="dropdown-menu" aria-labelledby="dropdown07">
							<a class="dropdown-item" href="./donation.php">Donation</a>
							<a class="dropdown-item" href="./adoption.php">Adoption</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Learn more</a>
						</div>
					</li>
					<li class="nav-item"> <a class="nav-link" href="./store-home.php">Store <span class="sr-only"></span></a> </li>
					<li class="nav-item"> <a class="nav-link" href="help.php">Support <span class="sr-only"></span></a> </li>
				</ul>
				<ul class="navbar-nav ml-auto">

				<?php 
					if ( ( isset( $_SESSION[ "loggedin" ] ) ) && ( $_SESSION[ "loggedin" ] === true ) ) {
						
						$user_id = $_SESSION['id'];
						
						$sqlCartQuantity = 'SELECT sum(quantity) FROM cart WHERE user_id="'.$user_id.'"';
						
						$resultCartQuantity = mysqli_query($link, $sqlCartQuantity);
		 
						 while($row = mysqli_fetch_array($resultCartQuantity)) {

							 if ( $resultCartQuantity -> num_rows > 0) {
								 
								 	$cartQuantity		= $row[ "sum(quantity)" ];
							 }
						 }
						
						echo ' <li><a class="nav-link" href="./cart.php"><span class="fa fa-shopping-cart"></span> 
							 cart <span class="badge badge-secondary badge-pill">'.$cartQuantity.'</span></a>
							</li>';
						
						echo '	<li><a class="nav-link" href="logout.php" onClick="return confirm(\'are you sure?\')"> 
							 Log out <span class="fa fa-sign-out"></span></a>
							</li>';
						}
					else {
						echo '<li><a class="nav-link" href="./login.php"><span class="fa fa-sign-in"></span> Login</a>
						</li>';
						}
				
				?>


				</ul>
			</div>
		</div>
	</nav>
	
	<script>
		
var dropdown = document.getElementsByClassName("dropdown-toggle");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

	<header style="height: 30vh;">
		<link href="../css/header.css" rel="stylesheet">
		<div class="overlay" style="background-color:cornflowerblue;">
		</div>
		<!--			<img src="images/header(1).jpg" alt="background">-->
		<div class="container h-100">
			<div class="d-flex h-100 text-center align-items-center">
				<div class="w-100 text-white">
					<h1 class="display-3">Get Involved - Adopt Our Animals!</h1>
					<p class="lead mb-0">By 'adopting' an animal, one can help out with food, upkeep and veterinary care for our wildlife.</p>
					<br>
					<p class="text-center"><a class="btn btn-primary btn-lg" href="#terms" role="button">Terms & condition</a> </p>
				</div>
			</div>
		</div>
	</header>

	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent; ">
				<li class="breadcrumb-item"><a href="./main.php" >Home</a>
				</li>
				<li class="breadcrumb-item"><a href="#">Learn more</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Adoption</li>
			</ol>
		</nav>
	</div>

	<section>

		<div class="container">
			<div class="row featurette">
				<div class="col-md-7" style="margin-top: 1rem; margin-bottom: 1rem;">
					<h2 class="featurette-heading">Do something remarkable, <span class="text-muted">adopt an animal today!</span></h2>
					<p class="lead">Share your love for wildlife and help spread the word about conservation around the world. </p>
					<p class="lead">Your symbolic adoption supports our worldwide conservation efforts, as well as our animal enrichment programs.</p>

<!--
					<p><a class="btn btn-secondary" href="adopt-now.php" role="button" target="_blank">Adopt now &raquo;</a>
					</p>
-->
					
					<?php 
					if ( isset( $_SESSION[ "loggedin" ] ) && $_SESSION[ "loggedin" ] === true ) {
						echo '<p><a class="btn btn-secondary" href="adopt-now.php" role="button" >Adopt now &raquo;</a></p>';
					}
					else {
						echo '<p><a class="btn btn-secondary inactivelink" href="adopt-now.php" role="button" style="pointer-events:none;">Adopt now &raquo;</a></p>';
						echo '<span style="color:red;" ><i class="fa fa-info-circle"></i> You need to login first, to use this feature.</span>';
					}
					?>
					
				</div>
				<div class="col-md-5">
					<img class="featurette-image img-fluid mx-auto" src="../images/adoption-homepage.jpg" alt="Generic placeholder image">
				</div>
			</div>
		</div>

		<hr class="featurette-divider">

		<div class="container">
			<div class="row featurette">
				<div class="col-md-6" style="margin-top: 1rem; margin-bottom: 1rem;">
					<h2 class="featurette-heading">There's perks! <span class="text-muted">Your adoption contribution entitles you to added benefits.</span></h2>
					<p class="lead">Adopt-an-Animal parents will receive: </p>
				</div>

				<div class="col-md-6">

					<div class="lead"><span><i class="fa fa-check-circle fa-3x" aria-hidden="true" style="vertical-align: middle; color: cornflowerblue;"></i> A certificate of adoption</span> </div>
					<div class="lead"><span><i class="fa fa-check-circle fa-3x" aria-hidden="true" style="vertical-align: middle; color: cornflowerblue;"></i> A certificate of adoption</span> </div>
					<div class="lead"><span><i class="fa fa-check-circle fa-3x" aria-hidden="true" style="vertical-align: middle; color: cornflowerblue;"></i> A certificate of adoption</span> </div>
					<div class="lead"><span><i class="fa fa-check-circle fa-3x" aria-hidden="true" style="vertical-align: middle; color: cornflowerblue;"></i> A certificate of adoption</span> </div>



				</div>

			</div>
		</div>
		<br>
		
		<div class="jumbotron">
			<div class="container">
				<div class="row col-md-12">
					<h2 class="featurette-heading">Have a favourite animals? <span class="text-muted">Below are animals available for adoption</span></h2><br>
				</div>
				<div class="row col-md-12">
					<ul class="lead">
						<li>Panda</li>
						<li>Tiger</li>
						<li>Leopard</li>
						<li>Orang utan</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="container" id="terms">
			<h2>Terms and conditions</h2>
			<small>December 21, 2020</small>
			<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			<ul>
				<li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
				<li>Donec id elit non mi porta gravida at eget metus.</li>
				<li>Nulla vitae elit libero, a pharetra augue.</li>
			</ul>
			<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
			<p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
		</div>
		<br>
		<br>

		<div class="jumbotron">
			<div class="container">
				<blockquote class="blockquote text-center">
					<p class="mb-0"><span class="fa fa-quote-left fa-2x">The best among you are those who bring greatest benefits to many others</span>
					</p>
					<footer class="blockquote-footer">Prophet Muhammad (Peace be Upon Him)</footer>
				</blockquote>
			</div>
		</div>
	</section>

	<footer class="text-center">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p>Copyright © 2020-2021 Universiti Teknikal Malaysia Melaka. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--	<script src="../js/jquery-3.3.1.min.js"></script>-->
	<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--	<script src="../js/popper.min.js"></script>-->
<!--	<script src="../js/bootstrap-4.3.1.js"></script>-->
</body>
</html>