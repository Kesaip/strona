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
  require_once('funkcje/link.php');
  link1($_GET);
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
