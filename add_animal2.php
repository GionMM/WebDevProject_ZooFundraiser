<?php
require_once "config.php";
//include 'connect.php';

$animal_name = $_POST['animal_name'];
$animal_species = $_POST['animal_species'];
$annual_adoption_price = $_POST['annual_adoption_price'];
	
	/*if ($connect->connect_error) {
		die(" Connection failed: " . $connect->connect_error);
	}*/

	$sql = "SELECT animal_name FROM animal WHERE animal_name='$animal_name' ";
	$result = $link->query($sql);
	$num_rows=mysqli_num_rows($result);
	$row = $result->fetch_assoc();
	
	if($num_rows>0){
		echo '<script language="javascript">';
		echo 'alert("The animal has exist!");';
		echo 'window.location.href="add_animal.php";';
		echo'</script>';
	   
	}
	
	else {
	
		$sql2 = "INSERT INTO animal (animal_name, animal_species, annual_adoption_price)
		values ('$animal_name','$animal_species','$annual_adoption_price')";
		$result2 = mysqli_query($link, $sql2);
		
		if($result2)
		{

			?>
			<script>
				alert("Animal has been added.");
				window.location.href = "adminadopt.php";
			</script>
			<?php
		}
	
}
?>