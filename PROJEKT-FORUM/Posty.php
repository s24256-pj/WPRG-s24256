<?php

include "Naglowek.php";

$id =$_GET['id'];

$sql = "SELECT * FROM post WHERE id =$id";
$result = $mydb->query($sql);

$row = mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html lang="pl" >
<head>
    <meta charset="UTF-8">
</head>
<body>
<table>
    <tr>
        <th>Tytuł:</th>
        <th>Treść:</th>
        <th>Dział:</th>
        <th>Data dodania:</th>
    </tr>
    <?php

    $result = $mydb->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        $id = $row['id'];

        echo "<td>" . $row["tytul"] . "</td>";
        echo "<td>" . $row["tresc"] . "</td>";
        echo "<td>" . $row["dzial"] . "</td>";
        echo "<td>" . $row["data_dodania"] . "</td>";
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

