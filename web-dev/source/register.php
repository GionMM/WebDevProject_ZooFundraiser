<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

if ( (isset( $_SESSION[ "loggedin" ] )) && ($_SESSION[ "loggedin" ] == true )) {
	header( "location: main.php" );
	exit;
}

require_once "config.php";
?>
<?php
$badchar = array( "~", "!", "@", "#", "$", "%", "^", "&", "*", "_", "-", "+", "=", "{", "}", "[", "]", "|", ";", "<", ">", "?", "`" );
$badchar2 = array( "~", "!", "#", "$", "%", "^", "&", "*", "_", "-", "+", "=", "{", "}", "[", "]", "|", ";", "<", ">", "?", "`" );

$email = $name = $usertype = $password = $confirm_password = null;
$email_err = $name_err = $usertype_err = $password_err = $confirm_password_err = null;

if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {

	if ( empty( $_POST[ "email" ] ) ) {
		$email_err = "Please enter an email.";
	} else {
		$sql = "SELECT email FROM user WHERE email = ?";

		if ( $stmt = mysqli_prepare( $link, $sql ) ) {

			mysqli_stmt_bind_param( $stmt, "s", $param_email );

			$param_email = trim( $_POST[ "email" ] );

			if ( mysqli_stmt_execute( $stmt ) ) {

				mysqli_stmt_store_result( $stmt );

				if ( mysqli_stmt_num_rows( $stmt ) == 1 ) {
					$email_err = "This email is already taken.";
				} else {
					$email = trim( $_POST[ "email" ] );
				}
			}
		}
	}

	if ( empty( $_POST[ "name" ] ) ) {
		$name_err = "Please enter name.";
	} else {
		$name = $_POST[ "name" ];
		$name = str_ireplace( "'", "\'", $name );
		$name = str_ireplace( $badchar2, "", $name );
	}

	if ( empty( trim( $_POST[ "password" ] ) ) ) {
		$password_err = "Please enter a password.";
	} elseif ( strlen( trim( $_POST[ "password" ] ) ) < 8 ) {
		$password_err = "Password must have atleast 8 characters.";
	} else {
		$password = trim( $_POST[ "password" ] );
	}

	if ( empty( trim( $_POST[ "confirm_password" ] ) ) ) {
		$confirm_password_err = "Please confirm password.";
	} else {
		$confirm_password = trim( $_POST[ "confirm_password" ] );
		if ( empty( $password_err ) && ( $password != $confirm_password ) ) {
			$confirm_password_err = "Password did not match.";
		}
	}

	if ( empty( $name_err ) && empty( $email_err ) && empty( $password_err ) && empty( $confirm_password_err ) ) {


		$hash_password = password_hash( $password, PASSWORD_DEFAULT );

		$sql = "INSERT INTO user (email, password, fullname, user_class) VALUES ('$email','$hash_password','$name','0');";

		if ( $stmt = mysqli_prepare( $link, $sql ) ) {

			if ( mysqli_stmt_execute( $stmt ) ) {
				echo "<script>";
				echo "alert('Register successfull.');";
				echo "window.location.href='login.php'";
				echo "</script>";

			} else {
				echo "Something went wrong. Please try again later.";
			}
		}

		mysqli_stmt_close( $stmt );
	}

}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register page</title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/floating-labels.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.help-block {
			color: red;
		}
	</style>

</head>

<body>

	<form class="form-signin" method="post" name="myForm" novalidate onSubmit='return validateForm()'>
		<div class="text-center mb-4">
			<i class="fa fa-user-circle fa-5x"></i>
			<h1 class="h3 mb-3 font-weight-normal">Register</h1>
			<p>Fill in this form to create an account</p>
		</div>

		<div class="form-label-group">
			<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required value="<?php echo $email; ?>">
			<label for="inputEmail">Email address</label>
			<span class="help-block">
				<?php echo $email_err; ?>
			</span>
		</div>
		<div class="form-label-group">
			<input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required  value="<?php echo $name; ?>">
			<label for="inputName">Full name</label>
			<span class="help-block">
				<?php echo $name_err; ?>
			</span>
		</div>
		<div class="form-label-group">
			<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required value="<?php echo $password; ?>">
			<label for="inputPassword">Password</label>
			<span class="help-block">
				<?php echo $password_err; ?>
			</span>
		</div>

		<div class="form-label-group">
			<input type="password" id="inputRePassword" name="confirm_password" class="form-control"  placeholder="Re-enter Password" required value="<?php echo $confirm_password; ?>">
			<label for="inputRePassword">Re-enter password</label>
			<span class="help-block">
				<?php echo $confirm_password_err; ?>
			</span>
		</div>

		<input class="btn btn-lg btn-primary btn-block" type="submit"></input>
	
		   <script>
				function validateForm() {
				  	var x = document.forms["myForm"]["email"].value;
					var y = document.forms["myForm"]["name"].value;
					var z = document.forms["myForm"]["password"].value;
					var a = document.forms["myForm"]["confirm_password"].value;
					
				  if (x == ""|| y == "" || z == "" || a == "")  {
					alert("All box must be filled out before submitting");
					return false;
				  }
				}

			</script> 
	
		<p>Already have an account? <a href="./login.php">Sign in here</a>
		</p>
		<p class="mt-5 mb-3 text-muted text-center">Copyright © 2020-2021 Universiti Teknikal Malaysia Melaka. All rights reserved.</p>
	</form>
<!--
		<script>
				function validateForm() {
				  	var x = document.forms["myForm"]["email"].value;
					var y = document.forms["myForm"]["name"].value;
					var z = document.forms["myForm"]["password"].value;
					var a = document.forms["myForm"]["confirm_password"].value;
					
					 if (!y )  {
					alert("All box must be filled out before submitting"+y);
					return false;
				  }
//					else {
//						return true;
//					}
//					
	</script>
-->

	
	

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../js/jquery-3.3.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap-4.3.1.js"></script>


</body>
</html>