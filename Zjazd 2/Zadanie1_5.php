<!DOCTYPE html>
<html>
<body>
	<form method="GET">
		<label>Podaj datę urodzenia:</label>
		<input type="date" name="data_urodzenia" required>
		<input type="submit" value="WYŚLIJ">
	</form>

	<?php
	if(isset($_GET['data_urodzenia'])) {
	setlocale(LC_ALL, 'pl_PL.UTF-8');
		$data_urodzenia = $_GET['data_urodzenia'];
		$data = strtotime($data_urodzenia);

		$dzien_tygodnia = strftime('%A', $data);
		$wiek = floor((time() - $data) / (60 * 60 * 24 * 365));
		$nastepne_urodziny = strtotime("+".($wiek + 1)."year",$data);
		$teraz = strtotime("now");
		$dni = floor(($nastepne_urodziny - $teraz)/(60*60*24));

		echo "<p>Urodziłeś/łaś się w dniu: $dzien_tygodnia</p>";
		echo "<p>Ukończyłeś/łaś $wiek lat/a</p>";
		echo "<p>Do Twoich kolejnych urodzin pozostało $dni dni</p>";
	}
	?>
</body>
</html>
