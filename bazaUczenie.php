<?php
session_start();

if (!isset($_SESSION['zalogowany']) or $_SESSION['zalogowany'] != 1) {
    header("location: /");
}
ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );
require_once('funkcje/bazadanych.php');
$conn = polaczenieBaza();
$nauczyciel =
    "SELECT nauczycielId
    FROM nauczyciele
    WHERE Email ='".$_POST["Email"]."'";
$nauczy = mysqli_query($conn,$nauczyciel);
$naucz = mysqli_fetch_assoc($nauczy);
$log =
    "SELECT klasaId
    FROM klasy 
    WHERE klasa = '".$_POST['klasa']."'";
$login = mysqli_query($conn, $log);
$row2 = mysqli_fetch_assoc($login);
$Zapytanie3 =
    "SELECT przedmiotId
    FROM przedmioty
    WHERE przedmiot ='". $_POST["przedmiot"] ."'";
$result = mysqli_query($conn,$Zapytanie3);
$row = mysqli_fetch_assoc($result);
$Zapytanie4 =
    "SELECT uczonaKlasa,uczonyPrzedmiot
    FROM uczenie
    WHERE uczonaKlasa ='".$row2["klasaId"]."'
    AND uczonyPrzedmiot ='".$row["przedmiotId"]."'";
$result2 = mysqli_query($conn,$Zapytanie4);
$row3 = mysqli_fetch_assoc($result2);
if ($row3["uczonaKlasa"] != null AND $row3["uczonyPrzedmiot"] != null){
    header("location: uczenie.php?zajete=5");
    die;
}else {
    $Zapytanie =
        "INSERT INTO uczenie (nauczyciel,uczonaKlasa,uczonyPrzedmiot) 
    VALUES ('" . $naucz["nauczycielId"] . "','" . $row2["klasaId"] . "','" . $row["przedmiotId"] . "')";


    if ($conn->query($Zapytanie) === true) {
        echo "New record created successfully";
        header("location: uczenie.php?dodano=2");
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
?>