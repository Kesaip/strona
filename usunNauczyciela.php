<?php
session_start();

if (!isset($_SESSION['zalogowany']) or $_SESSION['zalogowany'] != 1) {
    header("location: /");
}

ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );

require_once('funkcje/bazadanych.php');
$conn = polaczenieBaza();

    $Zapytanie =  "DELETE FROM nauczyciele WHERE nauczycielId=".$_GET['id'];
    if ($conn->query($Zapytanie) === TRUE) {
        echo "New record created successfully";
        header("location: pracownicy.php?usunieto=1");
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();

?>