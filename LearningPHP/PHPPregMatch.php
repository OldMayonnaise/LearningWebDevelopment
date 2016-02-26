<?php

	$string = 'this is a string';
	
	if (preg_match('/is/', $string)){
		echo 'match found';
	} else {
		echo 'no match found';
	}

?>