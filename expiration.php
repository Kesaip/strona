<?php

ini_set( 'display_errors', 'On' ); 
error_reporting( E_ALL );

require_once('funkcje/bazadanych.php');
$conn = polaczenieBaza();
$data=date("Y-m-d");
$usuwanie = "DELETE FROM loginy WHERE DataDolaczenia <'" . $data."'";
if ($conn->query($usuwanie) === TRUE) {
echo '';
  } else {
    echo "";
  }
ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );
$data=date("Y-m-d");
$usuwanie = "DELETE FROM loginytmp WHERE dataProsby <'" . $data."'";
if ($conn->query($usuwanie) === TRUE) {
  echo '';
} else {
  echo "";
}
$conn->close();
?>
