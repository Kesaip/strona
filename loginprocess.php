<?php 
    session_start();
    ini_set( 'display_errors', 'On' ); 
    error_reporting( E_ALL );
    $conn = new mysqli ("127.0.0.1", "oskar", "zaq1@WSX", "domex");
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    $Zapytanie =  "SELECT Nazwisko,Imie,OsobaId
    FROM Uzytkownicy WHERE Email='".$_POST["login"]."' AND Haslo='".$_POST["haslo"]."'";
    $result = mysqli_query($conn, $Zapytanie);
    $row = mysqli_fetch_assoc($result);
    if ($row == null) {
        $_SESSION['zalogowany'] = 0;
        $Zapytanie =  "SELECT Nazwisko,Imie,PracownikId
        FROM Pracownicy WHERE Login='".$_POST["login"]."' AND Haslo='".$_POST["haslo"]."'";
        $result = mysqli_query($conn, $Zapytanie);
        $row = mysqli_fetch_assoc($result);
        if ($row == null) {
            $_SESSION['zalogowany'] = 0;
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: php.php?Nieudany=1");
            exit;
        } 
        else {
            $_SESSION['Id'] = $row['PracownikId'];
            $_SESSION['zalogowany'] = 1;
            $_SESSION['time']     = time()+600;
            header("Location: pracownicy.php");
        }
        exit;
    } else {
        $_SESSION['Id'] = $row['OsobaId'];
        $_SESSION['zalogowany'] = 2;
        $_SESSION['time']     = time()+600;
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
?>