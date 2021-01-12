<?php
session_start();
//include 'connect.php';
require_once "config.php";
//if(isset($_POST)& !empty($_POST))

	$user_id= $_REQUEST['user_id'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $fullname = $_REQUEST['fullname'];

	$sql = "UPDATE user SET email= '$email',password='$password', fullname= '$fullname' WHERE user_id = '$user_id'";
	$result = mysqli_query($link,$sql);
	
	if($result)
	{
		?>
		<script>
			alert("Staff informations have been updated.");
			window.location.href = "adminedit.php?user_id=<?php echo $user_id; ?>";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert("Fail to update the information.");
			window.location.href = "edit_staff.php?user_id=<?php echo $user_id; ?>";
		</script>
		<?php
	}

?>