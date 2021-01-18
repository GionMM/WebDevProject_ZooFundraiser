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
      Add Merchandise
    </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
<!--<style>
body {
    background-color: bisque;
    }
    </style>-->

<body>
    <ul class="navigation">
      <li><a href="adminhome.php">Home</a></li>
      <li><a href="adminedit.php">Edit Admin</a></li>
      <li><a href="admindonate.php">View Donation</a></li>
      <li><a href="adminstore.php">Edit Store</a></li>
      <li><a href="adminadopt.php">Edit Animal Adoption</a></li>
      <li><a href="adminreport.php">Report</a></li>
    </ul>
	<hr>

<?php
error_reporting(0);
//include 'connect.php';
extract($_POST);
	if(isset($save))
	{	

//$user_id = $_GET['user_id'];
$merch_name = $_POST['merch_name'];
$price = $_POST['price'];
$merch_photo = addslashes(file_get_contents($_FILES['merch_photo']['tmp_name']));
	
	/*if ($connect->connect_error) {
		die(" Connection failed: " . $connect->connect_error);
	}*/	
	
	$sql = "SELECT merch_name FROM merch WHERE merch_name='$merch_name' ";
	$result = $link->query($sql);
	$num_rows=mysqli_num_rows($result);
	$row = $result->fetch_assoc();
	
	if($num_rows>0){
		echo '<script language="javascript">';
		echo 'alert("The merchandise is already exist!");';
		echo 'window.location.href="index.php";';
		echo'</script>';
	   
	}
	
	else {
	
		$sql2 = "INSERT INTO merch (merch_name, merch_price, merch_photo)
		values ('$merch_name','$merch_price','$merch_photo')";
		$result2 = mysqli_query($link, $sql2);
		
		if($result2)
		{
			//header("Location: index.php");
			?>
			<script>
				alert("Merchandise has been added.");
				window.location.href = "adminstore.php";
			</script>
			<?php
		}

	  
                
	}
}
?>


<h1 class="page-header">Register New Merchandise</h1>
<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
	<tr>
					<td>Merchandise Name </td>
					<Td><input class="form-control" value="<?php echo $rows['merch_name'];?>"  type="text" name="merch_name"/></td>
				</tr>
		
				<tr>
					<td>Price (RM)</td>
					<Td><input class="form-control" type="number" value="<?php echo $rows['merch_price'];?>"  name="merch_price"/></td>
				</tr>

				<tr>
					<td>Merchandise Photo</td>
					<Td><input class="form-control" type="file" value="<?php echo $rows['merch_photo'];?>"  name="merch_photo"/></td>
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