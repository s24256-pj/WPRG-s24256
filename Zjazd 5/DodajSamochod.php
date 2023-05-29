<?php
 include ("Zakladki.php");
?>
    <!DOCTYPE html>
    <html lang="pl" >
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <fieldset>
        <legend> DODAJ NOWY SAMOCHOD </legend>
        <form method="post">
            <label for ="marka">Marka:</label><br>
            <input type = "text" name = "marka" id="marka"required><br>
            <label for ="model">Model:</label><br>
            <input type = "text" name = "model" required><br>
            <label for ="rocznik">Rocznik:</label><br>
            <input type = "number" name = "rocznik" min="1900" max="2023"required><br>
            <label for ="cena">Cena:</label><br>
            <input type = "number" name = "cena" required><br>
            <label for ="Opis">Opis:</label><br>
            <input type = "text" name = "opis" size = 60 maxlength="1000" required><br>
            <input type = "submit" value="DODAJ SAMOCHOD" name="dodaj">
        </form>
    </fieldset>
    </body>
</html>

<?php
if(isset($_POST['marka'])){
    $marka = $_POST['marka'];
}
if(isset($_POST['model'])){
    $model = $_POST['model'];
}
if(isset($_POST['rocznik'])){
    $rocznik = $_POST['rocznik'];
}
if(isset($_POST['cena'])){
   $cena = $_POST['cena'];
}
if(isset($_POST['opis'])){
    $opis = $_POST['opis'];
}

if(isset($_POST['dodaj'])) {
    $sql = "INSERT INTO samochody (marka, model, cena, opis, rocznik) VALUES('$marka','$model', $cena, '$opis', $rocznik)";

    if (mysqli_query($mydb, $sql)) {
        echo "Samochód został dodany pomyślnie.";
    } else {
        echo "Błąd dodawania samochodu: " . mysqli_error($mydb);
    }
}
 ?>