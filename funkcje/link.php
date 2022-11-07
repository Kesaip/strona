<?php
function link1(){
    if (empty($_GET)) {

    }
elseif (isset($_GET['dodano']) && $_GET['dodano']==1) {
    print('<div class="alert alert-primary  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukces!</strong> Sprawdź swój email w celu weryfikacji.
              </div>');
}
elseif (isset($_GET["dodano"]) && $_GET['dodano']==2) {
    print('<div class="alert alert-success  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukces!</strong> Pomyślnie założyłeś konto.
              </div>');
}
elseif (isset($_GET["nie"])) {
    print('<div class="alert alert-danger  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oj Oj!</strong> Nie wolno tak robić.
              </div>');
}
elseif (isset($_GET["zajety"]) && $_GET['zajety']==1) {
    print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Ten email jest już zajęty.
              </div>');
}
elseif (isset($_GET["zleimie"])) {
    print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Nie używaj znaków specjalnych oraz liczb w imieniu.
              </div>');
}
elseif (isset($_GET["zlyemail"])) {
    print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Źle wpisałeś email.
              </div>');
}
elseif (isset($_GET["Nieudany"])) {
    ?>
    <style>
        #id01 {
            display: block;
        }
    </style>
    <?php
    print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> niepoprawny login lub hasło.
              </div>');
}
    elseif (isset($_GET["zlehaslo"])) {
        print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oj!</strong> hasła nie zgadzają się.
              </div>');
    }
    elseif (isset($_GET["zajety"]) && $_GET['zajety']==2) {
        print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Ten login jest już zajęty.
              </div>');
    }
    elseif (isset($_GET["haslo"])) {
        print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oj!</strong> Nie umieszczaj spacji w haśle.
              </div>');
    }
    elseif (isset($_GET["zlenazwisko"])) {
        print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Nie używaj znaków specjalnych oraz liczb w nazwisku.
              </div>');
    }
    elseif (isset($_GET["zlylogin"])) {
        print('<div class="alert alert-warning  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>O nie!</strong> Login wpisz z małych liter oraz liczb.
              </div>');
    }
    elseif (isset($_GET["duzy"] )) {
        print('<div class="alert alert-warning  alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>O nie!</strong> Twój plik jest za duży dozwolony rozmiar to 500KB.
      </div>');
    }
    elseif (isset($_GET["nieto"])) {
        print('<div class="alert alert-warning  alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>O nie!</strong> Dozwolone pliki to jpg, jpeg, png, gif.
      </div>');
    }
    elseif (isset($_GET["obraz"])) {
        print('<div class="alert alert-danger  alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Oj Oj!</strong> Nie wolno tak robić.
      </div>');
    }
    elseif (isset($_GET["udane"])) {
        print('<div class="alert alert-success  alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sukces!</strong> Pomyślnie dodałeś plik.
      </div>');
    }
    elseif (isset($_GET["istnieje"]) && $_GET["istnieje"] != null) {
        print('<div class="alert alert-warning  alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>O nie!</strong> Plik o danej nazwie już istnieje.
      </div>');
    }
    elseif (isset($_GET["usunieto"]) && $_GET["usunieto"] != 0) {
        print('<div class="alert alert-success  alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sukces!</strong> Pomyślnie usunąłeś plik.
      </div>');
    }
    elseif (isset($_GET["usunieto"])) {
        print('<div class="alert alert-success  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukces!</strong> Pomyślnie usunięto użytkownika.
              </div>');
    }
    elseif (isset($_GET["zedytowano"])) {
        print('<div class="alert alert-success  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukces!</strong> Pomyślnie zeedytowano użytkownika.
              </div>');
    }
    elseif (isset($_GET["!zmiany"])) {
        print('<div class="alert alert-info  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukces!</strong> Nie dokonano żadnych zmian.
              </div>');
    }
    elseif (isset($_GET["niewolno"])) {
        print('<div class="alert alert-danger  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oj Oj</strong> Nie wolno usuwać samego siebie.
              </div>');
        $idiota = "Idioto";
        echo "<script type='text/javascript'>alert('$idiota');</script>";
    }
    elseif (isset($_GET["niema"]) && $_GET["niema"] != null) {
        print('<div class="alert alert-warning  alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>O nie!</strong> Ten mail nie jest zarejestrowany.
      </div>');
    }
    elseif (isset($_GET["dodano"]) && $_GET['dodano']==3) {
        print('<div class="alert alert-success  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukces!</strong> Przejdź na swoją pocztę w celu weryfikacji.
              </div>');
    }
    elseif (isset($_GET["dodano"]) && $_GET['dodano']==4) {
        print('<div class="alert alert-success  alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukces!</strong> Pomyślnie zmieniono hasło.
              </div>');
    }
}

