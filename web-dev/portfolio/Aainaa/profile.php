<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile Page</title>
	<link href="../../css/hero.css" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="../../css/bootstrap-4.3.1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- jquery for scroll spy -->
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
		
		h1,
		h2,
		h3,
		h5 {
			/*			font-family: "Times New Roman", Times, serif !important;*/
			font-family: Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman", "serif";
			font-weight: bold;
		}
		
		hr {
			border: none;
			height: 1px;
			color: #333;
			background-color: #333;
		}
		
		body {
			background-color: #D3D3D3;
		}
		
		.hero-image {
			background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)), url("hero.jpg");
			height: 70%;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			position: relative;
		}
		
		#social-media {
			margin-right: 5px;
		}
		
		.checked {
			color: orange;
		}
		
		.navbar-light .navbar-nav .show> .nav-link,
		.navbar-light .navbar-nav .active> .nav-link,
		.navbar-light .navbar-nav .nav-link.show,
		.navbar-light .navbar-nav .nav-link.active {
			color: orange;
		}
		
		.navbar-light .navbar-nav .show> .nav-link,
		.navbar-light .navbar-nav> .nav-link,
		.navbar-light .navbar-nav .nav-link.show,
		.navbar-light .navbar-nav .nav-link {
			color: rgba(0, 0, 0, 0.8);
		}
		
		.headline {
			/*font-family: Calibri, "Helvetica", san-serif;*/
			line-height: 1.5em;
			color: black;
			/*			font-size: 20px;*/
		}
		
		.headline:after {
			content: ' ';
			display: block;
			border: 2px solid orange;
			width: 60px;
		}
		
		element.style {}
		
		@media (min-width: 768px) .col-md-6 {
			-ms-flex: 0 0 50%;
			flex: 0 0 50%;
			max-width: 50%;
		}
		
		.col-1,
		.col-2,
		.col-3,
		.col-4,
		.col-5,
		.col-6,
		.col-7,
		.col-8,
		.col-9,
		.col-10,
		.col-11,
		.col-12,
		.col,
		.col-auto,
		.col-sm-1,
		.col-sm-2,
		.col-sm-3,
		.col-sm-4,
		.col-sm-5,
		.col-sm-6,
		.col-sm-7,
		.col-sm-8,
		.col-sm-9,
		.col-sm-10,
		.col-sm-11,
		.col-sm-12,
		.col-sm,
		.col-sm-auto,
		.col-md-1,
		.col-md-2,
		.col-md-3,
		.col-md-4,
		.col-md-5,
		.col-md-6,
		.col-md-7,
		.col-md-8,
		.col-md-9,
		.col-md-10,
		.col-md-11,
		.col-md-12,
		.col-md,
		.col-md-auto,
		.col-lg-1,
		.col-lg-2,
		.col-lg-3,
		.col-lg-4,
		.col-lg-5,
		.col-lg-6,
		.col-lg-7,
		.col-lg-8,
		.col-lg-9,
		.col-lg-10,
		.col-lg-11,
		.col-lg-12,
		.col-lg,
		.col-lg-auto,
		.col-xl-1,
		.col-xl-2,
		.col-xl-3,
		.col-xl-4,
		.col-xl-5,
		.col-xl-6,
		.col-xl-7,
		.col-xl-8,
		.col-xl-9,
		.col-xl-10,
		.col-xl-11,
		.col-xl-12,
		.col-xl,
		.col-xl-auto {
			padding-left: 0;
		}
		
		/* skill bar */
		.grey-bar {
			color: #000!important;
			background-color: #f1f1f1!important
		}
		
		.green-bar {
			color: #fff!important;
			background-color: lightsalmon !important
		}

	</style>
</head>

<body data-spy="scroll">

	<div class="hero-image" id="home">
		<div class="hero-text">
			<h1 style="font-size:50px">Hey there!</h1>
			<p>I'm Aainaa, a software developer from <i class="fa fa-map-marker"></i> Malaysia.</p>
			<i class="fa fa-angle-down fa-3x"></i>
		</div>
	</div>

	<nav id="navbar_top" class="shadow navbar navbar-expand-lg bg-light navbar-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

		<div id="navbar-2" class="collapse navbar-collapse justify-content-md-center">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active" href="#home">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#about">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#skill">Skill</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#experience">Experiences</a>
				</li>

			</ul>
		</div>
	</nav>





	<div class="container" style="margin-top: 2em; margin-bottom: 2em">
		<div class="card shadow" style="width: 100%;">
			<div class="card-body">

				<section style="margin-top: 4em">
					<div class="container">
						<div class="row" id="about">
							<div class="col-md-5">
								<img class="shadow rounded" alt="400x400" src="avatar.jpg" data-holder-rendered="true" style="width: 400px;">
							</div>
							<div class="col-md-7">
								<div class="row">
									<h1><span class="headline">Introduction</span></h1>
									<!--									<h1>Background</h1>-->
								</div>
								<!--								<hr>-->
								<div class="row">
									<p>I am an adept software developer, and have work with many projects. I am proficient with various programming language. My personal interest include: deep learning, data mining, and learn more about today innovation. Aside from software developing, I also have done various web designing projects.</p>
								</div>
								<div class="row">
									<h5><span class="headline">Personal Information</span></h5>
								</div>
								<div class="row">
									<div class="col-md-3">
										<b>Name:</b>
									</div>
									<div class="col-md-9">
										Aainaa Nabilah binti Rohaizad
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<b>Age</b>
									</div>
									<div class="col-md-9">
										22
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<b>Address:</b>
									</div>
									<div class="col-md-9">
										Taman Desa Saujana, Kajang
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<b>Language:</b>
									</div>
									<div class="col-md-9">
										English, malay
									</div>
								</div>

							</div>
						</div>

						<br>

						<div class="row" id="skill">
							<h3><span class="headline">Skill</span></h3>
							<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>

						</div>

						<div class="row">
							<div class="col-md-6">
								<span>C++<i style="float:right;">90%</i></span>
								<div class="grey-bar">
									<div class="w3-container green-bar" style="width:90%; height: 10px;text-align: right;"></div>
								</div>
								<span>Java<i style="float:right;">80%</i></span>
								<div class="grey-bar">
									<div class="w3-container green-bar" style="width:80%; height: 10px;text-align: right;"></div>
								</div>
								<span>Python<i style="float:right;">70%</i></span>
								<div class="grey-bar">
									<div class="w3-container green-bar" style="width:70%; height: 10px;text-align: right;"></div>
								</div>

							</div>
							<div class="col-md-6">
								<span>HTML<i style="float:right;">100%</i></span>
								<div class="grey-bar">
									<div class="w3-container green-bar" style="width:100%; height: 10px;text-align: right;"></div>
								</div>
								<span>CSS<i style="float:right;">80%</i></span>
								<div class="grey-bar">
									<div class="w3-container green-bar" style="width:80%; height: 10px;text-align: right;"></div>
								</div>
								<span>PHP<i style="float:right;">90%</i></span>
								<div class="grey-bar">
									<div class="w3-container green-bar" style="width:90%; height: 10px;text-align: right;"></div>
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



					</div>
				</section>
			</div>
		</div>
	</div>
	<!--	script-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>