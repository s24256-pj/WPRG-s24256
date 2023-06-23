<?php
session_start();
include "LaczenieBazaDanych.php";
$mydb = $_SESSION['mydb'];
$login = $_SESSION['login'];

$sql1 = "UPDATE uzytkownik SET zalogowany = '0' WHERE login = '$login'";
$result = mysqli_query($mydb, $sql1);
?>
<!DOCTYPE html>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="StronaGlowna.css">
    <meta charset="UTF-8">
</head>
<body>
<p>ZOSTAŁEŚ WYLOGOWANY</p>
<a href='StronaGlowna.php'> PRZEJDŹ DO STRONY GŁÓWNEJ</a>
<?php
    session_destroy();
?>
