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

	<style>
		img {
			display: block;
			max-width: 230px;
			max-height: 95px;
			width: auto;
			height: auto;
		}

	</style>
</head>

<body>


	<div class="sidebar">
		<a style="text-align: center">Website logo</a>
		<hr>

		<a href="admin-home.php"><i class="fa fa-tachometer"></i>&emsp;Dashboard</a>
		<a href="adminedit.php"><i class="fa fa-users"></i>&emsp;Manage staff</a>
		<a href="adminadopt.php"><i class="fa fa-paw"></i>&emsp;Manage animal</a>
		<a href="admindonate.php"><i class="fa fa-money"></i>&emsp;Manage donation</a>
		<a href="admin-view-adoption.php"><i class="fa fa-heart"></i>&emsp;Manage adoption</a>
		<a class="active" href="adminstore.php"><i class="fa fa-shopping-bag"></i>&emsp;Manage store</a>
		<a href="adminreport.php"><i class="fa fa-bar-chart"></i>&emsp;Report</a>
		<a href="main.php"><i class="fa fa-home"></i>&emsp;User Homepage</a>
		<a href="logout.php"><i class="fa fa-sign-out"></i>&emsp;Logout</a>

	</div>

	<div class="content">
		<div style="margin-top: 2em;">
			<h1 style="font-size:50px;font-weight:bold;">List of Merchandise</h1>
		</div>
		<form>

			<p>Instruction: Press Update to update merchandise, Delete to delete merchandise, and Add to add merchandise. </p>

			<p>Click the + icon to add new merchandise:
				<a href="add_merch.php">
          <span class="fa fa-plus"></span>
        </a>
			


		</form>

		<script type="text/javascript">
			function deletes( merch_id ) {
				a = confirm( 'Are You Sure Want To Remove This Merchandise?' )
				if ( a ) {
					window.location.href = 'delete_merch.php?merch_id=' + merch_id;
				}
			}
		</script>

		<?php
		echo "<div class='row'>
<div class='col-md-11 offset-md-1'>";

		if ( $stmt = $link->query( "SELECT * FROM merch" ) ) {

			echo "Total of merchandise : " . $stmt->num_rows . "<br>";

			echo "<table class='table table-bordered table-striped table-hover' style='width:60%;'>";
			echo "<tr style='background-color: lightgrey;'>";

			echo "<th style='width:5%'>Image</th><th>Merchandise Name</th><th>Price</th><th style='width:5%'>Update</th><th style='width:5%'>Delete</th></tr>";
			while ( $row = $stmt->fetch_assoc() ) {
				$merch_photo = $row[ "merch_photo" ];
				echo "<tr><td><img class='card-img-top' src='data:image/jpeg;base64," . base64_encode( $merch_photo ) . " alt='Card image cap'></td>
<td ><merch_id=$row[merch_id]>$row[merch_name]</td>
<td class='text-center'>$row[merch_price]</td>
<td class='text-center'><a href='edit_merch.php?merch_id=$row[merch_id]&info=edit_merch'><span class='fa fa-pencil'style=color:green;></span></a></td>
<td class='text-center'><a href='#' onclick='deletes($row[merch_id])'><span class='fa fa-trash' style=color:black;></span></a></td></tr>";
			}
			echo "</table>";
		} else {
			echo $link->error;
		}
		echo "</div></div>";

		?>
	</div>

</body>
</html>