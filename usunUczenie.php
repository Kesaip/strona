<?php
session_start();
if (!isset($_SESSION['zalogowany']) or $_SESSION['zalogowany'] != 1) {
    header("location: /");
}
require_once('funkcje/bazadanych.php');
$conn = polaczenieBaza();
ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );

    $Zapytanie =
        "DELETE 
    FROM uczenie
    WHERE nauczyciel='" .$_GET['nauczyciel']."'
    AND uczonaKlasa='" .$_GET['klasa']."'
    AND uczonyPrzedmiot='" .$_GET['przedmiot']."'";
    if ($conn->query($Zapytanie) === TRUE) {
        echo "New record created successfully";
        header("location: uczenie.php?usunieto=1");
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
?>