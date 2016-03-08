<?php

$string = 'This is an example string & this is a tutorial.';

$firstString = 'this is the first string';
$secondString = 'this is the second string';

// str_word_count() function and areguments
//$stringWordCount = str_word_count($string); // returns int number of words in a string
//$stringWordCount = str_word_count($string, 1); // returns an array
//$stringWordCount = str_word_count($string, 2); // returns an assosiative array
$stringWordCount = str_word_count($string, 1, '&.,'); // third argument specifies to include the punctuation in the array
//echo $stringWordCount;
print_r($stringWordCount); // print_r($array) prints all the values of an array

// shuffle characters function
$stringShuffled = str_shuffle($string); // shuffles characters in a string
echo $stringShuffled;
echo '<br>';

// string length function
$halfString = substr($stringShuffled, 0, strlen($string)/2);
echo $halfString;
echo '<br>';

$intStringLength = strlen($string);
echo $string. ' - is '. $intStringLength .' characters long.<br>';
if (strlen($string) > 25){
	echo 'string is too long';
}
echo '<br>';

// reverse string functions
$stringReversed = strrev($string);
echo $stringReversed;
echo '<br>';

// similar text functions
similar_text($firstString, $secondString, $resultString); // calculates how similar two strings are. the third argument is acutally a return variable
echo 'The strings are '. $resultString . ' the same.';
echo '<br>';

// trim string functions
$string = ' trim string ';
echo 'leftside'.$string.'rightside';
echo '<br>';
$stringTrimmed = trim($string);
echo 'leftside'.$stringTrimmed.'rightside';
echo '<br>';
$stringLeftTrimmed = ltrim($string);
echo 'leftside'.$stringLeftTrimmed.'rightside';
$stringRightTrimmed = rtrim($string);
echo '<br>';
echo 'leftside'.$stringRightTrimmed.'rightside';
echo '<br>';


// add slashes - checkout html entities
$string = 'this is a "image" string';
echo $string;
echo '<br>';
$stringSlashes = addslashes($string);
echo $stringSlashes;
echo '<br>';
echo stripslashes($stringSlashes);




?>