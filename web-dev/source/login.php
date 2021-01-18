<?php
session_start();

if ( (isset( $_SESSION[ "loggedin" ] )) && ($_SESSION[ "loggedin" ] === true )) {
	header( "location: main.php" );
	exit;
}

require_once "config.php";
?>

<?php

$email = $password = "";
$email_err = $password_err = "";

if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {

	if ( empty( trim( $_POST[ "email" ] ) ) ) {
		$email_err = "Please enter username.";

	} else {
		$email = trim( $_POST[ "email" ] );
	}

	if ( empty( trim( $_POST[ "password" ] ) ) ) {
		$password_err = "Please enter your password.";

	} else {
		$password = trim( $_POST[ "password" ] );
	}

	if ( empty( $email_err ) && empty( $password_err ) ) {

		$sql = "SELECT user_id, email, password FROM user WHERE email = ?";

		if ( $stmt = mysqli_prepare( $link, $sql ) ) {
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param( $stmt, "s", $param_email );

			// Set parameters
			$param_email = $email;

			// Attempt to execute the prepared statement
			if ( mysqli_stmt_execute( $stmt ) ) {
				// Store result
				mysqli_stmt_store_result( $stmt );

				// Check if username exists, if yes then verify password
				if ( mysqli_stmt_num_rows( $stmt ) == 1 ) {
					
					mysqli_stmt_bind_result( $stmt, $id, $email, $hashed_password );
					
					if ( mysqli_stmt_fetch( $stmt ) ) {
						
						if ( password_verify( $password, $hashed_password ) ) {
							
							$sql2= "SELECT user_class FROM user WHERE email = '$email';";
							
							$result2 = mysqli_query($link, $sql2);
						
							if (mysqli_num_rows($result2) == 1) 
							{

								$fetch = mysqli_fetch_assoc($result2);
								
								if($fetch['user_class'] == '1')
								{
									session_start();

									$_SESSION[ "loggedin" ] = true;
									$_SESSION[ "id" ] = $id;
									$_SESSION[ "email" ] = $email;
									$_SESSION[ "user_class" ] = $fetch['user_class'];
								
									header("location: admin-home.php");		  
								}
								
								else if($fetch['user_class'] == '0')
								{
									session_start();

									$_SESSION[ "loggedin" ] = true;
									$_SESSION[ "id" ] = $id;
									$_SESSION[ "email" ] = $email;
									$_SESSION[ "user_class" ] = $fetch['user_class'];

									header("location: main.php");

								}
								
								
							}
							
						} 
						
						else {

							$password_err = "The password you entered was not valid.";
						}
					}
				} 
				
				
				else {
					// Display an error message if username doesn't exist
					$email_err = "No account found with that username.";
				}
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}
		}

		mysqli_stmt_close( $stmt );
	}

	mysqli_close( $link );
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homepage</title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		html {
			scroll-behavior: smooth;
		}

	</style>
</head>

<body>

	  <form class="form-signin" method="post" action="" name="myForm" novalidate >
      <div class="text-center mb-4">
		  <i class="fa fa-user-circle fa-5x"></i>
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required value="<?php echo $email; ?>">
        <label for="inputEmail">Email address</label>
		  <span class="help-block">
				<?php echo $email_err; ?>
			</span>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required value="<?php echo $password; ?>">
        <label for="inputPassword">Password</label>
		  <span class="help-block">
				<?php echo $password_err; ?>
			</span>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <input class="btn btn-lg btn-primary btn-block" type="submit" ></input>
	            <script>
				function validateForm() {
				  	var x = document.forms["myForm"]["email"].value;
					var y = document.forms["myForm"]["password"].value;

				  if (x == ""|| y == "" )  {
					alert("All box must be filled out before submitting");
					return false;
				  }

				}
			</script> 
<p>Have not registered? <a href="./register.php">Register here</a></p>
      <p class="mt-5 mb-3 text-muted text-center">Copyright © 2020-2021 Universiti Teknikal Malaysia Melaka. All rights reserved.</p>
    </form>
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../js/jquery-3.3.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap-4.3.1.js"></script>
	

</body>
</html>