<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Add Animal
    </title>
  </head>
  <body>
    <ul class="navigation">
    <li><a href="adminhome.php">Home</a></li>
      <li><a href="adminedit.php">Edit Admin</a></li>
      <li><a href="admindonate.php">Edit Donation</a></li>
      <li><a href="adminstore.php">Edit Store</a></li>
      <li><a href="adminadopt.php">Edit Animal Adoption</a></li>
      <li><a href="adminreport.php">Report</a></li>
    </ul>
    </ul>

		<form action="add_animal2.php" method="post"  enctype="multipart/form-data">


<form>
    <div class="container">
    <h1>Add Animal</h1>
    <hr>

    <label for="animal_name"><b><br>Animal Name</br></label>
    <input type="text" placeholder="Enter animal name" name="animal_name" id="animal_name" required><br>

    <label for="animal_species"><b><br>Animal Species</br></label>
    <input type="text" placeholder="Enter animal species" name="animal_species" id="animal_species" required><br>

    <label for="annual_adoption_price"><b><br>Annual Adoption Price (RM)</br></label>
    <input type="text" placeholder="Enter annual adoption price" name="annual_adoption_price" id="annual_adoption_price" required><br></br>


    <button type="submit" class="addbtn">Add</button>
  </div>

  
</form>

</body>
</html>