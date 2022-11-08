<?php
ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );
require_once('funkcje/bazadanych.php');
$conn = polaczenieBaza();
$Zapytanie3 =  "SELECT Email,Haslo,LoginId,hash
FROM loginytmp WHERE Email='".$_POST["email"]."' AND Haslo='".$_POST["kod"]."'";
$odp = mysqli_query($conn,$Zapytanie3);
if ($foundRows = mysqli_num_rows($odp)!=0) {

    $Update = "UPDATE loginytmp SET potwierdzone='T' WHERE Email='" . $_POST["email"] . "' AND Haslo='" . $_POST["kod"] . "'";

    if ($conn->query($Update) === true) {
        echo "New record created successfully";
    } else {
        header("location: php.php?zlykod=1");
    }
} else {
    header("location: php.php?zlykod=1");
    die;
}
$mail = "SELECT Email FROM loginytmp WHERE potwierdzone = 'T' AND Email = '".$_POST['email']."'";
$email = mysqli_query($conn, $mail);
if (mysqli_num_rows($email) == 0) {
    header("location: php.php?nie");
} else {
    $log = "SELECT Email FROM Uzytkownicy WHERE Email = '".$_POST['email']."'";
    $login = mysqli_query($conn, $log);
    if (mysqli_num_rows($login) == 1) {
        $Login = str_replace(" ",'',$_POST['email']);
        $password = $_POST['haslo'];
        if (strpos($_POST['haslo'], " ")) {
            header("location: php.php?haslo=1");
                } else {
                    if (!filter_var($Login, FILTER_VALIDATE_EMAIL)) {
                        header("location: php.php?zlyemail=1");
                    } else {
                        if ($_POST["haslo"] == $_POST["haslo2"]) {
                            $Zapytanie =  "UPDATE Uzytkownicy SET Haslo='".$password."' WHERE Email = '".$_POST['email']."'";

                            $Zapytanie2 =  "SELECT Nazwisko,Imie,OsobaId
          FROM Uzytkownicy WHERE Email='".$_POST["login"]."' AND Haslo='".$_POST["haslo"]."'";
                            $result = mysqli_query($conn, $Zapytanie2);
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['Id'] = $row['OsobaId'];
                            $_SESSION['zalogowany'] = 2;
                            $_SESSION['time']     = time()+600;
                            if ($conn->query($Zapytanie) === TRUE) {
                                echo "New record created successfully";
                                header("location: php.php?dodano=4");
                            } else {
                                echo "Error: " . $conn->error;
                            }

                            $conn->close();
                        } else {
                            header('location: php.php?haslo=1');
                        }
                    }
                }
            }
}
?>