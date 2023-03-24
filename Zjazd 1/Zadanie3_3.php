<!DOCTYPE html>
<html>

<body>

<form method="post" action="">
        Podaj cyfre, do której chcesz uzyskać tabliczkę mnożenia:
        <input type="text" id="cyfra" name="cyfra">
    <input type="submit" value="WYŚLIJ">
    </form>

<?php

if (isset($_POST['cyfra'])) {
        $cyfra = $_POST['cyfra'];
}

function tabliczka_mnozenia($cyfra)
{
	for ($i = 1; $i <= $cyfra; $i++) {
        for ($j = 1; $j <= $cyfra; $j++) {
            echo $i*$j;
	    echo " ";
        }
        echo "<br>";
    }
}

$z = tabliczka_mnozenia($cyfra);
echo $z;
?>

</body>

</html>
