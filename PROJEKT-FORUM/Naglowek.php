<?php

session_start();

$servername = "szuflandia.pjwstk.edu.pl";
$username = "s24256";
$password = "Mar.Szpi";
$dbname = "s24256";

if (!mysqli_connect($servername, $username, $password, $dbname)) {
    echo "BŁĄD POŁĄCZENIA DO BAZY DANYCH";
}

$mydb = mysqli_connect($servername, $username, $password, $dbname);
$_SESSION["mydb"] = $mydb;

if(isset($_SESSION["login"])) {
    $login = $_SESSION["login"];
    $sql1 = "SELECT zalogowany FROM uzytkownik WHERE login = '$login'";
    $result = mysqli_query($mydb, $sql1);
    $row = $result->fetch_assoc();
    $zalogowany = $row['zalogowany'];

    if($zalogowany == 1) {
        ?>
        <!DOCTYPE html>
        <html lang="pl" xmlns="http://www.w3.org/1999/html">
        <head>
            <link rel="stylesheet" href="StronaGlowna.css">
            <meta charset="UTF-8">
        </head>
        <body>
        <header>
            <div>
            <div class="left">
                <p>Witaj, <?php echo $login; ?>!</p>
                <form action="Wyloguj.php">
                    <input type="submit" value="WYLOGUJ SIĘ" id="wyloguj" name="wyloguj">
                </form>
            </div>
            <div class="right">
            <form action="DodajPost.php">
                <input type="submit" value="DODAJ POST" id="dodajpost" name="dodajpost">
            </form>
                <form action="EdytujProfil.php">
                    <br>
                    <input type="submit" value="EDYTUJ PROFIL" id="edytuj" name="edytuj">
                </form>
            </div>
            </div>
        </header>
        </body>
        </html>
        <?php
    }
    else{
        ?>
        <!DOCTYPE html>
        <html lang="pl">
        <head>
            <link rel="stylesheet" href="StronaGlowna.css">
            <meta charset="UTF-8">
        </head>
        <body>
        <header>
            <form action="Logowanie.php">
        <input type="submit" value="ZALOGUJ SIĘ">
        <a class="rejestracja" href="Rejestracja.php">lub ZAREJESTRUJ SIĘ</a>
            </form>
        </header>
        </body>
        </html>
        <?php
    }
}

else {
    ?>
    <!DOCTYPE html>
    <html lang="pl">
    <head>
        <link rel="stylesheet" href="StronaGlowna.css">
        <meta charset="UTF-8">
    </head>
    <body>
    <header>
        <form action="Logowanie.php">
            <input type="submit" value="ZALOGUJ SIĘ">
            <a class="rejestracja" href="Rejestracja.php">lub ZAREJESTRUJ SIĘ</a>
        </form>
    </header>
    </body>
    </html>
    <?php
}
?>
