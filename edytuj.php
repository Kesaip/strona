<?php 
  session_start();
  if (!isset($_SESSION['zalogowany']) or $_SESSION['zalogowany'] != 1) {
    header("location: php.php");
  }
  $conn = new mysqli ("127.0.0.1", "oskar", "zaq1@WSX", "domex");
  if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
  }
  $Zapytanie =  "SELECT Nazwisko,Imie,Login,PracownikId,Haslo
  FROM Pracownicy WHERE PracownikId=".$_GET['id'];
  $result = mysqli_query($conn, $Zapytanie);
  if ($result->num_rows > 0) {   
    while($row = $result->fetch_assoc()) {
      $imie = $row["Imie"];
      $nazwisko = $row["Nazwisko"];
      $login = $row["Login"];
      $haslo = $row["Haslo"];
    }
    print('');
  } else {
    echo "0 results";
  }    
?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Oskar Piasecki - Pracownicy</title>
      <script>
        var check = function() {
          if (document.getElementById('haslo').value ==
            document.getElementById('haslo2').value) {
            document.getElementById('potwierdzenie').style.color = 'green';
            document.getElementById('potwierdzenie').innerHTML = 'zgodne';
            document.getElementById('dodaj').disabled = false;
          } else {
            document.getElementById('potwierdzenie').style.color = 'red';
            document.getElementById('potwierdzenie').innerHTML = 'nie zgodne';
            document.getElementById('dodaj').disabled = true;
          }
        }
      </script>
    </head>
    <body>
      <?php
        require_once('naglowekpracownicy.php');
      ?>
      <div id="tresc_pracownicy">
        <br>
        <br>
        <?php
          if ($_GET["zlehaslo"] != null) {
            print("<span style='color: red'>Hasła nie zgadzają się</span><br />");
          }
        ?>
        <div class="container">
        <br>
        <form action='edycja.php' method="post" id="baza">
          <label for='Imie'><b>Imie</b></label>
          <input type="text" placeholder="Wprowadź Imię" class="form-control" name="Imie" value="<?php print($imie) ?>" required/>
          <label for='Nazwisko'><b>Nazwisko</b></label>
          <input type="text" placeholder="Wprowadź nazwisko" class="form-control" name="Nazwisko" value="<?php print($nazwisko) ?>" required/>
          <label for='Login'><b>Login</b></label>
          <input type="text" placeholder="Wprowadź login" class="form-control" name="Login" value="<?php print($login) ?>" required/>
          <label for='Login'><b>hasło</b></label>
          <input name="haslo" id="haslo" type="password" class="form-control" onkeyup='check();' value="<?php print($haslo) ?>" required/>
          </label>
          <br>
          <label for='Login'><b>Powtórz hasło</b></label>
          <input type="password" name="haslo2" id="haslo2" class="form-control"  onkeyup='check();' value="<?php print($haslo) ?>" required/> 
          <span  id='potwierdzenie'></span>
          </label>
          <center>
          <a href="pracownicy.php"><span class="btn btn-danger" style="margin: 10px;"  id="dodaj">Cofnij</span></a>
          <button class="btn btn-primary" style="margin: 10px;" id="dodaj">Edytuj</button> 
          </center>
          <input type="hidden" name="id" value="<?php print($_GET['id']) ?>" />
        </form>
        </div>
      </div>
      <?php
        require_once('stopka.php');
      ?>
    </body>
  </html>
