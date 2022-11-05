<?php 

  session_start();
  if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] != 5) {
      header("location: php.php?nie=1");
  }
require_once('funkcje/bazadanych.php');
$conn = polaczenieBaza();

  $Zapytanie =  "SELECT Nazwisko,Imie,PracownikId
  FROM Pracownicy";

  $result = mysqli_query($conn, $Zapytanie);
  $row = mysqli_fetch_assoc($result);
  require_once('naglowek.php');
  if (isset($_GET["duzy"] ) {
    print('<div class="alert alert-warning  alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>O nie!</strong> Twój plik jest za duży dozwolony rozmiar to 500KB.
      </div>');
  }
  if (isset($_GET["nieto"])) {
    print('<div class="alert alert-warning  alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>O nie!</strong> Dozwolone pliki to jpg, jpeg, png, gif.
      </div>');
  }
  if (isset($_GET["obraz"])) {
    print('<div class="alert alert-danger  alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Oj Oj!</strong> Nie wolno tak robić.
      </div>');
  }
  if (isset($_GET["udane"])) {
    print('<div class="alert alert-success  alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sukces!</strong> Pomyślnie dodałeś plik.
      </div>');
  }
?>
<center>
<form action="upload.php" method="post" enctype="multipart/form-data">
<label for="formFileMultiple" class="form-label">Wrzutka</label>
<input class="form-control form-control-lg" name="fileToUpload" type="file" id="fileToUpload"/>
  <input type="submit" class="btn btn-primary" style="margin: 10px" value="Udostępnij" name="submit">
</form>
</center>
<?php
        require_once('stopka.php');
      ?>
</body>
</html>
