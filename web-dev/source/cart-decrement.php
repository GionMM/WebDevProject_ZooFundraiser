<?php
session_start();

require_once "config.php";

$user_id = $_SESSION[ 'id' ];

$merch_id = $_GET[ 'merch_id' ];

$sql = 'SELECT quantity FROM cart WHERE user_id = ' . $user_id . ' AND merch_id = ' . $merch_id . ' ';

$result = mysqli_query( $link, $sql );

while ( $row = mysqli_fetch_array( $result ) ) {

	if ( $result->num_rows > 0 ) {
		$quantity = $row[ "quantity" ];
	}
}

if ( $quantity == 1 ) {
	mysqli_query( $link, 'DELETE from cart WHERE user_id = ' . $user_id . ' AND merch_id = ' . $merch_id . ' ' );
} else {
	mysqli_query( $link, 'UPDATE cart SET quantity = quantity-1 WHERE user_id = ' . $user_id . ' AND merch_id = ' . $merch_id . ' ' );

}

header( 'location:cart.php' );

?>