<!DOCTYPE html>
<html>

<body>

<form method="post" action="">
    Podaj promień koła:
    <input type="text" id="promien" name="promien">
    <input type="submit" value="Oblicz średnice">
</form>

<?php

if (isset($_POST['promien'])) {
        $promien = $_POST['promien'];
}

function srednica_kola($promien)
{
	$srednica = $promien*2;
	return $srednica;
}

$y = srednica_kola($promien);
echo "Promien kola = $promien, wiec srednica = $y"

?>

</body>

</html>

