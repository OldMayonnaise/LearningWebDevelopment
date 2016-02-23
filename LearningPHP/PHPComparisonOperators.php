<?php
	
	$firstInt = $_POST['firstInt'];
	$secondInt = $_POST['secondInt'];

	echo 'firstInt = ' . $firstInt;
	echo '<br>';
	echo 'secondInt = ' . $secondInt;
	echo '<br>';
	
	if ($firstInt > $secondInt){
		echo 'firstInt is greater than secondInt';
	} else {
		'firstInt is less than secondInt';
	}
	echo '<br>';
	
	echo'<br>';
	if ($firstInt < $secondInt){
		echo 'firstInt is less than secondInt';
	} else {
		'firstInt is greater than secondInt';
	}
	echo '<br>';
	
	echo'<br>';
	if ($firstInt >= $secondInt){
		echo 'firstInt is greater than or equal to secondInt';
	} else {
		'firstInt is not greater than or equal to secondInt';
	}
	echo '<br>';
	
	echo'<br>';
	if ($firstInt == $secondInt){
		echo 'firstInt is the same as secondInt';
	} else {
		'firstInt is not the same as secondInt';
	}
	echo '<br>';	


?>

<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>PHP Comparison Operators</title>
  </head>
  <body>
    <form action="PHPComparisonOperators.php" method="post">
	Please enter the first number:
    <input type="number" name="firstInt" />
    <br />Please enter second number:
    <input type="number" name="secondInt" />
    <br />
    <input type="submit" name="submit" /></form>
  </body>
</html>