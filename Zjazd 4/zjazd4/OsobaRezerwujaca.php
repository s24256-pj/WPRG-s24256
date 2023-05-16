<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>

<fieldset>
    <legend> REZERWACJA HOTELU </legend>
    <form method="post" action="OsobyTowarzyszace.php">
        DANE OSOBY REZERWUJĄCEJ POBYT:<br>
        <label for="imie">Imię:</label>
        <input type="text" id="imie" name="imie" required>
        <br>
        <label for="nazwisko">Nazwisko:</label>
        <input type="text" id="nazwisko" name="nazwisko" required>
        <br>
        <label for="adres">Adres:</label>
        <input type="text" id="adres" name="adres" required>
        <br>
        <label for="karta">Numer karty kredytowej:</label>
        <input type="text" id="karta" name="karta" pattern="[0-9]{16}" required>
        <br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <br>

        DANE POBYTU:<br>

        Wybierz ilość osób, których dotyczy rezerwacja: <select name="ilosc_osob" id="ilosc_osob">
        <option value="wybierz ilosc">-WYBIERZ ILOSC-</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select><br>

        <label for="data_przyjazdu">Dzień przyjazdu:</label>
        <input type="date" id="data_przyjazdu" name="data_przyjazdu" required>
        <br>
        <label for="data_wyjazdu">Dzień wyjazdu:</label>
        <input type="date" id="data_wyjazdu" name="data_wyjazdu" required>
        <br>

        <label for="godzina_przyjazdu">Godzina przyjazdu:</label>
        <input type="time" id="godzina_przyjazdu" name="godzina_przyjazdu" required>
        <br>
        <label for="udogodnienia">Udogodnienia:</label>
        <br><input type="checkbox" name="udogodnienia[]" value="lożkiem dla dziecka">Łóżko dla dziecka
        <br><input type="checkbox" name="udogodnienia[]" value="klimatyzacją">Klimatyzacja
        <br><input type="checkbox" name="udogodnienia[]" value="popielniczką dla palacza">Popielniczka dla palacza
        <br><input type="checkbox" name="udogodnienia[]" value="widokiem">Pokój z widokiem
        <br><input type="checkbox" name="udogodnienia[]" value="balkonem">Balkon
        <br><input type="checkbox" name="udogodnienia[]" value="mikrofalą">Mikrofala
        <br>


        <br>
        <br>
        <input type="submit" value="WYŚLIJ" name="submit" id="submit">
    </form>
</fieldset>
</body>

</html>



