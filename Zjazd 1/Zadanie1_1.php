<!DOCTYPE html>
<html>

<body>

<form method="post" action="">
    <input type="submit" value="RZUĆ KOSTKĄ">
</form>


<?php

function rzut_kostka()
{
	$x = rand(1,6);
	return $x;
}

$y = rzut_kostka();
echo "WYRZUCIŁEŚ KOSTKĄ LICZBĘ: "; 
echo $y;
?>

</body>

</html>
