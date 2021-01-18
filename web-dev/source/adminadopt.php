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
      Admin Zoo Fundraiser Adoption
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <form>
        <div class="container">
        <h1>List of Animal Available For Adoption</h1><br>
        <hr>

        <p>Instruction: Press Update to update animal, Delete to delete animal, and Add to add animal. </p>

        <p>Click the + icon to add new animal:
        <a href="add_animal.php">
          <span class="glyphicon glyphicon-plus"></span>
        </a>
        </form>

        <script type="text/javascript">
      function deletes(animal_id)
      {
	    a=confirm('Are You Sure Want To Remove This Animal?')
	    if(a)
     {
        window.location.href='delete_animal.php?animal_id='+animal_id;
     }
}
</script>

    <?php

	echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>";
	echo "<tr>";
	
	//echo "<th>S.No</th>";
	echo "<th class='text-center'>Animal Name</th>";
  echo "<th class='text-center'>Species</th>";
  echo "<th class='text-center'>Annual Adoption Price (RM)</th>";
  echo "<th class='text-center'>Update</th>";
	echo "<th class='text-center'>Delete</th>";
	echo "</tr>";
	
	$i=1;

	$que=mysqli_query($link,"SELECT * FROM animal");

	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		//echo "<td>".$i."</td>";
		echo "<td class='text-center'>".$row['animal_name']."</td>";
    echo "<td class='text-center'>".$row['animal_species']."</td>";
    echo "<td class='text-center'>".$row['annual_adoption_price']."</td>";
		echo "<td class='text-center'><a href='edit_animal.php?animal_id=$row[animal_id]&info=edit_animal'><span class='glyphicon glyphicon-pencil'style=color:green;></span></a></td>";
		echo "<td class='text-center'><a href='#' onclick='deletes($row[animal_id])'><span class='glyphicon glyphicon-trash' style=color:black;></span></a></td>";

	
}
?>

  </body>
  </html>
