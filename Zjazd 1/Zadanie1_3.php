<!DOCTYPE html>
<html>

<body>

<form method="post" action="">
        Podaj zdanie do ocenzurowania:
        <input type="text" id="zdanie" name="zdanie">
    </form>

<?php

if (isset($_POST['zdanie'])) {
        $zdanie = $_POST['zdanie'];
}

function ocenzuruj($zdanie) {
  $niepozadane_slowa = array("niepożądane", "zdanie", "nie","lubię",);
  $slowo_array = explode(" ", $zdanie);
  foreach ($slowo_array as &$slowo) {
    if (in_array(strtolower($slowo), $niepozadane_slowa)) {
      $slowo = str_repeat("*", strlen($slowo));
    }
  }
  return implode(" ", $slowo_array);
}

$zdanie1 = "PRZYKŁAD: To zdanie zawiera niepożądane słowo.";
$ocenzurowane_zdanie1 = ocenzuruj($zdanie1);
$ocenzurowane_zdanie = ocenzuruj($zdanie);

echo "$ocenzurowane_zdanie1<br>";
echo $ocenzurowane_zdanie;


?>

</body>

</html>
