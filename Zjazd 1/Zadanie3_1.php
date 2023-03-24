<!DOCTYPE html>
<html>
<body>

<?php

function losowaTablica() {
  $tablica = array();
  for ($i = 0; $i < 10; $i++) {
    $tablica[] = rand(0, 100);
  }
  return $tablica;
}

$tablica = losowaTablica();

function maxFor($tablica){
	$m = $tablica[0];
	for ($i=1; $i<count($tablica);$i++){
		if($tablica[$i]>$m){
			$m = $tablica[$i];
		}
	}
	return $m;
}

function maxWhile($tablica){
	$m = $tablica[0];
	$i = 1;
	while($i<count($tablica)){
		if($tablica[$i]>$m){
			$m = $tablica[$i];
		}
	$i++;
	}
	return $m;
}

function maxDoWhile($tablica){
	$m = $tablica[0];
	$i = 0;
	do{	
		if($tablica[$i]>$m){
		$m = $tablica[$i];
		}
		$i++;
	}while($i<count($tablica));
	return $m;
}

function maxForEach($tablica){
	$m = 0;
	foreach($tablica as $key=>$val){
		if($val>$m){
			$m = $val;
		}
	}
	return $m;
}


$o = maxFor($tablica);
$n = maxWhile($tablica);
$p = maxDoWhile($tablica);
$r = maxForEach($tablica);

echo "Największą cyfrą w tablicy:[";
foreach ($tablica as $value) {
  echo "$value ";
}
echo "]jest : $o<br>";

echo "Największą cyfrą w tablicy:[";
foreach ($tablica as $value) {
  echo "$value ";
}
echo "]jest : $n <br>";

echo "Największą cyfrą w tablicy:[";
foreach ($tablica as $value) {
  echo "$value ";
}
echo "]jest : $p<br>";

echo "Największą cyfrą w tablicy:[";
foreach ($tablica as $value) {
  echo "$value ";
}
echo "]jest : $r<br>";


?>

</body>
</html>
