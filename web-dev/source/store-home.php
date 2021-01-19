<?php
session_start();

require_once "config.php";

?>
<?php
	if (isset($_POST['addToCart'])) {
		
		$user_id = $_SESSION['id'];
		
		$merch_id = $_POST['addToCart'];
		
		
		$sqlCheckCart = "SELECT * FROM cart WHERE merch_id='".$merch_id."' AND user_id='".$user_id."' ";
		
		$resultCheckCart = $link ->query($sqlCheckCart);
		
		if($resultCheckCart->num_rows > 0) {
			
			$sqlUpdateCart = "UPDATE cart SET quantity=quantity+1 WHERE merch_id='".$merch_id."' AND user_id='".$user_id."'";
				
			if(mysqli_query($link, $sqlUpdateCart))
			{
				echo "<script>";
				echo "alert('Cart updated.');";
				echo "window.location.href='store-home.php'";
				echo "</script>";
			}
			else
			{
				echo "<script>";
				echo "alert('Error updating cart.');";
				echo "window.location.href='store-home.php'";
				echo "</script>";
			}
		}
		else{
			$sqlInsertCart = "INSERT  INTO cart (merch_id, user_id, quantity) VALUES ('".$merch_id."', '".$user_id."', '1')";
			
			if(mysqli_query($link, $sqlInsertCart))
			{
				echo "<script>";
				echo "alert('Item has been added to cart.');";
				echo "window.location.href='store-home.php'";
				echo "</script>";
			}
			else
			{
				echo "<script>";
				echo "alert('Error inserting item into cart.');";
				echo "window.location.href='store-home.php'";
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
	<title>Donation page</title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<link href="../css/navbar.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style>
	html {
	  scroll-behavior: smooth;
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
					<li class="nav-item ">
						<a class="nav-link" href="./main.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown ">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">Donate</a>
						<div class="dropdown-menu" aria-labelledby="dropdown07">
							<a class="dropdown-item" href="./donation.php">Donation</a>
							<a class="dropdown-item" href="./adoption.php">Adoption</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Learn more</a>
						</div>
					</li>
					<li class="nav-item active"> <a class="nav-link" href="./store-home.php">Store <span class="sr-only"></span></a> </li>
					<li class="nav-item"> <a class="nav-link" href="help.php">Support <span class="sr-only"></span></a> </li>
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
	
	<header style="height: 30vh;">
		<link href="../css/header.css" rel="stylesheet">
		<div class="overlay" style="background-color:blueviolet;">
		</div>
		<!--			<img src="images/header(1).jpg" alt="background">-->
		<div class="container h-100">
			<div class="d-flex h-100 text-center align-items-center">
				<div class="w-100 text-white">
					<h1 class="display-3">Shop now!</h1>
					<p class="lead mb-0">Every profits from the store will be donated to the Zoo Negara.</p>
					<br>
					<p class="text-center"><a class="btn btn-primary btn-lg" href="#terms" role="button" style="background-color:#DF6589; border-color: transparent;">Terms & condition</a> </p>
				</div>
			</div>
		</div>
	</header>
	
		<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent; ">
				<li class="breadcrumb-item"><a href="./main.php" style="color: blueviolet;">Home</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Store</li>
			</ol>
		</nav>
	</div>
	
	    <hr>
	
    <h2 class="text-center">ALL PRODUCTS</h2>
    <hr>
	<section>
	 <div class="container">
	
		 <?php 
		 
		 echo '<div class="row text-center">';
		 
		 $query = "SELECT * FROM merch";
		 $result = mysqli_query($link, $query);
		 
		 while($row = mysqli_fetch_array($result)) {
			 
			 if ( $result -> num_rows > 0) {
				 $merch_id 		= $row[ "merch_id" ];
				 $merch_name 	= $row[ "merch_name" ];
				 $merch_price 	= $row[ "merch_price" ];
				 $merch_photo 	= $row[ "merch_photo" ];
				 
				 echo '<div class="col-md-4 pb-1 pb-md-0" style="margin-top:2em;">
						  <div class="card">
							<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($merch_photo).' alt="Card image cap">
							<div class="card-body">
							  <h5 class="card-title">'.$merch_name.'</h5>
							  <p class="card-text">RM '.$merch_price.'</p>
							  <form method="POST">';
				 
				if ( isset( $_SESSION[ "loggedin" ] ) && $_SESSION[ "loggedin" ] === true ) {
						echo '<button class="btn btn-primary" name="addToCart" value="'.$merch_id.'" >Add to Cart</button>';
					}
				 else{
					 echo '<button class="btn btn-primary" name="addToCart" value="'.$merch_id.'" style="pointer-events:none;">Add to Cart</button>';
				 }
				 
				
				 echo '			</form>
							</div>
						  </div>
						</div>';
					 
			 }
		 }
		 echo '</div>'
		 
		 ?>
		 	 
<!--
      <div class="row text-center">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="../images/tiger-backpack.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Tiger Kid Bagpack</h5>
              <p class="card-text">RM 55.00</p>
              <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Tiger Pencil</h5>
              <p class="card-text">RM 15.00</p>
              <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Panda Pillow</h5>
              <p class="card-text">RM 30.00</p>
              <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
          </div>
        </div>
      </div>
		 
      <div class="row text-center mt-4">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Sun Bear Plush</h5>
              <p class="card-text">RM 40.00</p>
              <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Animal Printed Mug</h5>
              <p class="card-text">RM 20.00</p>
              <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Animal Ceramic Mug</h5>
              <p class="card-text">RM 55.00</p>
              <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
          </div>
        </div>
      </div>
-->
    </div>
		
		<hr class="featurette-divider">

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
					<p class="mb-0"><span class="fa fa-quote-left fa-2x">Be the change you want to see in the world</span>
					</p>
					<footer class="blockquote-footer">Mahatma Gandhi</footer>
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