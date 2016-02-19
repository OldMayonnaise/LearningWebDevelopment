<?php

	// this is how you write a regular comment
	echo 'this is a single quote echo within the php tags';
	echo '<br>';
	$textVariable = 'this is a text variable';	
	/* echo 'this is supposed to be a comment example';
	echo '<br>';
	echo 'using an echo br is probably not the best idea';
	echo '<br>'; */
	echo $textVariable;
	

?>

<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>How To Comment</title>
  </head>
  <body>
  <form>
  The value of the following field is a php $textVariable <input type="text" name="textVariableName" value="<?php echo $textVariable; ?>"/>
  </form>
  <br />
	<a href="index.php">Back to index.php</a>
  </body>
</html>
