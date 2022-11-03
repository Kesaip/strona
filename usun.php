<?php 
session_start();

if (!isset($_SESSION['zalogowany']) or $_SESSION['zalogowany'] != 1) {
header("location: php.php");
}

ini_set( 'display_errors', 'On' ); 
error_reporting( E_ALL );

$conn = new mysqli ("127.0.0.1", "oskar", "zaq1@WSX", "domex");
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if ($_SESSION['Id'] != $_GET['id']) {
  print($_GET["id"]);
$Zapytanie =  "DELETE FROM Pracownicy WHERE PracownikId=".$_GET['id'];
if ($conn->query($Zapytanie) === TRUE) {
  echo "New record created successfully";
  header("location: pracownicy.php?usunieto=1");
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
  } else{
    header("location: pracownicy.php?niewolno=1");

}


?>