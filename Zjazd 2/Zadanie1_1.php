<!DOCTYPE html>
<html>

<body>

<form method="post" action="">
        Podaj dwie liczby do działania:
        <br><input type="text" id="liczba1" name="liczba1" placeholder="PIERWSZA LICZBA">
	<br><input type="text" id="liczba2" name="liczba2" placeholder="DRUGA LICZBA">
	<br> Wybierz działanie, które chcesz wykonać
	<br><select name="dzialanie" id="dzialanie">
  <option value="dodawanie">DODAWANIE</option>
  <option value="odejmowanie">ODEJMOWANIE</option>
  <option value="mnozenie">MNOŻENIE</option>
  <option value="dzielenie">DZIELENIE</option>
</select>
    <input type="submit" value="OBLICZ">
    </form>

<?php

if (isset($_POST['liczba1']) && isset($_POST['liczba2'] && isset($_POST['dzialanie'])) {
        $liczba1 = $_POST['liczba1'];
	$liczba2 = $_POST['liczba2'];
	$dzialanie = $_POST['dzialanie'];

}

function kalkulator($dzialanie,$liczba1,$liczba2)
{
	$wynik = 0;
	switch ($dzialanie){
	case "dodawanie":
			$wynik = $liczba1 + $liczba2;
			break;
		case "odejmowanie":
			$wynik = $liczba1 - $liczba2;
			break;
		case "mnozenie":
			$wynik = $liczba1 * $liczba2;
			break;
		case "dzielenie":
			if ($liczba2 == 0) {
				$wynik = "Nie można dzielić przez zero!";
			} else {
				$wynik = $liczba1 / $liczba2;
			}
			break;
	}
	return $wynik;

}

$z = kalkulator($dzialanie,$liczba1,$liczba2);
echo "Wynik działania to: $z";
?>

</body>

</html>
