<?php
session_start();

require_once "config.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/sidebar.css" rel="stylesheet">

	<!-- Bootstrap -->
	<!--	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="../css/form-validation.css" rel="stylesheet">
	<link href="../css/album.css" rel="stylesheet">
</head>

<body>


	<div class="sidebar">
		<a style="text-align: center">Website logo</a>
		<hr>

		<a class="active" href="admin-home.php"><i class="fa fa-tachometer"></i>&emsp;Dashboard</a>
		<a href="adminedit.php"><i class="fa fa-users"></i>&emsp;Manage staff</a>
		<a href="adminadopt.php"><i class="fa fa-paw"></i>&emsp;Manage animal</a>
		<a href="admindonate.php"><i class="fa fa-money"></i>&emsp;Manage donation</a>
		<a href="#about"><i class="fa fa-heart"></i>&emsp;Manage adoption</a>
		<a href="adminstore.php"><i class="fa fa-shopping-bag"></i>&emsp;Manage store</a>
		<a href="logout.php"><i class="fa fa-sign-out"></i>&emsp;Logout</a>

	</div>

	<div class="content">
		<div style="margin-top: 2em;">
			<h1 style="font-size:50px;font-weight:bold;">Dashboard</h1>
		</div>



		<h2>Responsive Sidebar Example</h2>
		<p>This example use media queries to transform the sidebar to a top navigation bar when the screen size is 700px or less.</p>
		<p>We have also added a media query for screens that are 400px or less, which will vertically stack and center the navigation links.</p>
		<h3>Resize the browser window to see the effect.</h3>
	</div>

</body>
</html>