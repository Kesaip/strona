<footer class="bg-dark text-center text-white">
  <div class="container p-4 pb-0">
    <section class="mb-4">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
    <a class="text-white" href="php.php">Oskar'sSite.pl</a>
  </div>
</footer>
<div id="debug">
    <p type="hidden">
    <?php
        require_once('expiration.php');
        ini_set( 'display_errors', 'On' ); 
        error_reporting( E_ALL );
    ?>
</div>