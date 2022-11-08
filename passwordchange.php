<?php
session_start();
$strona = $_SERVER['HTTP_HOST'];
$adres = str_replace("passwordchange.php", "zmianahasla.php", $_SERVER['PHP_SELF']);
ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );

require_once('funkcje/bazadanych.php');
$conn = polaczenieBaza();
$data=date("Y-m-d");
$duzo = "SELECT Email FROM loginytmp WHERE Email = '".$_POST['email']."'";
$konta = mysqli_query($conn, $duzo);
if (mysqli_num_rows($konta) > 3){
    header("location: php.php?duzo=1");
    die;
}
$log = "SELECT Email FROM Uzytkownicy WHERE Email = '".$_POST['email']."'";
$login = mysqli_query($conn, $log);
$Login = str_replace(" ",'',$_POST['email']);
$hash = md5(rand(0,1000));
if (mysqli_num_rows($login) == 0) {
    header("location: php.php?niema");
} else {
    if (!filter_var($Login, FILTER_VALIDATE_EMAIL)) {
        header("location: php.php?zlyemail=1");
    } else {

        $password = rand(1000,99999999);
        $Zapytanie =  "INSERT INTO loginytmp (Email,Haslo,hash,dataProsby) VALUES ('".$Login."','".$password."','".$hash."','".$data."')";

        require_once('phpmailer/PHPMailerAutoload.php'); # patch where is PHPMailer / ścieżka do PHPMailera

        $mail = new PHPMailer;
        $mail->CharSet = "UTF-8";

        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com'; # Gmail SMTP host
        $mail->Port = 465; # Gmail SMTP port
        $mail->SMTPAuth = true; # Enable SMTP authentication / Autoryzacja SMTP
        $mail->Username = "tanieogorki@gmail.com"; # Gmail username (e-mail) / Nazwa użytkownika
        $mail->Password = "bohtppzgpqiqxhbo"; # Gmail password / Hasło użytkownika
        $mail->SMTPSecure = 'ssl';

        #$mail->From = ''; # REM: Gmail put Your e-mail here
        $mail->FromName = 'Tanie Ogórki'; # Sender name
        $mail->AddAddress($Login, 'Name'); # # Recipient (e-mail address + name) / Odbiorca (adres e-mail i nazwa)

        $mail->IsHTML(true); # Email @ HTML

        $mail->Subject = 'E-mail subject / Tytuł wiadomości';
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $wiadomosc =  '
          
  
         Poprosiłeś o zmianę hasła na naszej stronie, jeśli to nie byłeś ty zignoruj tego maila.  <br>
           Lecz jeśli to jest twoja prośba to wejdź w podany link i wpisz poniższe informacje. <br>
<br>
          ------------------------------------------------------------------------------------- <br>
                                          Email: '.$Login.' <br>
                                          Kod: '.$password.' <br>
          ------------------------------------------------------------------------------------- <br>
  <br>
                            Kliknij w link aby przejść na naszą stronę: <br>
                http://'.$strona.$adres.'?hash='.$hash.'<br>
  
';

        $mail->Body = $wiadomosc;
        $mail->AltBody = $wiadomosc;

        if(!$mail->Send()) {
            echo 'Some error... / Jakiś błąd...';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
        }

        if ($conn->query($Zapytanie) === TRUE) {
            echo "New record created successfully";
            header("location: php.php?dodano=3");
        } else {
            echo "Error: " . $conn->error;
        }

        $conn->close();
    }
}
?>