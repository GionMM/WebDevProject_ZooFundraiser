<?php
session_start();

require_once "config.php";

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
	<link href="../css/button.css" rel="stylesheet">
	<link href="../css/table.css" rel="stylesheet">
	<link href="../css/form.css" rel="stylesheet">
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
		<a href="adminedit.php"><i class="fa fa-users"></i>&emsp;Manage staff</a>
		<a href="adminadopt.php"><i class="fa fa-paw"></i>&emsp;Manage animal</a>
		<a href="admindonate.php"><i class="fa fa-money"></i>&emsp;Manage donation</a>
		<a href="#about"><i class="fa fa-heart"></i>&emsp;Manage adoption</a>
		<a href="adminstore.php"><i class="fa fa-shopping-bag"></i>&emsp;Manage store</a>
		<a href="logout.php"><i class="fa fa-sign-out"></i>&emsp;Logout</a>

	</div>
	
	<?php 

 	$animal_id = $_REQUEST['animal_id'];
 	$sql = "SELECT * FROM animal WHERE animal_id ='$animal_id'";

 	$result = mysqli_query($link,$sql);
 	$rows = mysqli_fetch_array($result);
?>
<form action="edit_animal2.php?animal_id=<?php echo $animal_id; ?>" method="get">

	<div class="content">
		<div style="margin-top: 2em;">
			<h1>Update animal</h1>
		</div>

		<form method="post">
			<table class="table table-bordered" style="width: 95%">
				<Tr>
					<Td colspan="2">
						<?php echo @$err;?>
					</Td>
				</Tr>

				</tr>
				<input type="hidden" name="animal_id" value="<?php echo $rows['animal_id']; ?>"/>
				</tr>

				<tr>
					<td style="width: 20%">Animal Name </td>
					<Td><input class="form-control" value="<?php echo $rows['animal_name'];?>" type="text" name="animal_name"/>
					</td>
				</tr>
				<tr>
					<td>Animal Species </td>
					<Td><input class="form-control" type="text" value="<?php echo $rows['animal_species'];?>" name="animal_species"/>
					</td>
				</tr>
				<tr>
					<td>Annual Adoption Price (RM) </td>
					<Td><input class="form-control" type="text" value="<?php echo $rows['annual_adoption_price'];?>" name="annual_adoption_price"/>
					</td>
				</tr>

				</td>
				</tr>

				<tr>


					<Td colspan="2" align="center">
						<input type="submit" class="btn btn-success" value="Update" name="update"/>
						<input type="reset" class="btn btn-link" value="Reset"/>

					</td>
				</tr>
			</table>
		</form>
	</div>

</body>
</html>
