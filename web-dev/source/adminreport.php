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


	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<!--Define graph-->
	<script type="text/javascript">
		google.load( "visualization", "1", {
			packages: [ "corechart" ]
		} );
		google.setOnLoadCallback( drawChart );

		function drawChart() {
			var data = google.visualization.arrayToDataTable( [

				[ 'amount', 'datetime' ],
				<?php
			$query = "SELECT SUM(amount) FROM order WHERE YEAR(datetime)='2021' GROUP BY MONTH(month)";

			 $exec = mysqli_query($con,$query);
			 while($row = mysqli_fetch_array($exec)){

			 echo "['".$row['amount']."',".$row['datetime']."],";
			 }
			 ?>

			] );

			var options = {
				title: 'Number of Students according to their class',
				pieHole: 0.5,
				pieSliceTextStyle: {
					color: 'black',
				},
				legend: 'none'
			};
			var chart = new google.charts.Line( document.getElementById( 'linechart_material' ) );
			chart.draw( data, google.charts.Line.convertOptions( options ) );
		}
	</script>




</head>

<body>


	<div class="sidebar">
		<a style="text-align: center"><img src="../images/logo2.png" style="width: 150px"></a>
		<hr>

		<a href="admin-home.php"><i class="fa fa-tachometer"></i>&emsp;Dashboard</a>
		<a href="adminedit.php"><i class="fa fa-users"></i>&emsp;Manage staff</a>
		<a href="adminadopt.php"><i class="fa fa-paw"></i>&emsp;Manage animal</a>
		<a href="admindonate.php"><i class="fa fa-money"></i>&emsp;Manage donation</a>
		<a href="admin-view-adoption.php"><i class="fa fa-heart"></i>&emsp;Manage adoption</a>
		<a href="adminstore.php"><i class="fa fa-shopping-bag"></i>&emsp;Manage store</a>
		<a class="active" href="adminreport.php"><i class="fa fa-bar-chart"></i>&emsp;Report</a>
		<a href="main.php"><i class="fa fa-home"></i>&emsp;User Homepage</a>
		<a href="logout.php"><i class="fa fa-sign-out"></i>&emsp;Logout</a>

	</div>

	<div class="content">
		<div style="margin-top: 2em;">
			<h1 style="font-size:50px;font-weight:bold;">Report</h1>
		</div>

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
					if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
						$month = $_POST[ "month" ];

						$result = mysqli_query( $link, "SELECT * FROM orders where datetime like '_____$month%'" );
						$num = mysqli_num_rows( $result );
						if ( $month === "" ) {
							$message = "*Please select a month";
						} else if ( $num > 0 ) {

							while ( $row = mysqli_fetch_array( $result ) ) {
								$result = mysqli_query( $link, 'SELECT SUM(amount) AS value_sum FROM orders' );
								$row = mysqli_fetch_assoc( $result );
								$sum = $row[ 'value_sum' ];
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
					if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
						$month = $_POST[ "month" ];

						$result = mysqli_query( $link, "SELECT * FROM donation where datetime like '_____$month%'" );
						$num = mysqli_num_rows( $result );
						if ( $month === "" ) {
							$message = "*Please select a month";
						} else if ( $num > 0 ) {

							while ( $row = mysqli_fetch_array( $result ) ) {
								$result = mysqli_query( $link, 'SELECT ROUND(SUM(amount), 2) AS donate_sum FROM donation WHERE amount IS NOT NULL' );
								$row = mysqli_fetch_assoc( $result );
								$sum = $row[ 'donate_sum' ];
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
					if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
						$month = $_POST[ "month" ];

						$result = mysqli_query( $link, "SELECT * FROM donation where datetime like '_____$month%'" );
						$num = mysqli_num_rows( $result );
						if ( $month === "" ) {
							$message = "*Please select a month";
						} else if ( $num > 0 ) {

							while ( $row = mysqli_fetch_array( $result ) ) {
								$result = mysqli_query( $link, 'SELECT COUNT(adoption_id) AS adoptsum FROM adoption;' );
								$row = mysqli_fetch_assoc( $result );
								$sum = $row[ 'adoptsum' ];
								echo $sum;
							}
						}
					}
					?>
				</h5>
			</div>
		</div>
		<h5 style="color:orangered">
			<?=$message;?>
		</h5>


		<!--Call graph-->
		<div class="container-fluid">
			<div id="linechart_material" style="width: 100%; height: 500px;"></div>
		</div>
	</div>

</body>
</html>