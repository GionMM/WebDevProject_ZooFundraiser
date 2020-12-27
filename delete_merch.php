<?php
include('connect.php');
	
	$info=$_GET['merch_id'];
	
	mysqli_query($connect,"delete from merch where merch_id='$info'");
	header('location:adminstore.php?info=adminstore');
?>