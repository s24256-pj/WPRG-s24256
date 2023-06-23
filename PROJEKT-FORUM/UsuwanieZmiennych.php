<?php
session_start();
?>
<!DOCTYPE html>
<!DOCTYPE html>
    <html lang="pl" >
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="StronaGlowna.css">

    </head>
    <body>

    <div class="post-container">POST:
        <div>TYTUŁ:<?php echo $_SESSION['tytul'] ?><br></div>
        <div>TREŚĆ:<?php echo $_SESSION['tresc'] ?><br></div>
        <div>DZIAŁ:<?php echo $_SESSION['dzial'] ?><br></div>
        <?php echo "<a href='StronaGlowna.php'> Wróć do strony głównej</a>"?>
    </div>
        <form method="POST">
            <p>POST ZOSTAŁ POMYŚLNIE DODANY</p>
            <input type="submit" value="DODAJ KOLEJNY POST" id="kolejny" name="kolejny">
        </form>
        <form method="POST">
            <input type="submit" value="WRÓC DO STRONY GŁOWNEJ" id="stronaglowna" name="stronaglowna">
        </form>
        </body>
        </html>
<?php

$data_dodania = date("Y-m-d H:i:s");
echo "DATA DODANIA: " . $data_dodania . "<br>";
echo '<br><div style="font-size: 18px;">POST:</div>';
echo "TYTUŁ: " . $_SESSION['tytul'] . "<br>";
echo "TREŚĆ: " . $_SESSION['tresc'] . "<br>";
echo "DZIAŁ: " . $_SESSION['dzial'] . "<br>";

unset($_SESSION['tytul']);
unset($_SESSION['tresc']);
unset($_SESSION['dzial']);
unset($_SESSION['dodajp']);
unset($_SESSION['podglad']);

if(isset($_POST['kolejny'])){
    header('Location:DodajPost.php');
}
if(isset($_POST['stronaglowna'])){
    header('Location:StronaGlowna.php');
}

?>