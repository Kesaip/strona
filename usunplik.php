<?php

    session_start();
    ini_set( 'display_errors', 'On' );
    error_reporting( E_ALL );

if (!isset($_SESSION['zalogowany']) or $_SESSION['zalogowany'] != 1 AND ($_SESSION['zalogowany'] < 400 or $_SESSION['zalogowany'] > 500) AND $_SESSION['zalogowany'] != 40) {
      header("location: /?nie=1");
}
require_once('funkcje/bazadanych.php');
$conn = polaczenieBaza();
$Zapytanie =
    "SELECT *
    FROM zadania
    WHERE id ='".$_GET["zadanie"]."'";
$result = mysqli_query($conn,$Zapytanie);
$row = mysqli_fetch_assoc($result);
if ($_SESSION['Id'] != $row["nauczyciel"]){
    header("location:/?nie");
}
$Zapytanie2 =
    "SELECT 
        Imie,
        Nazwisko,
        klasa,
        przedmiot
    FROM
        nauczyciele,
        klasy,
        przedmioty
    WHERE nauczycielId ='".$row["nauczyciel"]."'
    AND klasaId ='".$row["klasa"]."'
    AND przedmiotId ='".$row["przedmiot"]."'";
$result2 = mysqli_query($conn,$Zapytanie2);
$row2 = mysqli_fetch_assoc($result2);
if (file_exists("/Users/oskar/Desktop/stronyglowne/uploads/"/*"/var/www/domex/uploads"*/.$row2["Imie"]."_".$row2["Nazwisko"]."/".$row2["klasa"]."/".$row2["przedmiot"]."/".$row["nazwa"]."/".$_GET['name'])) {
    unlink("/Users/oskar/Desktop/stronyglowne/uploads/"/*"/var/www/domex/uploads/"*/.$row2["Imie"]."_".$row2["Nazwisko"]."/".$row2["klasa"]."/".$row2["przedmiot"]."/".$row["nazwa"]."/".$_GET['nazwa']);
    header("location: zadanie.php?zadanie=".$_GET["zadanie"]."&usunieto=1");
} else {
    header("location: zadanie.php?zadanie=".$_GET["zadanie"]."&niema=2");
}
?>