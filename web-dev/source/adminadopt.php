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

	<!-- Bootstrap -->
	<!--	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="../css/form-validation.css" rel="stylesheet">
	<link href="../css/album.css" rel="stylesheet">
	<link href="../css/table.css" rel="stylesheet">
	
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>


	<div class="sidebar">
		<a style="text-align: center"><img src="../images/logo2.png" style="width: 150px"></a>
		<hr>

		<a href="admin-home.php"><i class="fa fa-tachometer"></i>&emsp;Dashboard</a>
		<a href="adminedit.php"><i class="fa fa-users"></i>&emsp;Manage staff</a>
		<a class="active" href="adminadopt.php"><i class="fa fa-paw"></i>&emsp;Manage animal</a>
		<a href="admindonate.php"><i class="fa fa-money"></i>&emsp;Manage donation</a>
		<a href="admin-view-adoption.php"><i class="fa fa-heart"></i>&emsp;Manage adoption</a>
		<a href="adminstore.php"><i class="fa fa-shopping-bag"></i>&emsp;Manage store</a>
		<a href="adminreport.php"><i class="fa fa-bar-chart"></i>&emsp;Report</a>
		<a href="main.php"><i class="fa fa-home"></i>&emsp;User Homepage</a>
		<a href="logout.php"><i class="fa fa-sign-out"></i>&emsp;Logout</a>
		
	</div>

	<div class="content">
		<div style="margin-top: 2em;">
			<h1 style="font-size:50px;font-weight:bold;">List of Animal Available For Adoption</h1>
		</div>


		<form>

        <p>Instruction: Press Update to update animal, Delete to delete animal, and Add to add animal. </p>

        <p>Click the + icon to add new animal:
        <a href="add_animal.php">
          <span class="fa fa-plus"></span>
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

	echo "<table class='table table-responsive table-bordered table-striped table-hover' style='width:95%'>";
	echo "<tr style='background-color: lightgrey;'>";
	
	//echo "<th>S.No</th>";
	echo "<th class='text-center'>Animal Name</th>";
  echo "<th class='text-center'>Species</th>";
  echo "<th class='text-center'>Annual Adoption Price (RM)</th>";
  echo "<th class='text-center' style='width:5%'>Update</th>";
	echo "<th class='text-center' style='width:5%'>Delete</th>";
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
		echo "<td class='text-center'><a href='edit_animal.php?animal_id=$row[animal_id]&info=edit_animal'><span class='fa fa-pencil'style=color:green;></span></a></td>";
		echo "<td class='text-center'><a href='#' onclick='deletes($row[animal_id])'><span class='fa fa-trash' style=color:black;></span></a></td>";
		echo "</tr>";

	
}
		echo "</table>"
?>

	</div>

</body>
</html>