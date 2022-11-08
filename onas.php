<?php 
  session_start();
?>
      <?php
        require_once('naglowek.php');
        require_once('funkcje/link.php');
        link1($_GET);
      ?>
      <div id="tresc3">
        <br>
        <p style="font-size: 50px;" class="cien">Tak </p>
        <img src="obrazy/onas.jpg" class="img-fluid rounded" alt="onas" class="onas">
      </div>
      <?php
        require_once('stopka.php');
      ?>
    </body>
  </html>
