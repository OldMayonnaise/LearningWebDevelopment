<?php	

	$whileCounter = 1;
	
	while ($whileCounter < 10){
		echo $whileCounter . " hello<br>";
		$whileCounter ++;
	}
	
	echo "<br>";
	
	$doWhileCounter = 11;
	
	do {
		echo $doWhileCounter . " this will always show at least once<br>";
		$doWhileCounter ++;
	} while ( $doWhileCounter < 10);
	
	echo "<br>";
	
	for ($count = 1; $count <= 10; $count++){
		echo "this will count for ". $count . " more times<br>";
	}
	
?>


