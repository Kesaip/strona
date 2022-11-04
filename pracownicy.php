      <?php
        require_once('naglowekpracownicy.php');
      ?>
      <div id="tresc_pracownicy">
        <br>
        <center>
        <?php
          if ($_GET["dodano"] != null) {
            print('<div class="alert alert-success  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukces!</strong> Pomyślnie dodałeś użytkownika.
              </div>');
          }
          if ($_GET["usunieto"] != null) {
            print('<div class="alert alert-success  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukces!</strong> Pomyślnie usunięto użytkownika.
              </div>');
          }
          if ($_GET["zedytowano"] != null) {
            print('<div class="alert alert-success  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukces!</strong> Pomyślnie zeedytowano użytkownika.
              </div>');
          }
          if ($_GET["!zmiany"] != null) {
            print('<div class="alert alert-info  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukces!</strong> Nie dokonano żadnych zmian.
              </div>');
          }
          if ($_GET["niewolno"] != null) {
            print('<div class="alert alert-danger  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oj Oj</strong> Nie wolno usuwać samego siebie.
              </div>');
            $idiota = "Idioto";
            echo "<script type='text/javascript'>alert('$idiota');</script>";
          }
          if ($_GET["zajety"] != null) {
            print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Ten login jest już zajęty.
              </div>');
          }
          if ($_GET["haslo"] != null) {
            print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oj!</strong> Nie umieszczaj spacji w haśle.
              </div>');
          }
          if ($_GET["zleimie"] != null) {
            print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Nie używaj znaków specjalnych oraz liczb w imieniu.
              </div>');
          }
          if ($_GET["zlenazwisko"] != null) {
            print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Nie używaj znaków specjalnych oraz liczb w nazwisku.
              </div>');
          }
          if ($_GET["zlylogin"] != null) {
            print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Login wpisz z małych liter oraz liczb.
              </div>');
          }
        ?>
        <a href="dodaj.php"><i class="fa fa-user-plus fa-3x" style='padding: 5px;color: rgb(0,200,0)'></i></a>
        <table class="table">
        <thead class="thead-dark">
          <tr>
          <th scope="col">#</th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Akcja</th>
          </tr>
        <?php
          $helena = 0;
        require_once('funkcje/bazadanych.php');
        $conn = polaczenieBaza();
          $Zapytanie =  "SELECT Nazwisko,Imie,PracownikId,Login
          FROM Pracownicy";
          $result = mysqli_query($conn, $Zapytanie);
          if ($result->num_rows > 0) {           
            while($row = $result->fetch_assoc()) {
              $helena++;
              echo "<tr><td>".$helena."</td><td>" . $row["Imie"]. "</td><td>" . $row["Nazwisko"] . "</td><td> <a href='edytuj.php?id=".$row["PracownikId"]."'><i class='fa fa-pencil-square-o fa-2x' style='padding-right: 5px' aria-hidden='true'></i></a><a href='usun.php?id=".$row["PracownikId"]."'><i class='fa fa-trash fa-2x' style='padding-left: 5px;color: rgb(255,30,30)' aria-hidden='true'></i></a></td></tr>";
            }
          } else {
            echo "0 results";
          }
        ?>
        </table>
        </center>
      </div>
      <?php
        require_once('stopka.php');
      ?>
    </body>
  </html>
