<?php
session_start();

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

echo '<br><br><div style="font-size: 20px;">PODSUMOWANIE REZERWACJI</div>';
echo '<br><div style="font-size: 18px;">DANE OSOBY REZERWUJĄCEJ</div>';
echo "Imię: ".$imie."<br>";
echo "Nazwisko: ".$nazwisko."<br>";
echo "Adres: ".$adres."<br>";
echo "Numer karty kredytowej: ".$karta."<br>";
echo "Adres e-mail: ".$email."<br>";

$osoby_towarzyszace = $ilosc_osob -1;

for ($i = 1; $i <= $osoby_towarzyszace; $i++) {
    if(isset($_POST['imie'.$i]) && isset($_POST['nazwisko'.$i]) && isset($_POST['email'.$i])){
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

echo '<br><div style="font-size: 18px;">DANE OSÓB TOWARZYSZĄCYCH:</div>';
for($i=1; $i<=$osoby_towarzyszace; $i++) {

    echo "<br>Dane $i osoby:<br>";
    echo "Imię: ".$imiona[$i]."<br>";
    echo "Nazwisko: ".$nazwiska[$i]."<br>";
    echo "Adres e-mail: ".$emaile[$i]."<br>";
}

echo '<br><div style="font-size: 18px;">DANE POBYTU:</div>';
echo "Ilość osób, których dotyczy rezerwacja: ".$ilosc_osob."<br>";
echo "Dzień przyjazdu: ".$data_przyjazdu."<br>";
echo "Godzina przyjazdu: ".$godzina_przyjazdu."<br>";
echo "Dzień wyjazdu: ".$data_przyjazdu."<br>";

echo "<br>WYBRANE UDOGODNIENIA: <br> POKÓJ Z:<br>";
for ($i=0;$i<count($udogodnienia);$i++) {
echo $udogodnienia[$i];
echo "<br>";
}

?>
