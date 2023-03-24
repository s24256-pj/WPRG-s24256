<!DOCTYPE html>
<html>
<body>

<?php
function losowaTablica($index) {
  $tablica = array();
  for ($i = 0; $i < 10; $i++) {
    $tablica[] = rand(0, 100);
  }
  return $tablica[$index];
}

$indeks = 5;
$wynik = losowaTablica($indeks); 
echo "Wartość elementu o indeksie $indeks to: $wynik";
?>

</body>
</html>