<?php
session_start();
include "LaczenieBazaDanych.php";

$mydb = $_SESSION['mydb'];

?>
<!DOCTYPE html>
<html lang="pl" >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="StronaGlowna.css">
</head>
<body>
<form class = "login-container" method= "POST">
    <label for="login">Login:</label>
    <input type="text" id="login" name="login" required>
    <br>
    <label for="haslo">Hasło:</label>
    <input type="password" id="haslo" name="haslo" required><br>
    <input type="submit" value="ZALOGUJ SIĘ" id="logowanie" name="logowanie">
    <a href='StronaGlowna.php'>Przejdz do strony głównej</a>
</form>
</body>
</html>
<?php

if(isset($_POST["logowanie"])){
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];

    $sql1 = "UPDATE uzytkownik SET zalogowany = '1' WHERE login = '$login'";
    $sql = "SELECT * FROM uzytkownik WHERE login = '$login'";
    $result = mysqli_query($mydb, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $haslobd = $row['haslo'];

        if ($haslo == $haslobd) {
            if (mysqli_query($mydb, $sql) && mysqli_query($mydb, $sql1)) {
                $_SESSION["login"] = $login;
                echo "LOGOWANIE PRZEBIEGŁ0 POMYŚLNIE JESTEŚ ZALOGOWANY<br>";
                echo "Witaj na naszym forum " . $login;
                echo "<a href='StronaGlowna.php'>Przejdz do strony głównej</a>";
            }
        }
        else{
            echo"HASŁO JEST NIEPRAWIDŁOWE - SPRÓBUJ PONOWNIE";
        }
    }
    else{
        echo"HASLO LUB LOGIN JEST NIEPOPRAWNE";
    }
}


?>
