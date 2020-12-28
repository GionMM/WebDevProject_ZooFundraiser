<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Add Merchandise
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

		<form action="add_merch2.php" method="post"  enctype="multipart/form-data">


<form>
    <div class="container">
    <h1>Add Merchandise</h1>
    <hr>

    <label for="merch_name"><b><br>Merchandise Name</br></label>
    <input type="text" placeholder="Enter merchandise name" name="merch_name" id="merch_name" required><br>

    <label for="price"><b><br>Price (RM)</br></label>
    <input type="number" placeholder="Enter price" name="price" id="price" required><br></br>

     <button type="submit" class="addbtn">Add</button>
  </div>

  
</form>

</body>
</html>