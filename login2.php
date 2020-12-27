<?php

include 'connect.php';
//include 'session.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from user where email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_array($result);

if(isset($rows['user_id']))
{
	session_start();
		$_SESSION['user_id'] = $rows['user_id'];
		?>
		<script>
			alert("Login successful!");
		window.location.href = "adoption.php";
	</script>
	  <?php
	{
	
	}
}
else
{
	?>
	<script>
		alert("Incorrect email or password.Please try again.");
		window.location.href = "login.php";
	</script>
	<?php
}

?>