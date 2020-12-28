<?php
session_start();
error_reporting(0);
include 'connect.php';
extract($_POST);
	//if(isset($save))
	//{	
if ($connect->connect_error) {
		die(" Connection failed: " . $connect->connect_error);
	}

$userID = $_SESSION['user_id'];
$payment_method = "";
$amount = "";
$datetime = "";	
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$payment_method = $_POST['payment_method'];
		$amount = $_POST['amount'];
		$datetime = $_POST['datetime'];
		$sql2 = "insert into donation(user_id, payment_method, amount, datetime)
		values ('$userID', '$payment_method','$amount','$datetime')";
		$result2 = mysqli_query($connect, $sql2);
		
		if($result2)
		{
			//header("Location: index.php");
			?>
			<script>
				alert("Donation has successful.");
				window.location.href = "donation.php";
			</script>
			<?php
		} 
	}
		             
	//}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      Donation
    </title>
  </head>
  <body>
    <ul class="navigation">
      <li><a href="homepage.html">Home</a></li>
      <li><a href="donation.php">Donate</a></li>
      <li><a href="store.php">Store</a></li>
      <li><a href="adoption.php">Animal Adoption</a></li>
    </ul>

    <form method="post">
        <div class="container">
        <h1>Donation</h1>
        <hr>

        <label><b>Please choose payment method</b></label><br>
        <td><input type="radio" name="payment_method" value="1"/>Credit/Debit Card</td>  
        <tr></br>
        <td><input type="radio" name="payment_method" value="2"/>Online Banking</td></tr></br>  
        </tr>

       <br><label for="amount"><b>Amount (RM)</label></br>
        <input type="number" placeholder="Enter amount" name="amount" id="amount" required><br></br>

        <label for="datetime"><b>Date</b></label>
        <br><input type="datetime-local" name="datetime" id="datetime" required><br></br>

        <button type="submit" name="submit">Donate</button>
      </div>


    </form>
  </body>
  </html>