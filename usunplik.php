<?php

    session_start();
    ini_set( 'display_errors', 'On' ); 
    error_reporting( E_ALL );

    if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] != 1) {
      header("location: /?nie=1");
    } else {
        if (file_exists("/Users/oskar/Desktop/stronyglowne/uploads/"/*"/var/www/domex/uploads"*/.$_GET['name'])) {
            unlink("/Users/oskar/Desktop/stronyglowne/uploads/"/*"/var/www/domex/uploads/"*/.$_GET['nazwa']);
            header("location: plikiadm.php?usunieto=1");
        } else {
            header("location: plikiadm.php?niema=2");
        }
    }
?>