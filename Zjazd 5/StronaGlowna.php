<?php

include ("Zakladki.php");
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

    </tr>
<?php

    $sql = "SELECT * FROM samochody ORDER BY cena ASC LIMIT 5";
    $result = $mydb->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        $id = $row['id'];

        echo "<td><a href='Samochod.php?id=" . $id."'>" . $row["id"] . "</a></td>";
        echo "<td>" . $row["marka"] . "</td>";
        echo "<td>" . $row["model"] . "</td>";
        echo "<td>" . $row["cena"] . "</td>";

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