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
      Add Animal
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

		<form action="add_animal2.php" method="post"  enctype="multipart/form-data">


<form action="add_animal2.php" method="POST">
    <div class="container">
    <h1>Add Animal</h1>
    <hr>

    <label for="animal_name"><b><br>Animal Name</br></label>
	<br>
    <input type="text" placeholder="Enter animal name" name="animal_name" id="animal_name" required><br>

    <label for="animal_species"><b><br>Animal Species</br></label>
	<br>
    <input type="text" placeholder="Enter animal species" name="animal_species" id="animal_species" required><br>

    <label for="annual_adoption_price"><b><br>Annual Adoption Price (RM)</br></label>
	<br>
    <input type="text" placeholder="Enter annual adoption price" name="annual_adoption_price" id="annual_adoption_price" required><br></br>


    <button type="submit" class="btn btn-primary">Add</button>
  </div>

  
</form>

</body>
</html>
