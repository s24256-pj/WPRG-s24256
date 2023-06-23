<?php

include "Naglowek.php";

$mydb = $_SESSION['mydb'];
if(isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
}
function postydzial($dzial){
    $sql = "SELECT * FROM post where dzial = '$dzial' ORDER BY data_dodania DESC LIMIT 1";
    $mydb = $_SESSION['mydb'];

    $result = $mydb->query($sql);
    while ($row = $result->fetch_assoc()) {
        ?>
        <!DOCTYPE html>
        <html lang="pl">
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
        <div class="post-container">
            <h2><span class="szare">DZIAŁ:</span><?php echo $row["dzial"]; ?></h2>
            <p class="daty" ><span class="szare">Data dodania:<?php echo $row["data_dodania"]; ?></p>
            <p class="tytul"> Tytuł:<span class="szare"><?php echo $row["tytul"]; ?></span></p>
            <p class="tresc"> Treść:<span class="szare"><br><?php echo $row["tresc"]; ?></span><br></p>
        <form method="post" >
            <input type="hidden" name="wybranydzial" value="<?php echo $row["dzial"]; ?>">
            <input type="submit" value="ZOBACZ WSZYSTKIE POSTY Z DANEGO DZIAŁU" id="wszystkie" name="wszystkie">
        </form>
        </div>
        </body>
        </html>
        <?php
    }
}

if(isset($_POST['wybranydzial'])) {
    $_SESSION['wybranydzial'] = $_POST['wybranydzial'];
    header('Location:DzialWszystkie.php');
}

postydzial('gry');
postydzial('film');
postydzial('spolecznosci');
postydzial('technologia');
postydzial('praca');
postydzial('zwierzeta');
postydzial('inne');

?>
