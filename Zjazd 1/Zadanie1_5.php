<!DOCTYPE html>
<html>
<body>

<form method="post" action="">
  Proszę wybrać prostokąt, trójkąt lub trapez: <br>
<input type="text" id="figura" name="figura">
  <br>Proszę podać wymiary wybranej figury po przecinku. <br>
<input type="text" id="wymiary" name="wymiary">
  <br>Trójkąt: a,h;
  <br>Prostokąt: a,b;
  <br>Trapez: a,b,h;<br>
<input type="submit" value="OBLICZ POLE">
</form>

<?php
if(isset($_POST['figura'])){
    $figura = $_POST['figura'];
}
if (isset($_POST['wymiary'])) {
            $wymiary = $_POST['wymiary'];
}

function kalkulator_powierzchni($figura,$wymiary) {
  switch ($figura) {
    case "trójkąt":
	$wymiary = explode(',', $wymiary);
	$a = $wymiary[0];
	$h = $wymiary[1];
	$pole = 0.5 * $a * $h;
	return "Pole trójkąta wynosi: $pole";
        break;
    case "prostokąt":
	$wymiary = explode(',', $wymiary);
	$a = $wymiary[0];
	$b = $wymiary[1];
	$pole = $a * $b;
	return "Pole prostokąta wynosi: $pole";
        break;
    case "trapez":
        $wymiary = explode(',', $wymiary);
	$a = $wymiary[0];
	$b = $wymiary[1];
	$h = $wymiary[2];
	$pole = $a * $b;
	$pole = 0.5 * ($a + $b) * $h;
	return "Pole trapezu wynosi: $pole";
        break;
    default:
	return "Nie prawidłowa figura lub wymiary. SPRÓBUJ PONOWNIE";
        break;
  }
}

$obliczpole = kalkulator_powierzchni($figura,$wymiary);
echo $obliczpole;
?>

</body>
</html>