
<!DOCTYPE html>
<html>
<body>

<form method="post" action="">
    Czy liczba jest liczbą pierwszą?:
    <input type="text" id="liczba" name="liczba">
    <input type="submit" value="Sprawdź">
</form>

<?php
if (isset($_POST['liczba'])) {
    $liczba = intval($_POST['liczba']);
}

function czy_liczba($liczba){
	if (is_int($liczba) && $liczba > 0){
		liczba_pierwsza($liczba);
		return true;
	}
	else{
		echo "ELEMENT WPISANY W POLE NIE JEST LICZBĄ DODATNIĄ ANI CAŁKOWITĄ, WIĘC NIE JEST LICZBĄ PIERWSZĄ<br>";
		return false;
	}
}
function liczba_pierwsza($liczba)
{
	$licznik =0;
     if ($liczba < 2) {
	echo "Liczba iteracji: " . $licznik . "<br>";
        return false;
     }
        for ($i = 2; $i <= sqrt($liczba); $i++) {
	$licznik++;
            if ($liczba % $i == 0) {
		echo "Liczba iteracji: " . $licznik . "<br>";
                return false;
            }
        }
	echo "Liczba iteracji: " . $licznik . "<br>";
	return true;
}

$czy_liczba = czy_liczba($liczba);
$czy_pierwsza = liczba_pierwsza($liczba);

if($czy_liczba){
    if ($czy_pierwsza) {
        echo "Liczba $liczba jest liczbą pierwszą";
    } else {
        echo "Liczba $liczba NIE jest liczbą pierwszą";
    }
}

?>

</body>
</html>
