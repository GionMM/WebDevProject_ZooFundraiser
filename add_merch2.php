<?php

include 'connect.php';

$merch_name = $_POST['merch_name'];
$price = $_POST['price'];

	
	if ($connect->connect_error) {
		die(" Connection failed: " . $connect->connect_error);
	}

	$sql = "SELECT merch_name FROM merch WHERE merch_name='$merch_name' ";
	$result = $connect->query($sql);
	if (!$result){
		die("Query Failed");
	}
	$num_rows=mysqli_num_rows($result);
	$row = $result->fetch_assoc();
	
	if($num_rows>0){
		echo '<script language="javascript">';
		echo 'alert("The merchandise has exist!");';
		echo 'window.location.href="add_merch.php";';
		echo'</script>';
	   
	}
	
	else {
	
		$sql2 = "INSERT INTO merch (merch_name, merch_price)
		values ('$merch_name','$price')";
		$result2 = mysqli_query($connect, $sql2) or die("Insert Query Failed");
		
		if($result2)
		{

			?>
			<script>
				alert("Merchandise has been added.");
				window.location.href = "adminstore.php";
			</script>
			<?php
		}
	
}
?>