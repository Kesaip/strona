<?php
session_start();
$_SESSION['zalogowany'] = 0;
header("Location: ".$_SERVER['HTTP_REFERER']);
?>