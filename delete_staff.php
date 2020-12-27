<?php
include('connect.php');
	
	$info=$_GET['user_id'];
	
	mysqli_query($connect,"delete from user where user_id='$info'");
	header('location:adminedit.php?info=adminedit');
?>