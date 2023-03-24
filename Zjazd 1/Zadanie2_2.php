<!DOCTYPE html>
<html>
<body>

<form method="post" action="">
	Jakiej jesteś narodowości?<br>
        Podaj kraj:
        <input type="text" id="kraj" name="kraj">
    <input type="submit" value="Sprawdź">
    </form>

<?php

if (isset($_POST['kraj'])) {
        $kraj = $_POST['kraj'];
}

function jakiejJestemNarodowosci($kraj) {
  $narodowosc = array(
    'Polska' => 'Polak',
    'Niemcy' => 'Niemiec',
    'Francja' => 'Francuz',
    'Włochy' => 'Włoch',
    'Portugalia' => 'Portugalczyk',
    'Węgry' => 'Węgier'
  );
  
  if(array_key_exists($kraj, $narodowosc)){
    return $narodowosc[$kraj];
  } else {
    return 'Nieznana narodowość';
  }
}

$narodowosc = jakiejJestemNarodowosci($kraj);
echo "Jesteś z kraju: $kraj, więc Twoja narodowość to: $narodowosc.";

?>

</body>
</html>
