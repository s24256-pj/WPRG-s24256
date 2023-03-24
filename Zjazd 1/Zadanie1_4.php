<!DOCTYPE html>
<html>

<body>

<form method="post" action="">
        Podaj numer pesel:
        <input type="text" id="pesel" name="pesel">
	<input type="submit" value="Sprawdź">

    </form>

<?php

if (isset($_POST['pesel'])) {
        $pesel = $_POST['pesel'];
}


function pesel($pesel) {
  $number = str_split($pesel);
  echo $number[4].$number[5]."-".$number[2].$number[3]."-".$number[0].$number[1];
}

echo pesel($pesel);

?>

</body>

</html>

