<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Register
    </title>
  </head>
  <body>
    <ul class="navigation">
      <li><a href="Home.html">Home</a></li>
      <li><a href="donation.php">Donate</a></li>
      <li><a href="store.php">Store</a></li>
      <li><a href="adoption.php">Animal Adoption</a></li>
    </ul>

		<form action="register2.php" method="post"  enctype="multipart/form-data">


<form>
    <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="password" required>

    <label for="fullname"><b>Fullname</b></label>
    <input type="text" placeholder="Enter Fullname" name="fullname" id="fullname" required>


    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>