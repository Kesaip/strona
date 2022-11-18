<?php
if (!isset($_SESSION)) {
    session_start();
}
  if (!isset($_SESSION['zalogowany']) or $_SESSION['zalogowany'] != 1) {
    header("location: /");
  }
    $strona = $_SERVER['PHP_SELF'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>ZSET</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styl2.css">

<script>
$(document).on("click", ".action-buttons .dropdown-menu", function(e){
	e.stopPropagation();
});
</script>
</head> 
<body>
    <div id="naglowek">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a href="/" class="navbar-brand" style="margin-left:10px;"><img src="obrazy/Lzset.png" alt="zset" width="65" height="65"></a>
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<div class="navbar-nav">
        <a class="nav-item nav-link"
        
        href="/"
        <?php
            if ($strona == "/"){
                print('class="active"');
            }
        ?>        
        >Strona Główna
    </a>

   <a class="nav-item nav-link"
        href="onas.php"
        <?php
            if ($strona == "onas.php"){
                print('class="active"');
            }
        ?>        
        >O nas
    </a>

<?php
if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1) {
    print('<div class="dropdown show">');
    print('<a class="nav-item nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrator</a>');
    print('<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">');
    print('<a class="nav-item nav-link dropdown-item" href="pracownicy.php">Pracownicy</a>');
    print('<a class="nav-item nav-link dropdown-item" href="nauczyciele.php">Nauczyciele</a>');
    print('<a class="nav-item nav-link dropdown-item" href="uczniowie.php">Uczniowie</a>');
    print('<a class="nav-item nav-link dropdown-item" href="klasy.php">Klasy</a>');
    print('<a class="nav-item nav-link dropdown-item" href="uczenie.php">Nauczanie</a>');
    print('</div>');
    print('</div>');
  }
?>
<?php
  if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1 or isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 2) {
    print('<a class="nav-item nav-link" href="pliki2.php">Pliki</a>');
  }
?>
<?php
  if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1) {
    print('<a class="nav-item nav-link" href="plikiadm.php">Pliki Administrator</a>');
  }
?>
    <a class="nav-item nav-link"
        href="kontakt.php"
        <?php
            if ($strona == "kontakt.php"){
                print('class="active"');
            }
        ?>        
        >Kontakt
    </a>		
		</div>
        <?php
     
     if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1 or isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 2) {
         print('
         <div class="navbar-nav ml-auto action-buttons">
			<div class="nav-item dropdown" style="padding: 5px;">
            <a href="logout.php"  class="btn btn-primary dropdown-toggle sign-up-btn">Wyloguj</a>
        </div>
        </div>');
     } else {
         
         print('
     
 
		<div class="navbar-nav ml-auto action-buttons">
			<div class="nav-item dropdown" style="padding: 5px;">
				<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle sign-up-btn">Zaloguj</a>
                <div class="dropdown-menu action-form">
					<form action="loginprocess.php" method="post">
						
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Username"  name="login" required="required">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password" name="haslo"  required="required">
						</div>
						<input type="submit" class="btn btn-primary btn-block" value="Zaloguj">
						<div class="text-center mt-2">
							<a href="#">Forgot Your password?</a>
						</div>
					</form>
                </div>
			</div>
			<div class="nav-item dropdown" style="padding: 5px;">
				<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle sign-up-btn">Zarejestruj</a>
                <div class="dropdown-menu action-form">
					<form action="registerprocess1.php" method="post">
						<p class="hint-text">Fill in this form to create your account!</p>
						<div class="form-group">
							<input type="text" class="form-control" name="email" placeholder="Email" required="required">
						</div>
						<div class="form-group">
							<label class="form-check-label"><input type="checkbox" required="required"> Akceptuje <a href="warunki.php">Zasady i Warunki</a></label>
						</div>
						<input type="submit" class="btn btn-primary btn-block" value="Zarejestruj">
					</form>
				</div>
			</div>
        </div>');
     }
        ?>
	</div>
</nav>
    </div>