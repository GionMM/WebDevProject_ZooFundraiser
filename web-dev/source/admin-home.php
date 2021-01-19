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
	<link href="../css/sidebar.css" rel="stylesheet" type="text/css">

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
		<a href="admin-view-adoption.php"><i class="fa fa-heart"></i>&emsp;Manage adoption</a>
		<a href="adminstore.php"><i class="fa fa-shopping-bag"></i>&emsp;Manage store</a>
		<a href="adminreport.php"><i class="fa fa-bar-chart"></i>&emsp;Report</a>
		<a href="main.php"><i class="fa fa-home"></i>&emsp;User Homepage</a>
		<a href="logout.php"><i class="fa fa-sign-out"></i>&emsp;Logout</a>
		
	</div>

	<div class="content" >
		<div style="margin-top: 2em;">
			<h1 style="font-size:50px;font-weight:bold;">Dashboard</h1>
		</div>

		<div class="card" style="margin-top:20px;width:35%;height:150px;box-shadow: 1px 2px 10px grey;display:inline-block">
			<div class="card-body">
				<h4 class="card-title" style="text-align:center;">Total number of user</h4>
				<h5 style="text-align:center;margin-top:30px;">
					<?php
					$result = mysqli_query( $link, "select * from user" );
					$num = mysqli_num_rows( $result );
					echo $num;
					?>
				</h5>
			</div>
		</div>
		<div class="card" style="margin-top:20px;margin-left:50px;width:35%;height:150px;box-shadow: 1px 2px 10px grey;display:inline-block">
			<div class="card-body">
				<h4 class="card-title" style="text-align:center;">Total type of animal</h4>
				<h5 style="text-align:center;margin-top:30px;">
					<?php
					$result2 = mysqli_query( $link, "select * from animal" );
					$num2 = mysqli_num_rows( $result2 );
					echo $num2;
					?>
				</h5>
			</div>
		</div>
		<div class="card" style="margin-top:40px;width:35%;height:150px;box-shadow: 1px 2px 10px grey;display:inline-block">
			<div class="card-body">
				<h4 class="card-title" style="text-align:center;">Total type of merchandise</h4>
				<h5 style="text-align:center;margin-top:30px;">
					<?php
					$result3 = mysqli_query( $link, "select * from merch" );
					$num3 = mysqli_num_rows( $result3 );
					echo $num3;
					?>
				</h5>
			</div>
		</div>
	</div>

</body>
</html>