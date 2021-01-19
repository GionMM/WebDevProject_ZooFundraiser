<?php
session_start();

require_once "config.php";

if($_SESSION["user_class"]!='1')
{
	header( "location: main.php" );
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/sidebar.css" rel="stylesheet">
	<link href="../css/button.css" rel="stylesheet">

	<!-- Bootstrap -->
	<!--	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="../css/form-validation.css" rel="stylesheet">
	<link href="../css/album.css" rel="stylesheet">
</head>

<body>


	<div class="sidebar">
		<a style="text-align: center"><img src="../images/logo2.png" style="width: 150px"></a>
		<hr>

		<a href="admin-home.php"><i class="fa fa-tachometer"></i>&emsp;Dashboard</a>
		<a href="adminedit.php"><i class="fa fa-users"></i>&emsp;Manage staff</a>
		<a href="adminadopt.php"><i class="fa fa-paw"></i>&emsp;Manage animal</a>
		<a href="admindonate.php"><i class="fa fa-money"></i>&emsp;Manage donation</a>
		<a href="admin-view-adoption.php"><i class="fa fa-heart"></i>&emsp;Manage adoption</a>
		<a href="adminstore.php"><i class="fa fa-shopping-bag"></i>&emsp;Manage store</a>
		<a href="adminreport.php"><i class="fa fa-bar-chart"></i>&emsp;Report</a>
		<a href="main.php"><i class="fa fa-home"></i>&emsp;User Homepage</a>
		<a href="logout.php"><i class="fa fa-sign-out"></i>&emsp;Logout</a>

	</div>

	<div class="content">
		<div style="margin-top: 2em;">
			<h1>Add animal</h1>
		</div>

		<form action="add_animal2.php" method="POST">

			<label for="animal_name"><b><br>Animal Name</br></label>
			<br>
			<input type="text" placeholder="Enter animal name" name="animal_name" id="animal_name" required><br>

			<label for="animal_species"><b><br>Animal Species</br></label>
			<br>
			<input type="text" placeholder="Enter animal species" name="animal_species" id="animal_species" required><br>

			<label for="annual_adoption_price"><b><br>Annual Adoption Price (RM)</br></label>
			<br>
			<input type="text" placeholder="Enter annual adoption price" name="annual_adoption_price" id="annual_adoption_price" required><br></br>
		
			<label for="animal_avatar"><b><br>Animal Avatar</br></label>
			<small>example: http://localhost/web-dev/images/avatar.jpg</small>
			<br>
			<input type="text" placeholder="Enter file path" name="animal_avatar" id="animal_avatar" required><br></br>

			<button type="submit" class="btn btn-primary">Add</button>



		</form>


	</div>

</body>
</html>