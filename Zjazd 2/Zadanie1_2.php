<!DOCTYPE html>
<html>

<body>

<form method="get" action="">
<fieldset>
<legend> REZERWACJA HOTELU </legend>
<br>DANE OSOBY REZERWUJĄCEJ POBYT:
 <br>
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

      <label for="data_pobytu">Dzień przyjazdu:</label>
      <input type="date" id="data_przyjazdu" name="data_przyjazdu" required>
      <br>
      <label for="data_pobytu">Dzień wyjazdu:</label>
      <input type="date" id="data_wyjazdu" name="data_wyjazdu" required>
      <br> 

      <label for="godzina_przyjazdu">Godzina przyjazdu:</label>
      <input type="time" id="godzina_przyjazdu" name="godzina_przyjazdu" required>
      <br>
      <label for="udogodnienia">Udogodnienia:</label>
      <br><input type="checkbox" name="udogodnienia[]" value="lożkiem dla dziecka">Łóżko dla dziecka</option>
      <br><input type="checkbox" name="udogodnienia[]" value="klimatyzacją">Klimatyzacja</option>
      <br><input type="checkbox" name="udogodnienia[]" value="popielniczką dla palacza">Popielniczka dla palacza</option>
      <br><input type="checkbox" name="udogodnienia[]" value="widokiem">Pokój z widokiem</option>
      <br><input type="checkbox" name="udogodnienia[]" value="balkonem">Balkon</option>
      <br><input type="checkbox" name="udogodnienia[]" value="mikrofalą">Mikrofala</option>

      </select>
      <br>
	<br>
    <input type="submit" value="WYŚLIJ">
    </form>

<?php
	echo '<br><br><div style="font-size: 20px;">PODSUMOWANIE REZERWACJI</div>';
	echo '<br><div style="font-size: 18px;">DANE OSOBY REZERWUJĄCEJ</div>';
	echo "Imię: ".$_GET["imie"]."<br>";
	echo "Nazwisko: ".$_GET["nazwisko"]."<br>";
	echo "Adres: ".$_GET["adres"]."<br>";
	echo "Numer karty kredytowej: ".$_GET["karta"]."<br>";
	echo "Adres e-mail: ".$_GET["email"]."<br>";
	
	echo '<br><div style="font-size: 18px;">DANE POBYTU:</div>';
	echo "Ilość osób, których dotyczy rezerwacja: ".$_GET["ilosc_osob"]."<br>";
	echo "Dzień przyjazdu: ".$_GET["data_przyjazdu"]."<br>";
	echo "Godzina przyjazdu: ".$_GET["godzina_przyjazdu"]."<br>";
	echo "Dzień wyjazdu: ".$_GET["data_wyjazdu"]."<br>";

	echo "<br>WYBRANE UDOGODNIENIA: <br> POKÓJ Z:<br>";
	for ($i=0;$i<count($_GET["udogodnienia"]);$i++) {
  	echo $_GET["udogodnienia"][$i];
	echo "<br>";
	}

?>

</body>

</html>
 