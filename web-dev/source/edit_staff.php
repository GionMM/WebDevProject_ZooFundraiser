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

	<div class="content">
		<div style="margin-top: 2em;">
			<h1>Update staff</h1>
		</div>

		<?php 
 	//include 'admin/connect.php';
 	//include 'admin/session.php';
 	//$user_id = $_SESSION['user_id'];
 	$user_id = $_REQUEST['user_id'];
 	$sql = "SELECT * FROM user WHERE user_id ='$user_id'";

 	$result = mysqli_query($link,$sql);
 	$rows = mysqli_fetch_array($result);

?>
		<form action="edit_staff2.php?user_id=<?php echo $user_id; ?>" method="get">

			<form method="post">
				<table class="table table-bordered" style="width: 95%">
					<Tr>
						<Td colspan="2">
							<?php echo @$err;?>
						</Td>
					</Tr>

					</tr>
					<input type="hidden" name="user_id" value="<?php echo $rows['user_id']; ?>"/>
					</tr>

					<tr>
						<td>Email</td>
						<Td><input class="form-control" value="<?php echo $rows['email'];?>" type="text" name="email"/>
						</td>
					</tr>
					<tr>
						<td>Password</td>
						<Td><input class="form-control" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="<?php echo $rows['password'];?>" name="password"/>
						</td>
					</tr>
					<tr>
						<td>Fullname</td>
						<Td><input class="form-control" type="text" value="<?php echo $rows['fullname'];?>" name="fullname"/>
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
		</form>

	</div>

</body>
</html>