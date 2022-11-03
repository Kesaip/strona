
<?php
  session_start();
  ini_set( 'display_errors', 'On' ); 
error_reporting( E_ALL );

  if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] != 1) {
      header("location: php.php?nie=1");
  }
$target_dir = "/var/www/domex/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
  header("location: plikiadm.php?istnieje=1");
  $uploadOk = 0;
} 

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    header("location: plikiadm.php?udane=1");
  } else {
    header("location: plikiadm.php");
    print_r($_FILES);
  }
}
?>
