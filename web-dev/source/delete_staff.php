<?php
require_once "config.php";
//include('admin/connect.php');
	
	$info=$_GET['user_id'];
	
	mysqli_query($link,"delete from user where user_id='$info'");
	header('location:adminedit.php?info=adminedit');
?>