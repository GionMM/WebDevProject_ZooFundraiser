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
		
		/* vertical line */
		.vl {
			border-right: 6px solid lightsalmon;
			height: 150px;
		}
		
		/* rounded fa icon */
		a.fa {
			color: lightsalmon !important;
			text-decoration: none;
		}
		
		i.fa-2x {
			color: lightsalmon !important;
		}
		
		/* form */
		input[type=text],
		select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		
		input[type=submit] {
			width: 100%;
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
		
		input[type=submit]:hover {
			background-color: #45a049;
		}
		
		/* puzzle */
		.example_body * {
			margin: 0;
			padding: 0;
		}
		
		.holder {
			margin: 20px auto;
			width: 300px;
		}
		
		ul,
		li {
			list-style: none;
		}
		
		img {
			vertical-align: top;
		}
		
		#puzzle {
			width: 300px;
		}
		
		#puzzle:after {
			content: "";
			display: block;
			clear: both;
		}
		
		#puzzle .puzzle-piece {
			float: left;
		}
		
		#puzzle .puzzle-piece.start {
			background: #eaf2fe;
		}
		
		#puzzle .puzzle-piece.over {
			background: #d5d5d5;
		}

	</style>
</head>

<body data-spy="scroll">

	<div class="hero-image" id="home">
		<div class="hero-text">
			<h1 style="font-size:50px">Hey there!</h1>
			<p>I'm Aainaa, a web designer and system developer from <i class="fa fa-map-marker"></i> Malaysia.</p>
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
					<a class="nav-link" href="#experience">Projects</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#gallery">Gallery</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#contact">Contact</a>
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
									<p>I am an adept system developer, and have work with many projects. I am proficient with various programming language. My personal interest include: deep learning, data mining, and learn more about today innovation. Aside from software developing, I also have done various web designing projects.</p>
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
							<p class="col-md-12">Below are my professional skill sets for web designing and system programming. </p>

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

						<div class="row" id="experience">
							<h3><span class="headline">Projects</span></h3>
							<p class="col-md-12">These are all past projects that I've done in collaboration with my team members. We're extremely proud of each project that we done. The codes for these projects can be found on my Github page.
							</p>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-1">
										<div class="vl"></div>
									</div>
									<div class="col-md-11">
										<h5>Buffet Decision using Genetic Algorithm</h5>
										<small>2019-2020</small>
										<p>Evolutionary algorithm is applied to the task of generating buffet menus based on time taken to finish food and get money's worth from the buffet.</p>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-1">
										<div class="vl"></div>
									</div>
									<div class="col-md-11">
										<h5>Handwriten Text Recognition</h5>
										<small>2020-2021</small>
										<p>A system for recognizing handwritten characters, including pre-processing apparatus for generating a set of features for each handwritten character.</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-1">
										<div class="vl"></div>
									</div>
									<div class="col-md-11">
										<h5>Dvd Rental Management System</h5>
										<small>2018-2019</small>
										<p>A simple management system develop using Java programming to keep track of a Dvd store transaction and user data.</p>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-1">
										<div class="vl"></div>
									</div>
									<div class="col-md-11">
										<h5>Text Summarisation Tool</h5>
										<small>2020-2021</small>
										<p>This summarising tool can condenses articles, papers, and other documents into a bulleted Key Sentences list or in a new paragraph.</p>
									</div>
								</div>
							</div>

						</div>

						<br>

						<div class="row" id="gallery">
							<h3><span class="headline">Gallery</span></h3>
						</div>

						<div class="row">
							<div class="col-md-7">
								<div class="row" style="margin-left:1em;">
									<img src="gallery.jpg" style="width: 170px;">&nbsp;
									<img src="gallery(1).jpg" style="width: 170px;">&nbsp;
									<img src="gallery(2).jpg" style="width: 170px;">

								</div>


							</div>
							<div class="col-md-5">
								<iframe width="426" height="240" src="https://www.youtube.com/embed/NlIjz7NCxy4">
								</iframe>
							


								<audio controls="controls">
									<source src="https://docs.google.com/uc?export=download&id=1DXPKe1v5QRHz5jOYCTwacCpNa0Dvz7YC">
								</audio>

							</div>

						</div>

						<br>

						<div class="row" id="contact">
							<h3><span class="headline">Contact</span></h3>
						</div>

						<div class="row">
							<div class="col-md-5">

								<div class="row" style="margin-left:10px;">

									<div class="col-md-3">
										<b>Address</b>
									</div>
									<div class="col-md-9">
										Taman Desa Saujana, Kajang, 43000
									</div>
									<br>
									<div class="col-md-3">
										<b>Email:</b>
									</div>
									<div class="col-md-9">
										aainaa.nabila99@gmail.com
									</div>
									<br>
									<div class="col-md-3">
										<b>Phone:</b>
									</div>
									<div class="col-md-9">
										(+60)13-206-6044
									</div>
								</div>
								<br>
								<div class="col-md-12">
									<span class="fa-stack fa-lg">
									  <a class="fa fa-circle-thin fa-stack-2x"></a>
									  <a class="fa fa-twitter fa-stack-1x" href="https://twitter.com/celoudnn" target="_blank"></a>
									</span>
								


									<span class="fa-stack fa-lg">
									  <a class="fa fa-circle-thin fa-stack-2x"></a>
									  <a class="fa fa-facebook fa-stack-1x" href="https://www.facebook.com/aainaa.rohaizad.1" target="_blank"></a>
									</span>
								


									<span class="fa-stack fa-lg">
									  <a class="fa fa-circle-thin fa-stack-2x"></a>
									  <a class="fa fa-instagram fa-stack-1x" href="https://www.instagram.com/ainarohaizad/" target="_blank"></a>
									</span>
								


									<span class="fa-stack fa-lg">
									  <a class="fa fa-circle-thin fa-stack-2x"></a>
									  <a class="fa fa-github fa-stack-1x" href="https://github.com/supcicak0" target="_blank"></a>
									</span>
								


								</div>

							</div>
							<div class="col-md-7">
								<form>
									<div class="row">
										<input type="text" name="name" class="form-control" id="name" placeholder="Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
									</div>
									<div class="row">
										<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
									</div>
									<div class="row">
										<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
									</div>
									<div class="row">
										<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
									</div>
									<div class="text-center">
										<button class="btn btn-primary" style="margin-top: 5px;background-color: lightsalmon;border: none;">Submit</button>
									</div>

								</form>
							</div>

						</div>

						<br>
						<!-- source: http://download.tizen.org/misc/examples/w3c_html5/ui/html5_drag_and_drop/ -->
						<div class="row">
							<h3><span class="headline">Just for Fun!</span></h3>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="example_body col-md-8">
								<div class="holder">
									<div>
										<p class="txt" style="text-align: center">Try to complete the puzzle below.</p>
									</div>
									<ul id="puzzle">
										<li class="puzzle-piece" draggable="true">
											<img src="puzz_06.png">
										</li>
										<li class="puzzle-piece" draggable="true">
											<img src="puzz_02.png">
										</li>
										<li class="puzzle-piece" draggable="true">
											<img src="puzz_04.png">
										</li>
										<li class="puzzle-piece" draggable="true">
											<img src="puzz_05.png">
										</li>
										<li class="puzzle-piece" draggable="true">
											<img src="puzz_01.png">
										</li>
										<li class="puzzle-piece" draggable="true">
											<img src="puzz_03.png">
										</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>



						<script>
							var cols = document.querySelectorAll( '#puzzle .puzzle-piece' );
							var colsLength = cols.length;

							var dragElem = null;

							var puzzleKey = [ "01", "02", "03", "04", "05", "06" ];
							var puzzleArray = [];

							function puzzleCheck() {
								//Initialize user key
								puzzleArray = [];
								//Insert the key in the array
								for ( var i = 0; i < colsLength; i++ ) {
									puzzleArray.push( cols[ i ].children[ 0 ].getAttribute( 'src' ).substring( 5, 7 ) );
								};
								originKey = puzzleKey.join();
								userKey = puzzleArray.join();

								if ( originKey === userKey ) {
									alert( "Success !" );
								};
							};

							function dragStartHandler( e ) {
								//Set data
								dragElem = this;
								e.dataTransfer.effectAllowed = 'move';
								e.dataTransfer.setData( 'text/html', this.innerHTML );
								this.classList.add( 'over' );
								for ( var i = 0; i < colsLength; i++ ) {
									cols[ i ].classList.add( 'start' );
								};
							};

							function dragOverHandler( e ) {
								e.preventDefault();
								this.classList.add( 'over' );
								e.dataTransfer.dropEffect = 'move';
							};

							function dragLeaveHandler( e ) {
								this.classList.remove( 'over' );
							};

							function dragDropHandler( e ) {
								e.preventDefault();
								//Get data
								dragElem.innerHTML = this.innerHTML;
								this.innerHTML = e.dataTransfer.getData( 'text/html' );
								for ( var i = 0; i < colsLength; i++ ) {
									cols[ i ].className = "puzzle-piece";
								};
								//Check key
								puzzleCheck();
							};

							for ( var i = 0; i < colsLength; i++ ) {
								cols[ i ].addEventListener( 'dragstart', dragStartHandler, false );
								cols[ i ].addEventListener( 'dragover', dragOverHandler, false );
								cols[ i ].addEventListener( 'dragleave', dragLeaveHandler, false );
								cols[ i ].addEventListener( 'drop', dragDropHandler, false );
							};
						</script>

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