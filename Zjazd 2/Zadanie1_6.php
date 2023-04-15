<!DOCTYPE html>
<html>
<body>

<form method="GET">
		<label>Podaj liczbę, której chcesz uzyskać silnie:</label>
		<input type="text" name="liczba" required>
		<input type="submit" value="OBLICZ">
	</form>
<?php

	if(isset($_GET['liczba'])){
		$liczba = $_GET['liczba'];
	}
	
	function rekurencyjna_silnia($liczba){
		if($liczba < 2){
			return 1;
		}
		else{
		 	return $liczba*rekurencyjna_silnia($liczba-1); 
		}
	}

	function silnia($liczba){
		$silnia = 1;
		if($liczba >= 2){
		for($i=1;$i<=$liczba; $i++){
			$silnia = $silnia * $i;
		}
		return $silnia;
		}
		else{
			return 1;
		}
	}

	$silnia_r = rekurencyjna_silnia($liczba);
	$silniaa = silnia($liczba);
	echo "Silnia z $liczba wynosi: $silnia_r<br>";
	echo "Silnia z $liczba wynosi: $silniaa<br>";

	$start1 = microtime(true);
	$result1 = rekurencyjna_silnia($liczba);
	$end1 = microtime(true);
	$time1 = $end1 - $start1;
	echo "Czas wykonania funkcji rekurencyjna_silnia(): " . $time1 . " sekund<br>";
	
	$start = microtime(true);
	$result = silnia($liczba);
	$end = microtime(true);
	$time = $end - $start;
	echo "Czas wykonania funkcji silnia(): " . $time . " sekund<br>";
	
	if($time1>$time){
		$time2 = $time1-$time;
		echo"Funkcja silnia() była szybsza o: $time2";
	}
	else
	{
		$time2 = $time-$time1;
		echo"Funkcja rekurencyjna_silnia() była szybsza o: $time2";
	}

	?>
</body>
</html>
