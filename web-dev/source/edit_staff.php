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
      Update Admin
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
      <li><a href="admindonate.php">View Donation</a></li>
      <li><a href="adminstore.php">Edit Store</a></li>
      <li><a href="adminadopt.php">Edit Animal Adoption</a></li>
      <li><a href="adminreport.php">Report</a></li>
    </ul>
	<hr>

<?php 
 	//include 'connect.php';
 	//include 'session.php';
 	//$user_id = $_SESSION['user_id'];
 	$user_id = $_REQUEST['user_id'];
 	$sql = "SELECT * FROM user WHERE user_id ='$user_id'";

 	$result = mysqli_query($link,$sql);
 	$rows = mysqli_fetch_array($result);

?>
<form action="edit_staff2.php?user_id=<?php echo $user_id; ?>" method="get">

<h2>Update Staff</h2>

		<form method="post">
			<table class="table table-bordered">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
			
			</tr>
            	<input type="hidden" name="user_id" value="<?php echo $rows['user_id']; ?>"/>
        	</tr>
		
				<tr>
					<td>Email</td>
					<Td><input class="form-control" value="<?php echo $rows['email'];?>"  type="text" name="email"/></td>
				</tr>
				<tr>
					<td>Password</td>
					<Td><input class="form-control" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="<?php echo $rows['password'];?>"  name="password"/></td>
				</tr>
				<tr>
					<td>Fullname</td>
					<Td><input class="form-control" type="text" value="<?php echo $rows['fullname'];?>"  name="fullname"/></td>
				</tr>
				
					</td>
				</tr>
				
				<tr>
					
					
<Td colspan="2" align="center">
<input type="submit" class="btn btn-default" value="Update" name="update"/>
<input type="reset" class="btn btn-default" value="Reset"/>
				
					</td>
				</tr>
			</table>
		</form>
		</form>
		</body>
</html>
	