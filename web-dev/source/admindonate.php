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
      Admin Zoo Fundraiser Donation
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
        <h1>List of User's Donation</h1><br>
        <hr>

        <p>Instruction: Choose the respective month you like to view the donation given.</p>
	<form method="post">
	<select name="month" class="custom-select mb-3" style="width:30%; height:35px; margin-top:15px; box-shadow:2px 2px 3px grey">
      <option value="" selected>Select the month here</option>
      <option value="01">January</option>
      <option value="02">February</option>
      <option value="03">March</option>
      <option value="04">April</option>
      <option value="05">May</option>
      <option value="06">June</option>
      <option value="07">July</option>
      <option value="08">August</option>
      <option value="09">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
    </select>
	<button type="submit" class="btn btn-primary" style="background-color:cornflowerblue; border:1px solid cornflowerblue">Submit</button>
	</form>

    <?php
	echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>";
	echo "<tr>";
	
	//echo "<th>S.No</th>";
	echo "<th class='text-center'>User Name</th>";
	echo "<th class='text-center'>Payment Method</th>";
	echo "<th class='text-center'>Amount (RM)</th>";
	echo "<th class='text-center'>Datetime</th>";
	echo "</tr>";
	
	$month = "";
	$message = "";
	if($_SERVER["REQUEST_METHOD"] == "POST")
   {
	   $month = $_POST["month"];
	   
	   $result=mysqli_query($link,"SELECT * FROM donation where datetime like '_____$month%'");
	   $num = mysqli_num_rows($result);
	   if($month === "")
	   {
		   $message = "*Please select a month";
	   }
	   else if($num > 0)
	   {

		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			$userID = $row['user_id'];
			$namesql = "select * from user where user_id = '$userID'";
			$que2 = mysqli_query($link, $namesql);
			$row2 = mysqli_fetch_array($que2);
			echo "<td class='text-center'>".$row2['fullname']."</td>";
			echo "<td class='text-center'>".$row['payment_method']."</td>";
			echo "<td class='text-center'>".$row['amount']."</td>";
			echo "<td class='text-center'>".$row['datetime']."</td>";
	
		}
	   }
   }
?>
	<h5 style="color:orangered"><?=$message;?></h5>
  </body>
  </html>
