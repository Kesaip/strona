<?php 
  session_start();

  if (!isset($_SESSION['zalogowany']) or $_SESSION['zalogowany'] != 1) {
    header("location: php.php");
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
          if (isset($_GET["zlehaslo"])) {
            print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oj!</strong> hasła nie zgadzają się.
              </div>');
          }
          if (isset($_GET["zajety"])) {
            print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Ten login jest już zajęty.
              </div>');
          }
          if (isset($_GET["haslo"])) {
            print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oj!</strong> Nie umieszczaj spacji w haśle.
              </div>');
          }
          if (isset($_GET["zleimie"])) {
            print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Nie używaj znaków specjalnych oraz liczb w imieniu.
              </div>');
          }
          if (isset($_GET["zlenazwisko"])) {
            print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Nie używaj znaków specjalnych oraz liczb w nazwisku.
              </div>');
          }
          if (isset($_GET["zlylogin"])) {
            print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Login wpisz z małych liter oraz liczb.
              </div>');
          }
        ?>
        <div class="container">
        <br>
        <form action='baza.php' method="post" id="baza">
            <label for='Imie'><b>Imie</b></label>
            <input type="text" class="form-control" placeholder="Wprowadź Imię" name="Imie" required/>
            <label for='Nazwisko'><b>Nazwisko</b></label>
            <input type="text" class="form-control" placeholder="Wprowadź nazwisko" name="Nazwisko" required/>
          <label for='login'><b>Login</b></label>
          <input type="text" class="form-control" placeholder="Wprowadź login" name="login" required/>
          <label for='Login'><b>hasło</b></label>
          <input name="haslo" class="form-control" id="haslo" placeholder="Wprowadź hasło" type="password" onkeyup='check();'required/>
          </label>
          <br>
          <label for='Login'><b>Powtórz hasło</b></label>
          <input type="password" class="form-control" name="haslo2" placeholder="Wprowadź hasło" id="haslo2"  onkeyup='check();'required/> 
          <span id='potwierdzenie'></span>
          </label>
          <center>
          <a href="pracownicy.php"><span class="btn btn-danger" style="margin: 10px;"  id="dodaj">Cofnij</span></a>
            <button class="btn btn-primary"  style="margin: 10px;" id="dodaj">Dodaj</button>
          </center>
        </form>
        </div>
      </div>
      <?php
        require_once('stopka.php');
      ?>
    </body>
  </html>
