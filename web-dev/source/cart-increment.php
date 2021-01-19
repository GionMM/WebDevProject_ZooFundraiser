<?php
session_start();

require_once "config.php";

$user_id = $_SESSION[ 'id' ];

$merch_id = $_GET[ 'merch_id' ];

mysqli_query( $link, 'UPDATE cart SET quantity = quantity+1 WHERE user_id = '.$user_id.' AND merch_id = '.$merch_id.' ' );


header( 'location:cart.php' );



?>