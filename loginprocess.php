<?php
session_start();
ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );
require_once('funkcje/bazadanych.php');
$conn = polaczenieBaza();
$Zapytanie =  "SELECT Nazwisko,Imie,OsobaId
    FROM Uzytkownicy WHERE Email='".$_POST["login"]."' AND Haslo='".$_POST["haslo"]."'";
$result = mysqli_query($conn, $Zapytanie);
$row = mysqli_fetch_assoc($result);
if ($row == null) {
    $_SESSION['zalogowany'] = 0;
    $Zapytanie = "SELECT Nazwisko,Imie,uczenId
        FROM uczniowie WHERE Email='" . $_POST["login"] . "' AND Haslo='" . $_POST["haslo"] . "'";
    $result = mysqli_query($conn, $Zapytanie);
    $row = mysqli_fetch_assoc($result);
    $Zapytanie2 = "SELECT klasaId
        FROM klasy";
    $result2 = mysqli_query($conn, $Zapytanie2);
    $row2 = mysqli_fetch_assoc($result2);
    $klasa = $row2['klasaId'];
    if ($row == null) {
        $_SESSION['zalogowany'] = 0;
        $Zapytanie = "SELECT Nazwisko,Imie,PracownikId
        FROM Pracownicy WHERE Login='" . $_POST["login"] . "' AND Haslo='" . $_POST["haslo"] . "'";
        $result = mysqli_query($conn, $Zapytanie);
        $row = mysqli_fetch_assoc($result);
        if ($row == null) {
            $_SESSION['zalogowany'] = 0;
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: php.php?Nieudany=1");
            exit;
        } else {
            $_SESSION['Id'] = $row['PracownikId'];
            $_SESSION['zalogowany'] = 1;
            $_SESSION['time'] = time() + 600;
            header("Location: pracownicy.php?udanie");
            exit;
        }
    } else {
        $_SESSION['Id'] = $row['uczenId'];
        $_SESSION['zalogowany'] = 3 . $klasa;
        $_SESSION['time'] = time() + 600;
        header("Location: ".$_SERVER['HTTP_REFERER'].'?udanie');
        exit;
    }
}else {
    $_SESSION['Id'] = $row['OsobaId'];
    $_SESSION['zalogowany'] = 2;
    $_SESSION['time']     = time()+600;
    header("Location: ".$_SERVER['HTTP_REFERER'].'?udanie');
}
?>