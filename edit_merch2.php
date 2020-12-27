<?php
//session_start();

include 'connect.php';

//if(isset($_POST)& !empty($_POST))

	$merch_id= $_REQUEST['merch_id'];
	//$user_id = $_REQUEST['user_id'];
    $merch_name = $_REQUEST['merch_name'];
    $price = $_REQUEST['price'];

	$sql = "UPDATE merch SET merch_name= '$merch_name',price = '$price' WHERE merch_id = '$merch_id'";
	$result = mysqli_query($connect,$sql);
	
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