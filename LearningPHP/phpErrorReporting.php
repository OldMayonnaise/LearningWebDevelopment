<?php

	// flaw in the tutorial - haven't figured out how to change error reporting on the fly
	//ini_set('error_reporting', 'E_ALL');
	//error_reporting(0);
	//display_errors(0);	

	$var = 'joel' //semicolon line terminators removed to create an error
	echo 'test';
	//echo 'php error reporting, so far a variable has been declared without a line terminator';
	//echo 'turn error reporting off in production so visitors dont know the structure of your website';

?>

<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>PHP Error Reporting</title>
  </head>
  <body>
  <br />
	<a href="index.php">Back to index.php</a>
  </body>
</html>
