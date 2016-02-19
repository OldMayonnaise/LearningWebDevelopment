<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title></title>	
  </head>
  <body>
  <?php  
	echo 'test';
	$text = '<br>this text is actually a string variable';
	$textVariable ='text variable';
	echo $text;  
	?>
	
	<br>
	The value in this field is actually a php string variable <input type="text" name="variableExample" value="<?php echo $textVariable; ?>">
	<br />
	<a href="index.php">Back to index.php</a>
  </body>
</html>
