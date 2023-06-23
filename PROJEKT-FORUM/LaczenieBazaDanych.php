<?php

$servername = "szuflandia.pjwstk.edu.pl";
$username = "s24256";
$password = "Mar.Szpi";
$dbname = "s24256";

if (!mysqli_connect($servername, $username, $password, $dbname)) {
    echo "BŁĄD POŁĄCZENIA DO BAZY DANYCH";
}

$mydb = mysqli_connect($servername, $username, $password, $dbname);
$_SESSION["mydb"] = $mydb;

?>
