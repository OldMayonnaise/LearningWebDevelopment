<?php

	// triple equals checks the datatype - check out the following code, php is a bit wierd sometimes
	
	$firstNumber = 1; //int datatype
	$secondNumber = '1';
	
	if ($firstNumber == $secondNumber){	
		echo 'both variables are the same';
		echo '<br>';
	}

?>