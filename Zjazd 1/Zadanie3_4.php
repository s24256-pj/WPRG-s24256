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
    $liczba = $_POST['liczba'];
}

function liczba_pierwsza($liczba)
{
    if ($liczba < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($liczba); $i++) {
        if ($liczba % $i == 0) {
            return false;
        }
    }
    return true;
}

$czy_pierwsza = liczba_pierwsza($liczba);
    if ($czy_pierwsza) {
        echo "Liczba $liczba jest liczbą pierwszą";
    } else {
        echo "Liczba $liczba NIE jest liczbą pierwszą";
    }

?>

</body>
</html>
