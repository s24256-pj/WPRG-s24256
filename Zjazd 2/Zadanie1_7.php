 <!DOCTYPE html>
<html>
<body>
<?php

function obsluga_zadania($sciezka, $nazwa_katalogu, $typ_operacji = "read") {

    if ($typ_operacji == "delete" && count(scandir($sciezka . $nazwa_katalogu)) > 2) {
        return "Katalog nie jest pusty.";
    }

    if (!file_exists($sciezka)) {
        return "Katalog nie istnieje.";
    }

    if (substr($sciezka, -1) != "/") {
        $sciezka .= "/";
    }


    switch ($typ_operacji) {
	case "create":
            mkdir($sciezka . $nazwa_katalogu);
            return "Katalog został utworzony.";
        case "delete":
            rmdir($sciezka . $nazwa_katalogu);
            return "Katalog został usunięty.";
        default:
            return implode("<br>", scandir($sciezka . $nazwa_katalogu));
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $typ_operacji = $_POST["typ_operacji"];
    $sciezka = $_POST["sciezka"];
    $nazwa_katalogu = $_POST["nazwa_katalogu"];
    $wynik = obsluga_zadania($sciezka, $nazwa_katalogu, $typ_operacji);
    echo $wynik;
} else {
?>


	<form method="POST" action="">
		<label>Ścieżka:</label><br>
		<input type="text" name="sciezka"><br>
		<label>Nazwa katalogu:</label><br>
		<input type="text" name="nazwa_katalogu"><br>
		<label>Typ operacji:</label><br>
		<select name="typ_operacji">
			<option value="read">Odczyt</option>
			<option value="delete">Usunięcie</option>
			<option value="create">Stworzenie</option>
		</select><br><br>
		<input type="submit" value="Wykonaj">
	</form>
<?php
}
?>
