<?php

include 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
	
	if ($connect->connect_error) {
		die(" Connection failed: " . $connect->connect_error);
	}

	$sql = "SELECT email FROM user WHERE email='$email' ";
	$result = $connect->query($sql);
	$num_rows=mysqli_num_rows($result);
	$row = $result->fetch_assoc();
	
	if($num_rows>0){
		echo '<script language="javascript">';
		echo 'alert("The user has exist!");';
		echo 'window.location.href="add_staff.php";';
		echo'</script>';
	   
	}
	
	else {
	
		$sql2 = "INSERT INTO user (email, password, fullname, user_class)
		values ('$email','$password','$fullname',1)";
		$result2 = mysqli_query($connect, $sql2);
		
		if($result2)
		{
			?>
			<script>
				alert("New Staff has been added.");
				window.location.href = "adminedit.php";
			</script>
			<?php
		}
		else{
			die("Insert Query Failed");
		}
	
}
?>