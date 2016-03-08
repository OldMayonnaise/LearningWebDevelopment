<?php

$firstNum = 5;
$secondNum = 3;



echo 'my name is ';
echo myName();
echo '<br>';

addNumbers($firstNum, $secondNum);

// this function prints my name to screen
function myName() {
	echo "joel";
}

// this function takes two variables and adds them together
function addNumbers($firstInt, $secondInt){
	$sum = $firstInt + $secondInt;
	echo $firstInt . ' + ' . $secondInt .' = ' . $sum;
}

// this function takes two variable and returns and int of both variable added together
function returnExample($firstInt, $secondInt){
	return $firstInt + $secondInt;
}

echo '<br>';
echo $firstNum . ' + ' . $secondNum . ' = ' . returnExample($firstNum, $secondNum);

?>