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
        <h1>Report</h1><br>
        <hr>

        <p>Instruction: Choose the respective month you like to view the report.</p>
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


  <div class="card" style="margin-top:20px;margin-left:50px;width:35%;height:150px;box-shadow: 1px 2px 10px grey;display:inline-block">
  <div class="card-body">
  <h4 class="card-title" style="text-align:center;font-size:30px;font-weight:bold">Total Sales:</h4>
  <h5 style="text-align:center;margin-top:30px;font-size:30px">
    <?php
    $month = "";
  	$message = "";
  	if($_SERVER["REQUEST_METHOD"] == "POST")
     {
  	   $month = $_POST["month"];

  	   $result=mysqli_query($link,"SELECT * FROM orders where datetime like '_____$month%'");
  	   $num = mysqli_num_rows($result);
  	   if($month === "")
  	   {
  		   $message = "*Please select a month";
  	   }
  	   else if($num > 0)
  	   {

  		while($row=mysqli_fetch_array($result))
  		{
        $result = mysqli_query($link, 'SELECT SUM(amount) AS value_sum FROM orders');
        $row = mysqli_fetch_assoc($result);
        $sum = $row['value_sum'];
        echo $sum;
  		}
  	   }
     }
  ?>
</h5>
</div>
</div>


<div class="card" style="margin-top:40px;width:35%;height:150px;box-shadow: 1px 2px 10px grey;display:inline-block">
<div class="card-body">
<h4 class="card-title" style="text-align:center;font-size:30px;font-weight:bold">Total Donation Received:</h4>
<h5 style="text-align:center;margin-top:30px;font-size:30px">
  <?php
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
      $result = mysqli_query($link, 'SELECT ROUND(SUM(amount), 2) AS donate_sum FROM donation WHERE amount IS NOT NULL');
      $row = mysqli_fetch_assoc($result);
      $sum = $row['donate_sum'];
      echo $sum;
    }
     }
   }
?>
</h5>
</div>
</div>


<div class="card" style="margin-top:10px;margin-left:300px;width:35%;height:150px;box-shadow: 1px 2px 10px grey;display:inline-block">
<div class="card-body">
<h4 class="card-title" style="text-align:center;font-size:30px;font-weight:bold">Number of Animals Adopted:</h4>
<h5 style="text-align:center;margin-top:30px;font-size:30px">
  <?php
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
      $result = mysqli_query($link, 'SELECT COUNT(adoption_id) AS adoptsum FROM adoption;');
      $row = mysqli_fetch_assoc($result);
      $sum = $row['adoptsum'];
      echo $sum;
    }
     }
   }
?>
</h5>
</div>
</div>
  	<h5 style="color:orangered"><?=$message;?></h5>

    </body>
    </html>
