<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile Page</title>
	<link href="../../css/hero.css" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="../../css/bootstrap-4.3.1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		if ( $( window ).width() > 992 ) {
			$( window ).scroll( function () {
				if ( $( this ).scrollTop() > 500 ) {
					$( '#navbar_top' ).addClass( "fixed-top" );

				} else {
					$( '#navbar_top' ).removeClass( "fixed-top" );

				}
			} );
		}
	</script>
	<style>
		html {
		  scroll-behavior: smooth;
		}
		body {
/*			background-color: #CDCDCD;*/
			background-color: lavender;
		}
		
		hr {
			border: none;
			height: 1px;
			color: #333;
			background-color: #333;
		}

		.navbar {
    -webkit-box-shadow: 0 8px 6px -6px #999;
    -moz-box-shadow: 0 8px 6px -6px #999;
	box-shadow: 0 8px 6px -6px #999;
		}
		.hero-image {
			background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)), url("AI.jpg");
			height: 50%;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			position: relative;
		}

	</style>
</head>

<body>

	<div class="hero-image" id="home">
		<div class="hero-text">
			<h1 style="font-size:50px">Welcome to my profile!</h1>
			<p>Hi, just an IT student here</p>
			<i class="fa fa-angle-down fa-3x"></i>
		</div>
	</div>

	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
	

		<div class="collapse navbar-collapse justify-content-md-center">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#home">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#about">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Skill</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Experiences</a>
				</li>

			</ul>
		</div>
	</nav>

	<div class="container" style="margin-top: 2em; margin-bottom: 2em" id="about">
		<div class="card" style="width: 100%;">
			<div class="card-body">

				<section style="margin-top: 4em">
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<img class="rounded-circle" alt="400x400" src="../../images/Gion.jpg" data-holder-rendered="true" width="220" height="220">
							</div>
							<div class="col-md-8">
								<h1>Gion Min Ming</h1>
								<hr>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in.</p>
							</div>
						</div>

						<br>

						<div class="row">
							<div class="col-md-3">
								<h5>BASIC INFORMATION</h5>
							</div>

							<div class="col-md-9">

							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<hr>
							</div>

							<div class="col-md-9">
								<hr>
								<span style="height: 2px;"></span>
								<div class="row">
									<div class="col-md-2">
										<b>Age:</b>
									</div>
									<div class="col-md-10">
										21
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<b>Email:</b>
									</div>
									<div class="col-md-10">
										example@email.com
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<b>Phone:</b>
									</div>
									<div class="col-md-10">
										+6012-345-6789
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<b>Address:</b>
									</div>
									<div class="col-md-10">
										Taman Desa Saujana, Kajang
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<b>Language:</b>
									</div>
									<div class="col-md-10">
										English, Malay
									</div>
								</div>
							</div>
						</div>

						<br>

						<div class="row">
							<div class="col-md-3">
								<h5>CONTENT TITLE</h5>
							</div>

							<div class="col-md-9">

							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<hr>
							</div>

							<div class="col-md-9">
								<hr>
								<span style="height: 2px;"></span>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua . Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat . Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur . Excepteur sint occaecat cupidatat non proident, sunt in .
								</p>
							</div>
						</div>

						<br>

						<div class="row">
							<div class="col-md-3">
								<h5>CONTENT TITLE</h5>
							</div>

							<div class="col-md-9">

							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<hr>
							</div>

							<div class="col-md-9">
								<hr>
								<span style="height: 2px;"></span>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua . Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat . Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur . Excepteur sint occaecat cupidatat non proident, sunt in .
								</p>
							</div>
						</div>



					</div>
				</section>
			</div>
		</div>
	</div>


	

</body>
</html>