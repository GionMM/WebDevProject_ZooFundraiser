<?php
//include('connect.php');
require_once "config.php";
	
	$info=$_GET['merch_id'];
	
	mysqli_query($link,"delete from merch where merch_id='$info'");
	header('location:adminstore.php?info=adminstore');
?>