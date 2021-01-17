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
	<title>Homepage</title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		html {
			scroll-behavior: smooth;
		}

		h6 {
			margin-top: 1em;
		}
		* {
  box-sizing: border-box;
}

.headline {
  font-family: Calibri, "Helvetica", san-serif;
  line-height: 1.5em;
  color: black;
  font-size: 20px;
  position: relative;
  position: relative;
}

.headline:after {
  content:' ';
  position: absolute;
  top:100%;
  left:50%;
  width: 60px;
  border:2px solid #007bff;
  border-radius:4px;
  box-shadow:inset 0 1px 1px rgba(0, 0, 0, .05);
  transform:translateX(-50%);

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
					<li class="nav-item active">
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

	<header>
		<link href="../css/header.css" rel="stylesheet">
		<div class="overlay">
		</div>
		<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
			<source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
<!--			<source src="https://r6---sn-npoeene7.googlevideo.com/videoplayback?expire=1609243963&ei=2sjqX-7EPLmL2_gPhYCokA0&ip=185.43.249.148&id=o-ALEIHNEeUxQBabMgWhR5_N0TP762FJxpceKbTOiaDrB1&itag=137&aitags=133%2C134%2C135%2C136%2C137%2C160%2C242%2C243%2C244%2C247%2C248%2C278&source=youtube&requiressl=yes&vprv=1&mime=video%2Fmp4&ns=bnlcfAq-syqirZTCoJi-U_AF&gir=yes&clen=5583580&otfp=1&dur=14.999&lmt=1519602741322104&fvip=6&keepalive=yes&c=WEB&n=eG5-A-LqGpc1Ys5m&sparams=expire%2Cei%2Cip%2Cid%2Caitags%2Csource%2Crequiressl%2Cvprv%2Cmime%2Cns%2Cgir%2Cclen%2Cotfp%2Cdur%2Clmt&sig=AOq0QJ8wRQIgZ9h_96CtPLWC7oaOnlWrgKx1RfCh3G2rtHCuIgdlbr4CIQDVcuC5d4uJsdaKtCA70V4TzZxVdrrlQqOFe-i7fU6yzA%3D%3D&rm=sn-2puapox-ig3s7e&req_id=dc0e189bed42a3ee&redirect_counter=2&cm2rm=sn-3c2le7d&cms_redirect=yes&mh=Na&mip=60.52.105.255&mm=34&mn=sn-npoeene7&ms=ltu&mt=1609222110&mv=m&mvi=6&pl=21&lsparams=mh,mip,mm,mn,ms,mv,mvi,pl&lsig=AG3C_xAwRQIgfHZp-KIOwuaXvQ_Uh7I9Ahb8ygsbrQrygyImPQKDT_ICIQCK_J8djVji0FjUxjfANsH0AnIfFvkcOhvggVM4Tthd4A%3D%3D" type="video/mp4">-->
		</video>
		<div class="container h-100">
			<div class="d-flex h-100 text-center align-items-center">
				<div class="w-100 text-white">
					<h1 class="display-3">Welcome to Zoo Fundraiser!</h1>
					<p class="lead mb-0">Where you can help Zoos by donating or buying merchandise.</p>
					<br>
					<p class="text-center"><a class="btn btn-primary btn-lg" href="#why-some-might-question" role="button">Learn more</a> </p>
				</div>
			</div>
		</div>
	</header>

	<br id="why-some-might-question">
	<br>
	<section>

		<div class="container">
			<div class="row featurette">
				<div class="col-md-6">
					<h2 class="featurette-heading">Why? <span class="text-muted">Some might question the reasoning behind it.</span></h2>
					<p class="lead">Due to the dwindling number of visitors to Zoo Negara, especially since COVID-19 struck our country, Malaysian Zoological Society is having difficulty obtaining funds to maintain the Zoo Negara. </p>
					<p class="lead">You can play your part in supporting our Zoo, and every cent counts!</p>

					<p><a class="btn btn-secondary" href="https://bernama.com/en/general/news_covid-19.php?id=1902186" role="button" target="_blank">View details &raquo;</a>
					</p>
				</div>
				<div class="col-md-3" style="margin-top: 1rem; margin-bottom: 1rem;">
					<img class="featurette-image img-fluid mx-auto" src="../images/dude.jpg" alt="Generic placeholder image">
				</div>
				<div class="col-md-3" style="margin-top: 1rem; margin-bottom: 1rem;">
					<h3><span class="fa fa-quote-left"><i>We only have enough emergency funds to last three months.</i></span></h3>
					<small class="blockquote-footer"> Dr Mat Naim Ramli, Zoo Negara zoology, veterinary & Giant Panda Conservation Centre director, Bernama on 17th November 2020
					</small>
				</div>
			</div>
		</div>
		<hr class="featurette-divider">

		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-4 mt-2 text-center">
					<h2><span class="headline">Meet The Team Behind This Project</span></h2>

<!--					<p class="lead">We are Computer Science students, trying to do what we can to help our Zoo out.</p>-->
				</div>
			</div>
		</div>
		<div class="container" style="margin-bottom: 2em">
			<div class="row">
				<div class="col-lg-1 col-md-6 col-sm-12 text-center"></div>
				<div class="col-lg-2 col-md-6 col-sm-12 text-center">
					<img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="../images/janson.png" data-holder-rendered="true">
					<h6>Janson</h6>		
					<a href="#"> View portfolio → </a>
<!--					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>-->
				</div>
				<div class="col-lg-2 col-md-6 col-sm-12 text-center">
					<img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="../images/Concillia.jpg" data-holder-rendered="true">
					<h6>Concillia</h6>
					<a href="#"> View portfolio → </a>
<!--					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>-->
				</div>
				<div class="col-lg-2 col-md-6 col-sm-12 text-center">
					<img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="../images/Gion.jpg" data-holder-rendered="true">
					<h6>Min Ming</h6>
					<a href="#"> View portfolio → </a>
<!--					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>-->
				</div>
				<div class="col-lg-2 col-md-6 col-sm-12 text-center">
					<img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="../images/Aainaa.jpg" data-holder-rendered="true">
					<h6>Aainaa</h6>
					<a href="#"> View portfolio → </a>
					<!--					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>-->
				</div>
				<div class="col-lg-2 col-md-6 col-sm-12 text-center">
					<img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="../images/avatar.jpg" data-holder-rendered="true">
					<h6>Yong Yeong</h6>
					<a href="#"> View portfolio → </a>
<!--					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>-->
				</div>
				<div class="col-lg-1 col-md-6 col-sm-12 text-center"></div>
<!--
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="../images/avatar.jpg" data-holder-rendered="true">
					<h3>Lorem ipsum</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
				</div>
-->
			</div>

		</div>
		
		<?php 
					if ( isset( $_SESSION[ "loggedin" ] ) && $_SESSION[ "loggedin" ] === true ) {
						echo '<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="text-center col-md-8 col-12 mx-auto">
						<p class="lead">Welcome back!</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-auto mx-auto"> <a class="btn btn-block btn-lg btn-success" href="./register.php" title="">Donate now!</a> </div>
				</div>
			</div>
		</div>';
					}
			else{
										echo '<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="text-center col-md-8 col-12 mx-auto">
						<p class="lead">Not yet a member? Register An Account Here to Donate & Get Cool Vouchers!</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-auto mx-auto"> <a class="btn btn-block btn-lg btn-success" href="./register.php" title="">Register now!</a> </div>
				</div>
			</div>
		</div>';
			}
		?>
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