<?php
session_start();
require_once "config.php";
//include 'connect.php';

//if(isset($_POST)& !empty($_POST))

	$animal_id= $_REQUEST['animal_id'];
	//$user_id = $_REQUEST['user_id'];
    $animal_name = $_REQUEST['animal_name'];
    $animal_species = $_REQUEST['animal_species'];
    $annual_adoption_price = $_REQUEST['annual_adoption_price'];

	$sql = "UPDATE animal SET animal_name= '$animal_name',animal_species='$animal_species', annual_adoption_price = '$annual_adoption_price' WHERE animal_id = '$animal_id'";
	$result = mysqli_query($link,$sql);
	
	if($result)
	{
		?>
		<script>
			alert("Animal informations have been updated.");
			window.location.href = "adminadopt.php?animal_id=<?php echo $animal_id; ?>";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert("Fail to update the information.");
			window.location.href = "edit_animal.php?animal_id=<?php echo $animal_id; ?>";
		</script>
		<?php
	}

?>