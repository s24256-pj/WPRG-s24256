<?php
session_start();
include "LaczenieBazaDanych.php";
$mydb = $_SESSION['mydb'];
$login = $_SESSION['login'];

$sql = "SELECT * FROM uzytkownik WHERE login='$login'";
$result = mysqli_query($mydb, $sql);
$row = $result->fetch_assoc();

$email = $row['email'];
$haslo = $row['haslo'];
$imie = $row['imie'];
$nazwisko = $row['nazwisko'];
$id = $row['id'];

$dlugosc=mb_strlen($haslo,'UTF-8');
$gwiazdki = str_repeat('*',$dlugosc);

?>
<!DOCTYPE html>
<html lang="pl" >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="StronaGlowna.css">
</head>
<body>
<form class = 'login-container' method= "POST">
    <h2>EDYTUJ PROFIL</h2>
    <p>E-MAIL: <?php echo $email?></p>
    <p>LOGIN: <?php echo $login?></p>
    <p>HASŁO: <?php echo $gwiazdki ?></p>
    <p>IMIE: <?php echo $imie ?></p>
    <p>NAZWISKO: <?php echo $nazwisko ?></p>
    <input type="submit" value="ZMIEŃ" id="zmien" name="zmien">
    <a href='StronaGlowna.php'>Przejdz do strony głównej</a>
</form>
</body>
</html>

<?php

if(isset($_POST["zmien"])){
?>
<!DOCTYPE html>
<html lang="pl" >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="StronaGlowna.css">
</head>
<body>
<form class = 'login-container' method= "POST">
    <h2>EDYTUJ PROFIL</h2>
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?php echo $email?>" required>
    <br>
    <label for="login">Login:</label>
    <input type="text" id="login" name="login" value="<?php echo $login?>"required>
    <br>
    <label for="haslo">Hasło:</label>
    <input type="password" id="haslo" name="haslo" value="<?php echo $haslo ?>"required><br>
    <label for="imie">Imie:</label>
    <input type="text" id="imie" name="imie" value="<?php echo $imie ?>"required><br>
    <label for="nazwisko">Nazwisko:</label>
    <input type="text" id="nazwisko" name="nazwisko" value="<?php echo $nazwisko ?>"required><br>
    <input type="submit" value="ZAPISZ DANE" id="zapisz" name="zapisz">
    </form>
    <a href='StronaGlowna.php'>Przejdz do strony głównej</a>
</body>
</html>
<?php
}
if(isset($_POST['zapisz'])){
    if(isset($_POST['login'])) {
        $login = $_POST["login"];
    }
    if(isset($_POST['haslo'])) {
        $haslo = $_POST["haslo"];
    }
    if(isset($_POST['email'])) {
        $email = $_POST["email"];
    }
    if(isset($_POST['imie'])){
        $imie = $_POST['imie'];
    }
    if(isset($_POST['nazwisko'])){
        $nazwisko = $_POST['nazwisko'];
    }

    $sql1 = "UPDATE uzytkownik SET email = '$email',imie='$imie',nazwisko='$nazwisko',login='$login',haslo='$haslo' WHERE id = '$id'";
    $result1 = mysqli_query($mydb, $sql1);
    $row1 = $result->fetch_assoc();

    if($result1){
        echo "DANE ZOSTAŁY ZMIENIONE";
    }
}
    ?>

