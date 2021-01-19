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
		<a style="text-align: center"><img src="../images/logo2.png" style="width: 150px"></a>
		<hr>

		<a href="admin-home.php"><i class="fa fa-tachometer"></i>&emsp;Dashboard</a>
		<a href="adminedit.php"><i class="fa fa-users"></i>&emsp;Manage staff</a>
		<a href="adminadopt.php"><i class="fa fa-paw"></i>&emsp;Manage animal</a>
		<a href="admindonate.php"><i class="fa fa-money"></i>&emsp;Manage donation</a>
		<a href="admin-view-adoption.php"><i class="fa fa-heart"></i>&emsp;Manage adoption</a>
		<a href="adminstore.php"><i class="fa fa-shopping-bag"></i>&emsp;Manage store</a>
		<a href="adminreport.php"><i class="fa fa-bar-chart"></i>&emsp;Report</a>
		<a href="main.php"><i class="fa fa-home"></i>&emsp;User Homepage</a>
		<a href="logout.php"><i class="fa fa-sign-out"></i>&emsp;Logout</a>

	</div>

	<div class="content">
		<div style="margin-top: 2em;">
			<h1>Register New Merchandise</h1>
		</div>

		<?php
		error_reporting( 0 );
		//include 'connect.php';
		extract( $_POST );
		if ( isset( $save ) ) {

			//$user_id = $_GET['user_id'];
			$merch_name = $_POST[ 'merch_name' ];
			$price = $_POST[ 'price' ];
			$merch_photo = addslashes( file_get_contents( $_FILES[ 'merch_photo' ][ 'tmp_name' ] ) );

			/*if ($connect->connect_error) {
				die(" Connection failed: " . $connect->connect_error);
			}*/

			$sql = "SELECT merch_name FROM merch WHERE merch_name='$merch_name' ";
			$result = $link->query( $sql );
			$num_rows = mysqli_num_rows( $result );
			$row = $result->fetch_assoc();

			if ( $num_rows > 0 ) {
				echo '<script language="javascript">';
				echo 'alert("The merchandise is already exist!");';
				echo 'window.location.href="index.php";';
				echo '</script>';

			} else {

				$sql2 = "INSERT INTO merch (merch_name, merch_price, merch_photo)
		values ('$merch_name','$merch_price','$merch_photo')";
				$result2 = mysqli_query( $link, $sql2 );

				if ( $result2 ) {
					//header("Location: index.php");
					?>
		<script>
			alert( "Merchandise has been added." );
			window.location.href = "adminstore.php";
		</script>
		<?php
		}



		}
		}
		?>
		<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered">
				<Tr>
					<Td colspan="2">
						<?php echo @$err;?>
					</Td>
				</Tr>
				<tr>
					<td>Merchandise Name </td>
					<Td><input class="form-control" value="<?php echo $rows['merch_name'];?>" type="text" name="merch_name"/>
					</td>
				</tr>

				<tr>
					<td>Price (RM)</td>
					<Td><input class="form-control" type="number" value="<?php echo $rows['merch_price'];?>" name="merch_price"/>
					</td>
				</tr>

				<tr>
					<td>Merchandise Photo</td>
					<Td><input class="form-control" type="file" value="<?php echo $rows['merch_photo'];?>" name="merch_photo"/>
					</td>
				</tr>

				</td>
				</tr>

				<Td colspan="2" align="center">
					<input type="submit" class="btn btn-primary" name="save" value="Add New Merchandise">
				</td>
				</tr>

			</table>
		</form>

		<?php 
	/*$query = "SELECT * FROM merch_photo ORDER BY merch_id DESC";  
                $result = mysqli_query($link, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['merch_photo'] ).'" height="400" width="400" class="img-thumbnail" />  
                               </td>  
                          </tr>  
                     ';  
                }*/  
		?>
	</div>

</body>
</html>