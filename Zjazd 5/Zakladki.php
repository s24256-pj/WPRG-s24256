
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>

<TABLE border="1">

    <TR>
        <td><a href="StronaGlowna.php">STRONA GŁÓWNA</a></td>
        <td><a href="WszystkieSamochody.php">WSZYSTKIE SAMOCHODY</a></td>
        <td><a href="DodajSamochod.php">DODAJ SAMOCHÓD</a></td>
    </TR>

</TABLE>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "samochody";

if (!mysqli_connect($servername, $username, $password, $dbname)) {
echo "BŁĄD POŁĄCZENIA DO BAZY DANYCH";
}

$mydb = mysqli_connect($servername, $username, $password, $dbname);
?>