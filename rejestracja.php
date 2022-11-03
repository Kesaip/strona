<?php 
session_start();
if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] != 3) {
    header("location: php.php?nie=1");
}
$conn = new mysqli ("127.0.0.1", "oskar", "zaq1@WSX", "domex");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
if ($_GET["zledane"] != null) {
    print("<span style='color: red'>Niepoprawne dane</span><br />");
   }
   $Zapytanie =  "SELECT Email,Haslo
   FROM loginy WHERE hash=".$_GET['hash'];
   $result = mysqli_query($conn, $Zapytanie);
   $row = mysqli_fetch_assoc($result);
   
   $mail = $row['Email'];
 
// echo "Connected successfully";


// $Zapytanie =  "SELECT Nazwisko,Imie,PracownikId
// FROM Pracownicy";

// // $result2 = mysqli_query($conn, $Zapytanie2);
// $result = mysqli_query($conn, $Zapytanie);
// $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<script>
  var check = function() {
  if (document.getElementById('haslo').value ==
    document.getElementById('haslo2').value) {
    document.getElementById('potwierdzenie').style.color = 'green';
    document.getElementById('potwierdzenie').innerHTML = 'zgodne';
    document.getElementById('reg').disabled = false;
  } else {
    document.getElementById('potwierdzenie').style.color = 'red';
    document.getElementById('potwierdzenie').innerHTML = 'nie zgodne';
    document.getElementById('reg').disabled = true;
  }
}
</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  /* width: auto; */
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  /* .cancelbtn {
     width: 100%;
  } */
}
</style>
</head>
<body>

<form action="registerprocess.php" method="post">
  <div class="imgcontainer">
    <img src="obrazy/Awatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">

  <label for="name"><b>Imię</b></label>
    <input type="text" placeholder="Wprowadź imię" name="imie" required>

    <label for="lname"><b>Nazwisko</b></label>
    <input type="text" placeholder="Wprowadź nazwisko" name="nazwisko" required>

    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Wprowadź email" name="email" value='<?php print($mail) ?>' readonly required>

    <label for="psw"><b>Hasło</b></label>
    <input type="password" placeholder="Wprowadź hasło" onkeyup='check();' id='haslo' name="haslo" required>

    <label for="psw"><b>Powtórz hasło</b></label>
    <input type="password" placeholder="Wprowadź hasło" onkeyup='check();' id='haslo2' name="haslo2" required>
    
    <span id='potwierdzenie'></span>
    </label>

    <button id='reg' type="submit">Zarejestruj</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <a href='php.php'><button type="button" class="cancelbtn">Anuluj</button>
  </div>
</form>
<div>
<p><?php ini_set( 'display_errors', 'On' ); 
      error_reporting( E_ALL );?>
      </div>
</body>
</html>