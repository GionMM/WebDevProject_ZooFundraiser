<!DOCTYPE html>

<body>
    <ul class="navigation">
      <li><a href="adminhome.php">Home</a></li>
      <li><a href="adminedit.php">Edit Admin</a></li>
      <li><a href="admindonate.php">Edit Donation</a></li>
      <li><a href="adminstore.php">Edit Store</a></li>
      <li><a href="adminadopt.php">Edit Animal Adoption</a></li>
      <li><a href="adminreport.php">Report</a></li>
    </ul>
	<hr>

<?php 
 	include 'connect.php';
 	//include 'session.php';
 	//$user_id = $_SESSION['user_id'];
 	$animal_id = $_REQUEST['animal_id'];
 	$sql = "SELECT * FROM animal WHERE animal_id ='$animal_id'";

 	$result = mysqli_query($connect,$sql);
 	$rows = mysqli_fetch_array($result);

?>
<form action="edit_animal2.php?animal_id=<?php echo $animal_id; ?>" method="get">

<h2>Update Animal</h2>

		<form method="post">
			<table class="table table-bordered">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
			
			</tr>
            	<input type="hidden" name="animal_id" value="<?php echo $rows['animal_id']; ?>"/>
        	</tr>
		
				<tr>
					<td>Animal Name </td>
					<Td><input class="form-control" value="<?php echo $rows['animal_name'];?>"  type="text" name="animal_name"/></td>
				</tr>
				<tr>
					<td>Animal Species </td>
					<Td><input class="form-control" type="text" value="<?php echo $rows['animal_species'];?>"  name="animal_species"/></td>
				</tr>
				<tr>
					<td>Annual Adoption Price (RM) </td>
					<Td><input class="form-control" type="text" value="<?php echo $rows['annual_adoption_price'];?>"  name="annual_adoption_price"/></td>
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
		</body>
</html>
	