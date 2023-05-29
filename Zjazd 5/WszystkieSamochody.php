<?php

include("Zakladki.php");
?>

<!DOCTYPE html>
<html lang="pl" >
<head>
    <meta charset="UTF-8">
</head>
<body>
<table border="1">
    <tr>
        <th>Rocznik</th>
        <th>ID</th>
        <th>Marka</th>
        <th>Model</th>
        <th>Cena</th>
        <th>Opis</th>
    </tr>
<?php

$sql = "SELECT * FROM samochody ORDER BY rocznik";
$result = $mydb->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["rocznik"] . "</td>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["marka"] . "</td>";
    echo "<td>" . $row["model"] . "</td>";
    echo "<td>" . $row["cena"] . "</td>";
    echo "<td>" . $row["opis"] . "</td>";
    echo "</tr>";
    ?>
    <?php
}
?>
</table>
</body>
    </html>
<?php
?>
