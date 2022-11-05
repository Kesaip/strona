<?php 
/*session_start();
if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] != 3) {
  header("location: php.php?nie=1");
}*/
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
$Zapytanie3 =  "SELECT Email,Haslo,LoginId,hash
FROM loginy WHERE Email='".$_POST["email"]."' AND Haslo='".$_POST["kod"]."'";

$Update = "UPDATE loginy SET potwierdzone='T' WHERE Email='".$_POST["email"]."' AND Haslo='".$_POST["kod"]."'";
if ($conn->query($Update) === TRUE) {
    echo "New record created successfully";
} else {
    header("location: php.php?zlykod=1");
}
$mail = "SELECT Email FROM loginy WHERE potwierdzone = 'T' AND Email = '".$_POST['email']."'";
$email = mysqli_query($conn, $mail);
if (mysqli_num_rows($email) == 0) {
  header("location: php.php?nie=1");
} else {
$log = "SELECT Email FROM Uzytkownicy WHERE Email = '".$_POST['email']."'";
$login = mysqli_query($conn, $log);
if (mysqli_num_rows($login) != 0) {
  header("location: php.php?zajety=1");
} else {
  $Imie = str_replace(" ",'',$_POST['imie']);
  $Login = str_replace(" ",'',$_POST['email']);
$password = $_POST['haslo'];
  // $a = strpos($_POST['haslo'], " ");
  // print($a);
  if (strpos($_POST['haslo'], " ")) {
    header("location: php.php?haslo=1");
  } else { 
      if (!preg_match("/^[a-zA-Z]+$/",$_POST['nazwisko'])) {
        header("location: php.php?zlenazwisko=1");
      } else {
      if (!preg_match("/^[a-zA-Z]+$/",$Imie)) {
        header("location: php.php?zleimie=1");
      } else {
        if (!filter_var($Login, FILTER_VALIDATE_EMAIL)) {
            header("location: php.php?zlyemail=1");
        } else {      
      if ($_POST["haslo"] == $_POST["haslo2"]) {
          $Zapytanie =  "INSERT INTO Uzytkownicy (Imie,Nazwisko,Email,Haslo,DataDolaczenia) VALUES ('".$Imie."','".$_POST["nazwisko"]."','".$Login."','".$password."','".$data."')";
          

          $Zapytanie2 =  "SELECT Nazwisko,Imie,OsobaId
          FROM Uzytkownicy WHERE Email='".$_POST["login"]."' AND Haslo='".$_POST["haslo"]."'";
          $result = mysqli_query($conn, $Zapytanie2);
          $row = mysqli_fetch_assoc($result);
          $_SESSION['Id'] = $row['OsobaId'];
          $_SESSION['zalogowany'] = 2;
          $_SESSION['time']     = time()+600;
      if ($conn->query($Zapytanie) === TRUE) {
          echo "New record created successfully";
          header("location: php.php?dodano=2");
        } else {
          echo "Error: " . $conn->error;
        }
        
        $conn->close();
      } else {
        header('location: php.php?haslo=1');
          // header("location:'" .$_SERVER["HTTP_REFERER"]."'");
    }
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