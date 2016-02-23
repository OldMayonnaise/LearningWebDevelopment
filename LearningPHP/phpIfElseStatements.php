<?php

	echo 'this is an example comparing two ints';
	echo '<br/>';
	
	$firstInt = 5;
	$secondInt = 3;
	
	if ($firstInt >= $secondInt){
		echo $firstInt . ' is greater than ' . $secondInt; 
	} else {
		echo $firstInt . ' is less than ' . $secondInt;
	}
	
	echo '<br/>';

	// else if statement
	if ($firstInt == 10){
		echo 'firstInt is equal to 10';
	} else if ($secondInt == 10){
		echo 'secondInt is equal to 10';
	} else {
		echo 'neither Int is equal to 10';
	}
	
	echo '<br/>';
	echo 'this is an example comparing two strings';
	echo '<br/>';
	
	$firstString = 'this is a string';
	$secondString = 'this is a string';
	
	if($firstString == $secondString){
		echo 'both strings are the same';
	} else {
		echo 'the strings are different';
	}
	
	echo '<br/>';
	echo 'this is an example testing a boolean';
	echo '<br/>';
	
	$booleanVariable = true;
	
	if ($booleanVariable) {
		echo 'the boolean variable is true';			
	} else {
		echo 'the boolean variable is false';
	}

	
	

	
?>

<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>PHP If Else Statements</title>
  </head>
  <body>  
  </body>
</html>
