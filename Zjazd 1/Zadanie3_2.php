<!DOCTYPE html>
<html>

<body>

<form method="post" action="">
        Podaj ilosc rzutow kostką, które chcesz wykonać:
        <input type="text" id="ilosc_rzutow" name="ilosc_rzutow">
    <input type="submit" value="RZUĆ KOSTKĄ">
    </form>

<?php

if (isset($_POST['ilosc_rzutow'])) {
        $ilosc_rzutow = $_POST['ilosc_rzutow'];
}

function rzut_kostka($ilosc_rzutow)
{
	$tablica = array();
	for($i=0;$i<$ilosc_rzutow;$i++){
	$x = rand(1,6);
	array_push($tablica,$x);
	}
	print_r($tablica);
}

$y = rzut_kostka($ilosc_rzutow); 
?>

</body>

</html>
