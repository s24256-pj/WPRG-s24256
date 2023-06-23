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
<form class = 'login-container' method= "POST">

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="login">Login:</label>
    <input type="text" id="login" name="login" required>
    <br>
    <label for="haslo">Hasło:</label>
    <input type="password" id="haslo" name="haslo" required><br>
    <input type="submit" value="ZAREJESTRUJ SIĘ" id="rejestracja" name="rejestracja">
    <a href='StronaGlowna.php'>Przejdz do strony głównej</a>
</form>
</body>
</html>

<?php

if(isset($_POST["rejestracja"])){
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    $email = $_POST["email"];

    $query = "SELECT COUNT(*) as count FROM uzytkownik WHERE login = '$login'";
    $query1 = "SELECT COUNT(*) as count FROM uzytkownik WHERE email = '$email'";
    $result = mysqli_query($mydb, $query);
    $result1 = mysqli_query($mydb, $query1);
    $row = mysqli_fetch_assoc($result);
    $row1 = mysqli_fetch_assoc($result1);

    if($row['count'] > 0){
        echo "LOGIN JEST JUŻ ZAJĘTY - WYBIERZ INNY";
    }
    else if($row1['count'] > 0){
        echo "KONTO NA PODANY ADRES E-MAIL JUZ ISTNIEJE SPRÓBUJ SIĘ ZALOGOWAĆ LUB WYBIERZ INNY E-MAIL";
        ?>
        <!DOCTYPE html>
        <html lang="pl" >
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="StronaGlowna.css">
        </head>
        <body>
        <form class = 'login-container' method= "POST" action="Logowanie.php">
            <input type="submit" value="PRZEJDZ DO LOGOWANIA">
        </form>
        </body>
        </html>
    <?php
}
    else if($row['count'] == 0 && $row1['count'] == 0){
        $_SESSION["login"] = $login;
        $sql = "INSERT INTO uzytkownik (login,haslo,email) VALUES('$login','$haslo','$email')";
        $sql1 = "UPDATE uzytkownik SET zalogowany = '1' WHERE login = '$login'";

        if (mysqli_query($mydb, $sql) && mysqli_query($mydb, $sql1)) {
            ?>
            <div class="post-container">
                <div>REJESTRACJA PRZEBIEGŁA POMYŚLNIE JESTEŚ ZALOGOWANY</div>
                <div>Witaj na naszym forum<?php echo$login?></div>
                <a href='StronaGlowna.php'>Przejdz do strony głównej</a>
            </div>
        <?php
        }
        else {
            ?>
            <div class="login-container" BŁĄD REJESTRACJI SPRÓBUJ PONOWANIE</div>
<?php
        }
    }
}
?>