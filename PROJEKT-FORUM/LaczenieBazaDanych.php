<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "forum";

if (!mysqli_connect($servername, $username, $password, $dbname)) {
    echo "BŁĄD POŁĄCZENIA DO BAZY DANYCH";
}

$mydb = mysqli_connect($servername, $username, $password, $dbname);
$_SESSION["mydb"] = $mydb;

?>