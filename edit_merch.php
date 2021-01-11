<!DOCTYPE html>

<style>
body {
    background-color: bisque;
    }
    </style>

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
 	$merch_id = $_REQUEST['merch_id'];
 	$sql = "SELECT * FROM merch WHERE merch_id ='$merch_id'";

 	$result = mysqli_query($connect,$sql);
 	$rows = mysqli_fetch_array($result);

?>
<form action="edit_merch2.php?merch_id=<?php echo $merch_id; ?>" method="get">

<h2>Update Merchandise</h2>

		<form method="post">
			<table class="table table-bordered">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
			
			</tr>
            	<input type="hidden" name="merch_id" value="<?php echo $rows['merch_id']; ?>"/>
        	</tr>
		
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
	
