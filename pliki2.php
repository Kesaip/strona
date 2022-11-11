<?php

session_start();
ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );

if (!isset($_SESSION['zalogowany']) or $_SESSION['zalogowany'] != 1 AND ($_SESSION['zalogowany'] < 30 or $_SESSION['zalogowany'] > 40) AND ($_SESSION['zalogowany'] < 300 or $_SESSION['zalogowany'] > 400)) {
    header("location: php.php?nie=1");
}
require_once('naglowek.php');
require_once('funkcje/link.php');
link1($_GET);
?>
<center>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="formFileMultiple" class="form-label">Wrzutka</label>
        <input class="form-control form-control-lg" name="fileToUpload" type="file" id="fileToUpload"/>
        <input type="submit" class="btn btn-primary" style="margin: 10px" value="Udostępnij" name="submit">
    </form>
    <p style="padding: 5px">Pliki do pobrania</p>
</center>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nazwa</th>
        <th scope="col">Plik</th>
    </tr>
    <?php
    $katalog="/Users/oskar/Desktop/stronyglowne/uploads";//"/var/www/domex/uploads";
    $helena = 0;


    if ($handle = opendir($katalog)) {
        $files = array();
        while ($files[] = readdir($handle));
        sort($files);
        closedir($handle);
    }
    $blacklist = array('.','..','somedir','somefile.php','');
    foreach ($files as $file) {
        // var_dump($file);
        if (!in_array($file, $blacklist)) {
            $helena++;
            echo '<tr><td>'.$helena.'</td><td>'.$file.'</td>
        <td>
        <a href="../uploads/'.$file.'" download>
        <img src="../uploads/'.$file.'" style="width: 50px;">
        </a>
        </td>
        </tr>';
        }
    }
    ?>
</table>
<?php
require_once('stopka.php');
?>
</body>
</html>