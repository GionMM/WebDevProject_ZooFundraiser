<?php 
session_start();
include ('connect.php');
//$user= $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Merchandise Store
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>

  <body>
  <ul class="navigation">
      <li><a href="homepage.php">Home</a></li>
      <li><a href="donation.php">Donate</a></li>
      <li><a href="store.php">Store</a></li>
      <li><a href="adoption.php">Animal Adoption</a></li>
    </ul>

    <form>
        <div class="container">
        <h1>List of Merchandise Available</h1><br>
        <hr>

        <p>Instruction: Press Cart to add to cart and press purchase to purchase. </p>
        </form>

        <script type="text/javascript">
      function added(merch_id)
      {
	    a=confirm('Item added to your cart!')
	    if(a)
     {
        window.location.href='#';
     }
}
</script>

<script type="text/javascript">
      function purchase(merch_id)
      {
	    a=confirm('You have purchased the item.Thank You!')
	    if(a)
     {
        window.location.href='#';
     }
}
</script>

    <?php

	echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>";
	echo "<tr>";
	
	//echo "<th>S.No</th>";
	echo "<th class='text-center'>Merchandise Name</th>";
    echo "<th class='text-center'>Price (RM)</th>";
    echo "<th class='text-center'>Action</th>";
	echo "<th class='text-center'>Purchase</th>";
	echo "</tr>";
	
	$i=1;
	$que=mysqli_query($connect,"SELECT * FROM merch");

	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		//echo "<td>".$i."</td>";
		echo "<td class='text-center'>".$row['merch_name']."</td>";
        echo "<td class='text-center'>".$row['price']."</td>";
        echo "<td class='text-center'><a href='#' onclick='added($row[merch_id])'><span class='glyphicon glyphicon-shopping-cart' style=color:black;></span></a></td>";
        echo "<td class='text-center'><a href='#' onclick='purchase($row[merch_id])'>Purchase</a></td>";
		//echo "<td class='text-center'><a href='dashboard.php?animal_id=$row[animal_id]&info=show_salon'><span class='fa fa-eye'style=color:black;></span></a></td>";
	
}
?>


  </body>
  </html>