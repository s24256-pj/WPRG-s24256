<?php

$id =$_GET['id'];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "samochody";

if (!mysqli_connect($servername, $username, $password, $dbname)) {
    echo "BŁĄD POŁĄCZENIA DO BAZY DANYCH";
}

$mydb = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM samochody WHERE id =$id";
$result = $mydb->query($sql);

$row = mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html lang="pl" >
<head>
    <meta charset="UTF-8">
</head>
<body>
    <table border="1">
    <tr>
            <th>ID</th>
            <th>Marka</th>
            <th>Model</th>
            <th>Cena</th>
            <th>Rocznik</th>
            <th>Opis</th>
    </tr>
<?php

    $result = $mydb->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        $id = $row['id'];

        echo "<td><a href='Samochod.php?id=" . $id."'>" . $row["id"] . "</a></td>";
        echo "<td>" . $row["marka"] . "</td>";
        echo "<td>" . $row["model"] . "</td>";
        echo "<td>" . $row["cena"] . "</td>";
        echo "<td>" . $row["rocznik"] . "</td>";
        echo "<td>" . $row["opis"] . "</td>";
        echo "</tr>";
        ?>
        <?php
    }
?>
    </table>
    <form action="StronaGlowna.php">
        <input type="submit" value = "POWRÓT DO STRONY GŁÓWNEJ">
    </form>

</body>
</html>
<?php
?>
