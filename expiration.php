<?php

ini_set( 'display_errors', 'On' ); 
error_reporting( E_ALL );

$conn = new mysqli ("127.0.0.1", "oskar", "zaq1@WSX", "domex");
$data=date("Y-m-d");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
$usuwanie = "DELETE FROM loginy WHERE DataDolaczenia <'" . $data."'";
if ($conn->query($usuwanie) === TRUE) {
echo '';
  } else {
    echo "";
  }
$conn->close();
?>
