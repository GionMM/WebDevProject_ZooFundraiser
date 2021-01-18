<?php 
session_start();
//include ('connect.php');
require_once "config.php";
//$user= $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Admin Zoo Fundraiser Homepage
    </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <ul class="navigation">
      <li><a href="adminhome.php">Home</a></li>
      <li><a href="adminedit.php">Edit Admin</a></li>
      <li><a href="admindonate.php">View Donation</a></li>
      <li><a href="adminstore.php">Edit Store</a></li>
      <li><a href="adminadopt.php">Edit Animal Adoption</a></li>
      <li><a href="adminreport.php">Report</a></li>
    </ul>

        <div class="container">
        <h1 style="font-size:50px;font-weight:bold;text-shadow:1px 2px 3px grey">Dashboard</h1><br>
        <hr>
		
		<div class="card" style="margin-top:20px;width:35%;height:150px;box-shadow: 1px 2px 10px grey;display:inline-block">
		<div class="card-body">
		<h4 class="card-title" style="text-align:center;font-size:30px;font-weight:bold">Total User</h4>
		<h5 style="text-align:center;margin-top:30px;font-size:30px">
		<?php
	    $result = mysqli_query($link,"select * from user");
	    $num = mysqli_num_rows($result);
		echo $num;
		?>
		</h5>
		</div>
		</div>
		<div class="card" style="margin-top:20px;margin-left:50px;width:35%;height:150px;box-shadow: 1px 2px 10px grey;display:inline-block">
		<div class="card-body">
		<h4 class="card-title" style="text-align:center;font-size:30px;font-weight:bold">Total Type of Animal</h4>
		<h5 style="text-align:center;margin-top:30px;font-size:30px">
		<?php
	    $result2 = mysqli_query($link,"select * from animal");
	    $num2 = mysqli_num_rows($result2);
		echo $num2;
		?>
		</h5>
		</div>
		</div>
		<div class="card" style="margin-top:40px;width:35%;height:150px;box-shadow: 1px 2px 10px grey;display:inline-block">
		<div class="card-body">
		<h4 class="card-title" style="text-align:center;font-size:30px;font-weight:bold">Total Type of Merchandise</h4>
		<h5 style="text-align:center;margin-top:30px;font-size:30px">
		<?php
	    $result3 = mysqli_query($link,"select * from merch");
	    $num3 = mysqli_num_rows($result3);
		echo $num3;
		?>
		</h5>
		</div>
		</div>
        </div>
  </body>
  </html>
