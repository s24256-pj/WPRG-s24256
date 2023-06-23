<?php
session_start();

include ("LaczenieBazaDanych.php");

if(!isset($_SESSION['dodajp']) && !isset($_SESSION['podglad'])){
?>

<!DOCTYPE html>
<html lang="pl" >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="StronaGlowna.css">

</head>
<body>
    <form class='post-container'method="post">
        <label for ="tytul"> Tytuł:</label><br>
        <input type="text" name="tytul" id="tytul" value="<?php if(isset($_SESSION['podglad'])){ echo $_SESSION['tytul'];}?>" required><br>
        <label for ="tresc"> Treść:</label><br>
        <input class = 'inputtresc' type="text" name="tresc" id="tresc" value="<?php if(isset($_SESSION['podglad'])){ echo $_SESSION['tresc'];}?>"required><br>
        <label> Dział:</label><br>
        <select name="dzial" id="dzial" required>
            <option value="" disabled selected>-Wybierz dział-</option>
            <option value="spolecznosci" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'spolecznosc') echo 'selected';} ?>>społeczność i wydarzenia</option>
            <option value="film" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'film') echo 'selected';} ?>>film i telewizja</option>
            <option value="gry" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'gry') echo 'selected';} ?>> gry</option>
            <option value="technologia" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'technologia') echo 'selected'; }?>>technologia</option>
            <option value="zwierzeta" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'zwierzeta') echo 'selected'; }?>>zwierzęta</option>
            <option value="praca" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'praca') echo 'selected'; }?>>praca i kariera</option>
            <option value="inne" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'inne') echo 'selected'; }?>>inne i ogólne</option>
        </select><br>
        <br><input type="submit" value="DODAJ POST" name="dodajp">
        <input type="submit" value="PODGLĄD POSTU" name="podglad">
    </form>
<?php
echo "<a href='StronaGlowna.php'>Wróć do strony głównej</a>";
}
if(isset($_POST['dodajp']) || isset($_POST['podglad'])) {

    if (isset($_POST['podglad'])) {
        $_SESSION['podglad'] = $_POST['podglad'];
    }
    if(isset($_POST['dodajp'])){
        $_SESSION['dodajp'] = $_POST['dodajp'];
    }
    if (isset($_POST['tytul'])) {
        $tytul = $_POST['tytul'];
        $_SESSION['tytul'] = $tytul;
    }
    if (isset($_POST['tresc'])){
        $_SESSION['tresc'] = $_POST['tresc'];
        $tresc = $_SESSION['tresc'];
    }
    if (isset($_POST['dzial'])) {
        $_SESSION['dzial'] = $_POST['dzial'];
        $dzial = $_SESSION['dzial'];
    }

if(isset($_POST['dodajp'])){

    $login = $_SESSION['login'];
    $sql1 = "SELECT id FROM uzytkownik WHERE login = '$login'";
    $result = mysqli_query($mydb, $sql1);
    $row = $result->fetch_assoc();

    $_SESSION['dodajp'] = $_POST['dodajp'];
    $id_uzytkownika = $row['id'];
    $data_dodania = date("Y-m-d H:i:s");

    $sql = "INSERT INTO post (tytul,tresc,id_uzytkownik,dzial,data_dodania) VALUES('$tytul','$tresc','$id_uzytkownika','$dzial','$data_dodania')";
    if (mysqli_query($mydb, $sql)) {
        header('Location: UsuwanieZmiennych.php');
    }
}
if(isset($_POST['podglad'])){
    ?>
    <!DOCTYPE html>
<html lang="pl" >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="StronaGlowna.css">
</head>
<body>
<form class='post-container'method="post">
    <label for ="tytul"> Tytuł:</label><br>
    <input type="text" name="tytul" id="tytul" value="<?php if(isset($_SESSION['podglad'])){ echo $_SESSION['tytul'];}?>" required><br>
    <label for ="tresc"> Treść:</label><br>
    <input class = 'inputtresc' type="text" name="tresc" id="tresc" value="<?php if(isset($_SESSION['podglad'])){ echo $_SESSION['tresc'];}?>"required><br>
    <label> Dział:</label><br>
    <select name="dzial" id="dzial" required>
        <option value="" disabled selected>-Wybierz dział-</option>
        <option value="spolecznosci" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'spolecznosc') echo 'selected';} ?>>społeczność i wydarzenia</option>
        <option value="film" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'film') echo 'selected';} ?>>film i telewizja</option>
        <option value="gry" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'gry') echo 'selected';} ?>> gry</option>
        <option value="technologia" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'technologia') echo 'selected'; }?>>technologia</option>
        <option value="zwierzeta" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'zwierzeta') echo 'selected'; }?>>zwierzęta</option>
        <option value="praca" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'praca') echo 'selected'; }?>>praca i kariera</option>
        <option value="inne" <?php if(isset($_SESSION['podglad'])){if ($_SESSION['dzial'] === 'inne') echo 'selected'; }?>>inne i ogólne</option>
    </select><br>
    <br><input type="submit" value="DODAJ POST" name="dodajp">
    <input type="submit" value="PODGLĄD POSTU" name="podglad">
</form>
</body>
</html>
    <?php

    $login = $_SESSION["login"];
    $sql1 = "SELECT id FROM uzytkownik WHERE login = '$login'";
    $result = mysqli_query($mydb, $sql1);
    $row = $result->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="pl" >
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <div class="post-container">POST:
    <div>TYTUŁ:<?php echo $tytul ?><br></div>
    <div>TREŚĆ:<?php echo $tresc ?><br></div>
    <div>DZIAŁ:<?php echo $dzial ?><br></div>
    <?php echo "<a href='StronaGlowna.php'> Wróć do strony głównej</a>"?>
    </div>
    </body>
    </html>
<?php
}
}
?>

