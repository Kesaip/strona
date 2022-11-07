<?php 
session_start();

if (!isset($_SESSION['zalogowany']) or $_SESSION['zalogowany'] != 1) {
header("location: php.php");
}

ini_set( 'display_errors', 'On' ); 
error_reporting( E_ALL );
// print("Imie: " . $_POST["Imie"]."<br>");

// print("Nazwisko: " . $_POST["Nazwisko"]."<br>");

// print("Login: " . $_POST["Login"]."<br>");

// print("haslo: " . $_POST["haslo"]."<br>");

// print("haslo2: " . $_POST["haslo2"]."<br>");

$data=date("Y-m-d");


// PRINT($data);

require_once('funkcje/bazadanych.php');
$conn = polaczenieBaza();
$log = "SELECT Login FROM Pracownicy WHERE Login = '".$_POST['login']."'";
$login = mysqli_query($conn, $log);
if (mysqli_num_rows($login) != 0) {
  header("location: dodaj.php?zajety=2");
} else {
  $Imie = str_replace(" ",'',$_POST['Imie']);
  $Login = str_replace(" ",'',$_POST['login']);

  // $a = strpos($_POST['haslo'], " ");
  // print($a);
  if (strpos($_POST['haslo'], " ")) {
    header("location: dodaj.php?haslo=1");
  } else { 
      if (!preg_match("/^[a-zA-Z]+$/",$_POST['Nazwisko'])) {
        header("location: dodaj.php?zlenazwisko=1");
      } else {
      if (!preg_match("/^[a-zA-Z]+$/",$Imie)) {
        header("location: dodaj.php?zleimie=1");
      } else {
      if (!preg_match("/^[a-z0-9]*$/",$Login)) {
        header("location: dodaj.php?zlylogin=1");
      } else {
      if ($_POST["haslo"] == $_POST["haslo2"]) {
          $Zapytanie =  "INSERT INTO Pracownicy (Imie,Nazwisko,Login,Haslo,RozpoczeciePracy) VALUES ('".$Imie."','".$_POST["Nazwisko"]."','".$Login."','".$_POST["haslo"]."','".$data."')";


      if ($conn->query($Zapytanie) === TRUE) {
          echo "New record created successfully";
          header("location: pracownicy.php?dodano=2");
        } else {
          echo "Error: " . $conn->error;
        }
        
        $conn->close();
      } else {
          header("location: dodaj.php?zlehaslo=1");
    }
  }
  }
  }
  }
} 
  




// if ($row == null) {
//     $_SESSION['zalogowany'] = 0;
//     header("HTTP/1.1 301 Moved Permanently");
// header("Location: php.php?Nieudany=1");
// exit;
// } 
// else {
//     setcookie("Ciastko","10");
//     setcookie('oddano_glos', '1');
// setcookie('oddano_glos', '1', time()+3600);

?>