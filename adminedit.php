<?php 
session_start();
include ('connect.php');
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
      <li><a href="admindonate.php">Edit Donation</a></li>
      <li><a href="adminstore.php">Edit Store</a></li>
      <li><a href="adminadopt.php">Edit Animal Adoption</a></li>
      <li><a href="adminreport.php">Report</a></li>
    </ul>
    <form>
        <div class="container">
        <h1>List of staff</h1><br>
        <hr>

        <p>Instruction: Press Update to update staff, Delete to delete staff, and Add to add staff. </p>

        <p>Click the + icon to add new staff:
        <a href="add_staff.php">
          <span class="glyphicon glyphicon-plus"></span>
        </a>
        </form>

        <script type="text/javascript">
      function deletes(user_id)
      {
	    a=confirm('Are You Sure Want To Remove This Staff?')
	    if(a)
     {
        window.location.href='delete_staff.php?user_id='+user_id;
     }
}
</script>

    <?php

	echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>";
	echo "<tr>";
	
	//echo "<th>S.No</th>";
	echo "<th class='text-center'>Email</th>";
    echo "<th class='text-center'>Password</th>";
    echo "<th class='text-center'>Fullname (RM)</th>";
    echo "<th class='text-center'>Update</th>";
	echo "<th class='text-center'>Delete</th>";

	echo "</tr>";
	
	$i=1;

	$que=mysqli_query($connect,"SELECT * FROM user WHERE user_class ='1'");

	while($row=mysqli_fetch_array($que))
	{
	echo "<tr>";
		//echo "<td>".$i."</td>";
	echo "<td class='text-center'>".$row['email']."</td>";
    echo "<td class='text-center'>".$row['password']."</td>";
    echo "<td class='text-center'>".$row['fullname']."</td>";
	echo "<td class='text-center'><a href='edit_staff.php?user_id=$row[user_id]&info=edit_staff'><span class='glyphicon glyphicon-pencil'style=color:green;></span></a></td>";
	echo "<td class='text-center'><a href='#' onclick='deletes($row[user_id])'><span class='glyphicon glyphicon-trash' style=color:black;></span></a></td>";

	
}
?>

  </body>
  </html>