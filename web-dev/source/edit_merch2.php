<?php
session_start();
require_once "config.php";
//include 'admin/connect.php';

//if(isset($_POST)& !empty($_POST))

	$merch_id= $_POST['merch_id'];
    $merch_name = $_POST['merch_name'];
	$merch_price = $_POST['merch_price'];
	$merch_photo = addslashes(file_get_contents($_FILES['merch_photo']['tmp_name']));

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
