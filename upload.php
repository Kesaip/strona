
<?php
  session_start();
  ini_set( 'display_errors', 'On' ); 
error_reporting( E_ALL );

if (!isset($_SESSION['zalogowany']) or $_SESSION['zalogowany'] != 1 AND ($_SESSION['zalogowany'] < 300 or $_SESSION['zalogowany'] > 500) AND $_SESSION['zalogowany'] != 40) {
      header("location: /?nie=1");
  }
$target_dir = "/Users/oskar/Desktop/stronyglowne/uploads/";//"/var/www/domex/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    header("location: pliki2.php?obraz=1");
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  header("location: pliki2.php?istnieje=1");
  $uploadOk = 0;
} 

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    header("location: pliki2.php?duzy=1");
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    header("location: pliki2.php?nieto=1");
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    header("location: pliki2.php?udane=1");
  } else {
    header("location: pliki2.php");
    print_r($_FILES);
  }
}
?>
