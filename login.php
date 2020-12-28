<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Log In
    </title>
  </head>
  <body>
    <ul class="navigation">
      <li><a href="home.html">Home</a></li>
      <li><a href="donate.html">Donate</a></li>
      <li><a href="store.html">Store</a></li>
      <li><a href="adoption.html">Animal Adoption</a></li>
    </ul>

  <form action="login2.php" method="post"  enctype="multipart/form-data">

  <div class="container">
    <h1>Login</h1>
    <label for="email"><br>Email</br></label>
    <input type="email" placeholder="Enter email" name="email" required><br>

    <label for="password"><br>Password</br></label>
    <input type="password" placeholder="Enter Password" name="password" required><br></br>

    <button type="submit"class="loginbtn">Login</button><br></br>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    <div class="container register">
      <p>Have not registered? <a href="register.php">Register here</a></p>
    </div>
  </div>
  </form>
</body>
</html>