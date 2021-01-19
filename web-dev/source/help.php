<?php
session_start();

require_once "config.php";

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chatter bot</title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- collapse item faq -->
	<link href="../css/item-collapse.css" rel="stylesheet">

	<style>
		html {
			scroll-behavior: smooth;
		}
		
		.card {
			width: 100%;
			height: 10em;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="main.php"><img src="../images/logo.png" style="width:120px"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
		


			<div class="collapse navbar-collapse" id="navbarsExample07">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="./main.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">Donate</a>
						<div class="dropdown-menu" aria-labelledby="dropdown07">
							<a class="dropdown-item" href="./donation.php">Donation</a>
							<a class="dropdown-item" href="./adoption.php">Adoption</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Learn more</a>
						</div>
					</li>
					<li class="nav-item"> <a class="nav-link" href="./store-home.php">Store <span class="sr-only"></span></a> </li>
					<li class="nav-item active"> <a class="nav-link" href="help.php">Support <span class="sr-only"></span></a> </li>
										<?php 
					if ( ( isset( $_SESSION[ "loggedin" ] ) ) && ( $_SESSION[ "loggedin" ] === true ) ) {
						if($_SESSION["user_class"] == '1') {
							echo '<li class="nav-item"> <a class="nav-link" href="admin-home.php">Admin Home <span class="sr-only"></span></a> </li>';
						}
					}
					
					
					?>
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
						
						if ($cartQuantity != NULL)
						{
							echo ' <li><a class="nav-link" href="./cart.php"><span class="fa fa-shopping-cart"></span>
							 cart <span class="badge badge-secondary badge-pill">'.$cartQuantity.'</span></a>
							</li>';
						}
						else {
							echo ' <li><a class="nav-link" href="./cart.php" style="pointer-events: none; cursor: default;"><span class="fa fa-shopping-cart"></span>
							 cart <span class="badge badge-secondary badge-pill">'.$cartQuantity.'</span></a>
							</li>';
							
						}
						
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

	<header style="height: 25vh; min-height: 25vh; margin-top: 2em">
		<link href="../css/header.css" rel="stylesheet">
		<div class="overlay" style="background-color: rgb(255,152,000); opacity: 0.8;">
<!--			<img src="../images/customer-service.png"  alt="background">-->
		</div>
		
		<div class="container h-100">
			<div class="d-flex h-100 text-center align-items-center">
				<div class="w-100 text-white">
					<br>
					<h3 class="display-4">Zoo Fundraiser Help Center</h3>
					<p class="lead mb-0">Have a question? Let us help you!</p>
					
				</div>
			</div>
		</div>
	</header>
	
			<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent; ">
				<li class="breadcrumb-item"><a href="./main.php" style="color: rgb(255,152,000);">Home</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Support</li>
			</ol>
		</nav>
	</div>

	<section style="margin-top: 2rem">

		<div class="container">

			<div class="row featurette">


				<div class="col-md-7">
					<h3>Frequently ask question</h3>
					<div class="accordion">
						<div class="accordion-item">
							<div class="accordion-item-header">
								What is the differences between donation and adoption?
							</div>
							<div class="accordion-item-body">
								<div class="accordion-item-body-content">
									Donation is a one time program where you can choose to donate how much you want to Zoo Negara, meanwhile, adoption is a annual donation program where every month you will be charge with a donation fee. When subscribing to the adoption, you will be entitled to various perks. You can learn more about our donation and adoption programme, <a href="#">here</a>.
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<div class="accordion-item-header">
								What is adoption certificate?
							</div>
							<div class="accordion-item-body">
								<div class="accordion-item-body-content">
									Every adoption package, you will be entitled for an e-certificate. The e-certificate will be send to you via your registered email. You will be able to download and framed the certificate.
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<div class="accordion-item-header">
								Why I can't add item to cart?
							</div>
							<div class="accordion-item-body">
								<div class="accordion-item-body-content">
									To use the store feature you need to login into the Zoo Fundraiser first. Once, logged in you will be able to add to cart. You can login <a href="login.php">here</a> or if you are not register yet, you can register <a href="register.php">here</a>.
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<div class="accordion-item-header">
								How can I track my order?
							</div>
							<div class="accordion-item-body">
								<div class="accordion-item-body-content">
									You will receive email alerts from Zoo Fundraiser as soon as there is an update in your order status. 
<!--									Alternatively, you may retrieve the order information from your profile/order history by clicking on the "Track Your Order" icon. 	-->
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<div class="accordion-item-header">
								How much is the delivery charge if I bought items from the store?
							</div>
							<div class="accordion-item-body">
								<div class="accordion-item-body-content">
									Your total shipping cost from each merchant will be indicated at Checkout. The delivery fees may range from MYR10 - MYR30 depending on the location. We believe in customer delight, and from time-to-time we also work towards bringing free delivery promotions for our valued customers.
								</div>
							</div>
						</div>	
						<div class="accordion-item">
							<div class="accordion-item-header">
								What should I do if I need to update my order details?
							</div>
							<div class="accordion-item-body">
								<div class="accordion-item-body-content">
									Please be informed that we are unable to support any changes to an order, especially to the shipping address after it has been acknowledged by the merchants. If you wish to change, we suggest you cancel the existing order and place a new order. 
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<div class="accordion-item-header">
								Where can I watch the live streaming of my adoptee?
							</div>
							<div class="accordion-item-body">
								<div class="accordion-item-body-content">
									The link for the live streaming for your adopted animal will be shared to your registered email inbox.
								</div>
							</div>
						</div>
					</div>
					<script>
						const accordionItemHeaders = document.querySelectorAll( ".accordion-item-header" );

						accordionItemHeaders.forEach( accordionItemHeader => {
							accordionItemHeader.addEventListener( "click", event => {

								//Uncomment in case you only want to allow for the display of only one collapsed item at a time!

								const currentlyActiveAccordionItemHeader = document.querySelector( ".accordion-item-header.active" );
								if ( currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader !== accordionItemHeader ) {
									currentlyActiveAccordionItemHeader.classList.toggle( "active" );
									currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
								}

								accordionItemHeader.classList.toggle( "active" );
								const accordionItemBody = accordionItemHeader.nextElementSibling;
								if ( accordionItemHeader.classList.contains( "active" ) ) {
									accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
								} else {
									accordionItemBody.style.maxHeight = 0;
								}

							} );
						} );
					</script>
				</div>

				<div class="col-md-5">
					<iframe allow="microphone;" width="100%" height="530" src="https://console.dialogflow.com/api-client/demo/embedded/701451f6-7935-47d0-bece-b23492e6cac5">
				</iframe>
				
				</div>


			</div>

		</div>

	</section>
	
</body>
</html>