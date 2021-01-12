<?php
//include('connect.php');
require_once "config.php";
	
	$info=$_GET['animal_id'];
	
	mysqli_query($link,"delete from animal where animal_id='$info'");
	header('location:adminadopt.php?info=adminadopt');
?>