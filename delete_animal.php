<?php
include('connect.php');
	
	$info=$_GET['animal_id'];
	
	mysqli_query($connect,"delete from animal where animal_id='$info'");
	header('location:adminadopt.php?info=adminadopt');
?>