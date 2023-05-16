<?php
session_start();

if(isset($_POST['imie'])) {
    $_SESSION['imie'] = $_POST["imie"];
}
if(isset($_POST['nazwisko'])) {
    $_SESSION['nazwisko'] = $_POST["nazwisko"];
}

if(isset($_POST['adres'])) {
    $_SESSION['adres'] = $_POST["adres"];
}

if(isset($_POST['karta'])) {
    $_SESSION['karta'] = $_POST["karta"];
}

if(isset($_POST['email'])) {
    $_SESSION['email'] = $_POST["email"];
}

if(isset($_POST['data_przyjazdu'])) {
    $_SESSION['data_przyjazdu'] = $_POST["data_przyjazdu"];
}

if(isset($_POST['data_wyjazdu'])) {
    $_SESSION['data_wyjazdu'] = $_POST["data_wyjazdu"];
}

if(isset($_POST['ilosc_osob'])) {
    $_SESSION['ilosc_osob'] = $_POST['ilosc_osob'];
}

if(isset($_POST['godzina_przyjazdu'])) {
    $_SESSION['godzina_przyjazdu'] = $_POST["godzina_przyjazdu"];
}

if(isset($_POST['udogodnienia'])) {
    $_SESSION['udogodnienia'] = $_POST["udogodnienia"];
}

for ($i = 1; $i <= $_SESSION['ilosc_osob']-1; $i++) {
    if(isset($_POST['imie'[$i]]) && isset($_POST['nazwisko'.$i]) && isset($_POST['email'.$i])){
        $_SESSION['imie'.$i] = $_POST['imie'.$i];
        $_SESSION['nazwisko'.$i] = $_POST['nazwisko'.$i];
        $_SESSION['email'.$i] = $_POST['email'.$i];
    }
}

$imiona = array();
$nazwiska = array();
$emaile = array();
for ($i = 1; $i <= $_SESSION['ilosc_osob']-1; $i++) {
    $emaile[$i] = $_SESSION['email'.$i];
    $nazwiska[$i] = $_SESSION['nazwisko'.$i];
    $imiona[$i] = $_SESSION['imie'.$i];
}

$imie = $_SESSION['imie'];
$nazwisko = $_SESSION['nazwisko'];
$adres=$_SESSION['adres'];
$karta = $_SESSION['karta'];
$email = $_SESSION['email'];
$data_przyjazdu = $_SESSION['data_przyjazdu'];
$data_wyjazdu = $_SESSION['data_wyjazdu'];
$ilosc_osob = $_SESSION['ilosc_osob'];
$godzina_przyjazdu=$_SESSION['godzina_przyjazdu'];
$udogodnienia = $_SESSION['udogodnienia'];

    if($ilosc_osob==1){
        ?>
        <form method="post" action="Podsumowanie.php">
            <input type="submit" value="PRZEJDZ DO PODSUMOWANIA">
        </form>
        <?php
    }
    ?>
        <!DOCTYPE html>
        <html lang="pl">
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
        <form method=post action="Podsumowanie.php">
            <fieldset>
        <?php
        for($i=1; $i<=$ilosc_osob-1; $i++) {
        ?>

            <legend> DANE OSOBY <?php echo $i; ?> </legend>
            <label for="imie<?php echo $i; ?>">Imię:</label>
            <input type="text" id="imie<?php echo $i; ?>" name="imie<?php echo $i; ?>" required>
            <br>
            <label for="nazwisko<?php echo $i; ?>">Nazwisko:</label>
            <input type="text" id="nazwisko<?php echo $i; ?>" name="nazwisko<?php echo $i; ?>" required>
            <br>
            <label for="email<?php echo $i; ?>">E-mail:</label>
            <input type="email" id="email<?php echo $i; ?>" name="email<?php echo $i; ?>" required>
            <br>

        <?php
        }
        ?>
        <br>
        <input type="submit" value="WYŚLIJ">
            </fieldset>
        </form>
        </body>
        </html>


