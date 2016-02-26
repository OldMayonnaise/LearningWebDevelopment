<?php

function myName() {
	echo "joel";
}

echo 'my name is ';
myName();
myName();

echo '<br>';

$firstNum = 5;
$secondNum = 3;

function addNumbers($firstInt, $secondInt){
	$sum = $firstInt + $secondInt;
	echo $firstInt . ' + ' . $secondInt .' = ' . $sum;
}

addNumbers($firstNum, $secondNum);

function returnExample($firstInt, $secondInt){
	return $firstInt + $secondInt;
}

echo '<br>';

echo $firstNum . ' + ' . $secondNum . ' = ' . returnExample($firstNum, $secondNum);

?>