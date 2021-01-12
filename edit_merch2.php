<?php
session_start();
require_once "config.php";
//include 'connect.php';

//if(isset($_POST)& !empty($_POST))

	$merch_id= $_REQUEST['merch_id'];
    $merch_name = $_REQUEST['merch_name'];
	$merch_price = $_REQUEST['merch_price'];
	$merch_photo = $_REQUEST['merch_photo'];

	$sql = "UPDATE merch SET merch_name= '$merch_name',merch_price = '$merch_price',merch_photo = '$merch_photo' WHERE merch_id = '$merch_id'";
	$result = mysqli_query($link,$sql);
	
	if($result)
	{
		?>
		<script>
			alert("Merchandise informations have been updated.");
			window.location.href = "adminstore.php?merch_id=<?php echo $merch_id; ?>";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert("Fail to update the information.");
			window.location.href = "edit_merch.php?merch_id=<?php echo $merch_id; ?>";
		</script>
		<?php
	}

?>
