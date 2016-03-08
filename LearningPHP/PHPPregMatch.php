<?php

// this preg is checking for 'is' within the $string variable
// returns boolean
// can be used to search for a pattern within a string

	$string = 'this is a string';
	
	if (preg_match('/is/', $string)){
		echo 'match found';
	} else {
		echo 'no match found';
	}

?>