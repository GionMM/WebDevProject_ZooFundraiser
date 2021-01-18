<?php
session_start();

	require_once "config.php";

	session_destroy();
	header('Location: main.php');
	die;
?>
