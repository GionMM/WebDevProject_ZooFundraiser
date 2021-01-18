<?php
session_start();

require_once "config.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/sidebar.css" rel="stylesheet">
	<title>Admin Manage Staff</title>

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
		<a style="text-align: center">Website logo</a>
		<hr>

		<a href="admin-home.php"><i class="fa fa-tachometer"></i>&emsp;Dashboard</a>
		<a class="active" href="admin-manage-staff.php"><i class="fa fa-users"></i>&emsp;Manage staff</a>
		<a href="adminadopt.php"><i class="fa fa-paw"></i>&emsp;Manage animal</a>
		<a href="admindonate.php"><i class="fa fa-money"></i>&emsp;Manage donation</a>
		<a href="#about"><i class="fa fa-heart"></i>&emsp;Manage adoption</a>
		<a href="adminstore.php"><i class="fa fa-shopping-bag"></i>&emsp;Manage store</a>
		<a href="logout.php"><i class="fa fa-sign-out"></i>&emsp;Logout</a>

	</div>

	<div class="content">
		<form>
			<h1 style="font-size:50px;font-weight:bold;">List of staff</h1>

			<p>Instruction: Press Update to update staff, Delete to delete staff, and Add to add staff. </p>

			<p>Click the + icon to add new staff:
				<a href="add_staff.php">
          <span class="fa fa-plus" ></span>
        </a>
			
		</form>

		<script type="text/javascript">
			function deletes( user_id ) {
				a = confirm( 'Are You Sure Want To Remove This Staff?' )
				if ( a ) {
					window.location.href = 'delete_staff.php?user_id=' + user_id;
				}
			}
		</script>

		<?php

		echo "<table class='table table-responsive table-bordered table-striped table-hover' style='width:95%'>";
		echo "<tr style='background-color: lightgrey;'>";

		//echo "<th>S.No</th>";
		echo "<th class='text-center' >Email</th>";
		echo "<th class='text-center'>Fullname</th>";
		echo "<th class='text-center'>Password</th>";
		echo "<th class='text-center' style='width:5%'>Update</th>";
		echo "<th class='text-center' style='width:5%'>Delete</th>";

		echo "</tr>";

		$i = 1;

		$que = mysqli_query( $link, "SELECT * FROM user WHERE user_class ='1'" );

		while ( $row = mysqli_fetch_array( $que ) ) {
			echo "<tr>";
			//echo "<td>".$i."</td>";
			echo "<td class='text-center'>" . $row[ 'email' ] . "</td>";
			echo "<td class='text-center'>" . $row[ 'fullname' ] . "</td>";
			echo "<td class='text-center'>" . $row[ 'password' ] . "</td>";
			echo "<td class='text-center'><a href='edit_staff.php?user_id=$row[user_id]&info=edit_staff'><span class='fa fa-pencil'style=color:green;></span></a></td>";
			echo "<td class='text-center'><a href='#' onclick='deletes($row[user_id])'><span class='fa fa-trash' style=color:black;></span></a></td>";
			echo "</tr>";


		}
		echo "</table>";
		?>
	</div>

</body>
</html>