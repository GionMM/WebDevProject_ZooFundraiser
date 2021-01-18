<?php
session_start();
require_once "config.php";

echo "<!doctype html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->

    <title>Displaying Images from database  </title>";
    echo "<style>
    .my_table > tbody > tr > td {
    vertical-align: middle;
    }
    .my_table {width:500px;}
    </style>
    </head><body>";

//require "connect.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Admin Zoo Fundraiser Store
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <body>
    <ul class="navigation">
      <li><a href="adminhome.php">Home</a></li>
      <li><a href="adminedit.php">Edit Admin</a></li>
      <li><a href="admindonate.php">View Donation</a></li>
      <li><a href="adminstore.php">Edit Store</a></li>
      <li><a href="adminadopt.php">Edit Animal Adoption</a></li>
      <li><a href="adminreport.php">Report</a></li>
    </ul>

    <form>
        <div class="container">
        <h1>List of Merchandise Available</h1><hr>

        <p>Instruction: Press Update to update merchandise, Delete to delete merchandise, and Add to add merchandise. </p>

        <p>Click the + icon to add new merchandise:
        <a href="add_merch.php">
          <span class="glyphicon glyphicon-plus"></span>
        </a>
        </form>

        <script type="text/javascript">
      function deletes(merch_id)
      {
	    a=confirm('Are You Sure Want To Remove This Merchandise?')
	    if(a)
     {
        window.location.href='delete_merch.php?merch_id='+merch_id;
     }
}
</script>

<?php
echo "<div class='row'>
<div class='col-md-11 offset-md-1'>";

if($stmt = $link->query("SELECT * FROM merch")){

  echo "Total of merchandise : ".$stmt->num_rows."<br>";

	echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>";
  echo "<tr>";

echo "<th>Image</th><th>Merchandise Name</th><th>Price</th><th>Update</th><th>Delete</th></tr>";
while ($row = $stmt->fetch_assoc()) {
	$merch_photo = $row[ "merch_photo" ];
echo "<tr><td><img class='card-img-top' src='data:image/jpeg;base64,".base64_encode($merch_photo)." alt='Card image cap'></td>
<td><merch_id=$row[merch_id]>$row[merch_name]</td>
<td>$row[merch_price]</td>
<td class='text-center'><a href='edit_merch.php?merch_id=$row[merch_id]&info=edit_merch'><span class='glyphicon glyphicon-pencil'style=color:green;></span></a></td>
<td class='text-center'><a href='#' onclick='deletes($row[merch_id])'><span class='glyphicon glyphicon-trash' style=color:black;></span></a></td></tr>";
  }
echo "</table>";
}else{
echo $link->error;
}
echo "</div></div>";

?>

  </body>
  </html>
