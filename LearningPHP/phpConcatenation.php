<?php
        
        $day = 'Saturday';
        $date = 14;
        $month = 'February';
        $year = 2016;
        $fullDate = 'The day is ' .$day. ' ' .$date. ' ' .$month. ' '.$year;
		$fullDateDoubleQuotes = "The day is $day $date $month $year";
        
        echo 'The day is ' .$day. ' ' .$date. ' ' .$month. ' '.$year;
        echo '<br>';
        echo $fullDate;
        echo ' <- this is a variable was created through concatenation';
		echo '<br>';
        echo $fullDateDoubleQuotes;
        echo ' <- this is a variable was created through simple concatenation with double quotes';
		
        // What did I learn? . <- concatenates similar to + in java and c#
		// you can create new variables through concatenation
		// you can concatenate html into variables
		// single quotes need to tbe concatenated, double quotes do not.

?>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>PHP Concatenation</title>
  </head>
  <body>
	<br/>
    <a href="index.php">Back to index.php</a>
  </body>
</html>
