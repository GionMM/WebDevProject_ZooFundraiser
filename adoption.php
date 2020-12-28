<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Animal Adoption
    </title>
  </head>
  <body>
    <ul class="navigation">
      <li><a href="homepage.html">Home</a></li>
      <li><a href="donation.php">Donate</a></li>
      <li><a href="store.php">Store</a></li>
      <li><a href="adoption.php">Animal Adoption</a></li>
    </ul>
    <form>
      <div class="container">
      <h1>Animal Adoption</h1>
      <h2>Donate RM100 per month to choose which animal you would like to adopt.</h2>
      <hr>
      <p><b>Adopting the animals comes with special perk which are: E-Certificate, Exclusive vouchers and Feeding adopted animal during visits</b></p>
      <p>Package 1: Adopt Panda and you'll get a panda's shaped keychain and able to feed the panda when you visit our zoo.</p>
      <p>Package 2: Adopt Tiger and you'll get a tiger's shaped keychain and able to take picture with the tiger when you visit our zoo.</p>
      <p>Package 3: Adopt Leopard and you'll get a leopard's shaped keychain and a 20% discount to our zoo.</p>
      <p>Package 4: Adopt Monkey and you'll get a monkey's shaped keychain and able to feed the monkey when you visit our zoo.</p>

      <img class="one" src="img/panda.jpg" width="500" height="400"><br>
      <input type="radio" id="panda" name="choice" value="Adopt Panda">
      <label for="panda"><b>Panda</b></label><br><br>

      <img class="one" src="img/tiger.jpg" width="500" height="400"><br>
      <input type="radio" id="tiger" name="choice" value=" AdoptTiger">
      <label for="tiger"><b>Tiger</b></label><br><br>

      <img class="one" src="img/leopard.jpg" width="500" height="400"><br>
      <input type="radio" id="leopard" name="choice" value="Adopt Leopard">
      <label for="leopard"><b>Leopard</b></label><br><br>

      <img class="one" src="img/monkey.jpg" width="500" height="400"><br>
      <input type="radio" id="monkey" name="choice" value="Adopt Monkey">
      <label for="monkey"><b>Monkey</b></label><br><br>

      <input type="button" id="btn" value="Adopt">
    </div>
  </form>
  <script>
        const btn = document.querySelector('#btn');
        // handle click button
        btn.onclick = function () {
            const rbs = document.querySelectorAll('input[name="choice"]');
            let selectedValue;
            for (const rb of rbs) {
                if (rb.checked) {
                    selectedValue = rb.value;
                    break;
                }
            }
            alert(selectedValue);
        };
    </script>
</body>
</html>