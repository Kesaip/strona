<?php

session_start();

require_once('funkcje/bazadanych.php');
require_once('funkcje/link.php');
require_once ('funkcje/imiona.php');
$conn = polaczenieBaza();

    $Zapytanie = "SELECT Nazwisko,Imie,PracownikId
  FROM Pracownicy
  WHERE PracownikId = '".$_SESSION['Id']."'";

    $result = mysqli_query($conn, $Zapytanie);
    $row = mysqli_fetch_assoc($result);
    $Zapytanie2 = "SELECT Nazwisko,Imie,OsobaId
    FROM Uzytkownicy
    WHERE OsobaId = '".$_SESSION['Id']."'";
    $result2 = mysqli_query($conn, $Zapytanie2);
    $row2 = mysqli_fetch_assoc($result2);
if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==1) {
    $imie = $row['Imie'];
} elseif (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==2) {
    $imie2 = $row2['Imie'];
}
?>
<?php
require_once('naglowek.php');
?>
<div id="tresc">
    <?php
    link1($_GET);
    ?>
    <br>
    <p style="font-size:50px;" class="cien" style="centre">Witaj <?php if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==1) {print (imie($imie));}
        elseif (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==2) {print (imie($imie2));}?></p>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="obrazy/zdjecie.jpg" class="img-fluid rounded" style='padding: 4px' alt="Zdjecie" width="500"
                     height="700">
                <div class="carousel-caption">
                    <h3><strong style="color: black"> To ja</strong></h3>
                    <p><strong style="color: black"> super koks </strong></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="obrazy/giga.png" class="img-fluid rounded" alt="Giga" width="500" height="700">
                <div class="carousel-caption">
                    <h3> To też ja</h3>
                    <p> ale z innego profilu </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require_once('stopka.php');
?>
</body>
</html>

