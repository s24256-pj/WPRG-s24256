<?php
include "Naglowek.php";

$dzial = $_SESSION['wybranydzial'];

$sql = "SELECT * FROM post where dzial = '$dzial' ORDER BY data_dodania DESC";
$mydb = $_SESSION['mydb'];

$result = $mydb->query($sql);
?>
        <!DOCTYPE html>
    <html lang="pl" >
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <div class="post-container">
<a href = StronaGlowna.php>WRÓĆ DO STRONY GŁÓWNEJ</a>
<h2>WSZYSTKIE POSTY Z DZIAŁU:
        <span class="szare"><?php echo $dzial?></span>
</h2></div>
<?php
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    $id = $row['id'];
    ?>
    <div class="post-container">
        <p class="daty" ><span class="szare">Data dodania:<?php echo $row["data_dodania"]; ?></p>
        <p class="tytul"> Tytuł:<span class="szare"><?php echo $row["tytul"]; ?></span></p>
        <p class="tresc"> Treść:<span class="szare"><br><?php echo $row["tresc"]; ?></span><br></p>
        <form method="POST">
        <input type="hidden" name="wybranypost" value="<?php echo $row["id"]; ?>">
        <input type="submit" value="ZOBACZ TEN WĄTEK">
        </form>
    </div>

<?php
}
?>
    </body>
</html>
<?php
if(isset($_POST['wybranypost'])) {
    $_SESSION['wybranypost'] = $_POST['wybranypost'];
    header('Location:Post.php');
}
?>

