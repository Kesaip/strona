<?php 
session_start();
$strona = $_SERVER['HTTP_HOST'];
$adres = str_replace("registerprocess1.php", "weryfikacja.php", $_SERVER['PHP_SELF']);
ini_set( 'display_errors', 'On' ); 
error_reporting( E_ALL );

$conn = new mysqli ("127.0.0.1", "oskar", "zaq1@WSX", "domex");
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
$data=date("Y-m-d");
$log = "SELECT Email FROM Uzytkownicy WHERE Email = '".$_POST['email']."'";
$login = mysqli_query($conn, $log);
$Login = str_replace(" ",'',$_POST['email']);
$hash = md5( rand(0,1000) );
if (mysqli_num_rows($login) != 0) {
  header("location: php.php?zajety=1");
} else {
  if (!filter_var($Login, FILTER_VALIDATE_EMAIL)) {
    header("location: php.php?zlyemail=1");
} else {
  
$password = rand(1000,99999999);
          $Zapytanie =  "INSERT INTO loginy (Email,Haslo,DataDolaczenia,hash) VALUES ('".$Login."','".$password."','".$data."','".$hash."')";

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
          
  
                          Dziękujemy za zarejestrowaniu konta na naszej stronie! <br>
          Twoje konto zostało stworzone, za pomocą poniższych danych możesz zweryfikować konto. <br>
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
          header("location: php.php?dodano=1");
        } else {
          echo "Error: " . $conn->error;
        }
        
        $conn->close();
      }
    }
//   }
//   }
//   }
//   }
// } 
  




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