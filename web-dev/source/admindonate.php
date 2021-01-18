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
	<link href="../css/button.css" rel="stylesheet">

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
		<a class="active" href="admindonate.php"><i class="fa fa-money"></i>&emsp;Manage donation</a>
		<a href="#about"><i class="fa fa-heart"></i>&emsp;Manage adoption</a>
		<a href="adminstore.php"><i class="fa fa-shopping-bag"></i>&emsp;Manage store</a>
		<a href="logout.php"><i class="fa fa-sign-out"></i>&emsp;Logout</a>

	</div>

	<div class="content">
		<div style="margin-top: 2em;">
			<h1 style="font-size:50px;font-weight:bold;">List of User's Donation</h1>
		</div>

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
			
			<button type="submit" class="btn btn-primary" style="background-color:cornflowerblue; border:1px solid cornflowerblue;margin-left: 1em;">Submit</button>
		</form>

		<?php
		echo "<table class='table table-bordered table-striped table-hover' >";
		echo "<tr style='background-color: lightgrey;'>";

		echo "<th class='text-center' style='width:25%'>User Name</th>";
		echo "<th class='text-center' style='width:25%'>Payment Method</th>";
		echo "<th class='text-center' style='width:25%'>Amount (RM)</th>";
		echo "<th class='text-center' style='width:25%'>Datetime</th>";
		echo "</tr>";

		$month = "";
		$message = "";
		if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
			$month = $_POST[ "month" ];

			$result = mysqli_query( $link, "SELECT * FROM donation where datetime like '_____$month%'" );
			$num = mysqli_num_rows( $result );
			if ( $month === "" ) {
				$message = "*Please select a month";
			} else if ( $num > 0 ) {

				while ( $row = mysqli_fetch_array( $result ) ) {
					echo "<tr>";
					$userID = $row[ 'user_id' ];
					$namesql = "select * from user where user_id = '$userID'";
					$que2 = mysqli_query( $link, $namesql );
					$row2 = mysqli_fetch_array( $que2 );
					echo "<td class='text-center'>" . $row2[ 'fullname' ] . "</td>";
					echo "<td class='text-center'>" . $row[ 'payment_method' ] . "</td>";
					echo "<td class='text-center'>" . $row[ 'amount' ] . "</td>";
					echo "<td class='text-center'>" . $row[ 'datetime' ] . "</td>";
					echo '</tr>';

				}
				echo '</table>';
			}
		}
		?>
		<h5 style="color:orangered">
			<?=$message;?>
		</h5>
	</div>

</body>
</html>