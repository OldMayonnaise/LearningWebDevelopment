<?php

// create array
$foodArray = array('pasta', 'apples', 'pizza'); // declare the array

// get single value
echo $foodArray[2];

// print all keys and values of array
print_r($foodArray); // this will print out the array with the key
echo '<br>';

// adding new value to array
$foodArray[4]='banana';
print_r($foodArray); // this will print out the array with the key
echo '<br>';

// assosiative arrays - store useful information - pasta apples and pizza are now the keys
$assosiativefoodArray = array('pasta'=>330, 'apples'=>80, 'pizza'=>400);
print_r($assosiativefoodArray);
echo '<br>';

// multi-dimensional arrays

/* +healthy
salad
apples
oats

+unhealthy
pizza
chips
iceCream */

$food = array('healthy'=>array('salad', 'apples','oats'), 'unhealthy'=>array('pizza','iceCream','chips','candy'));
print_r($food);
echo '<br>';
echo $food['healthy'][1];
echo '<br>';
echo $food['unhealthy'][0];
echo '<br>';

foreach($food as $element => $innerArray){ 
	echo '<strong>'.$element.'</strong><br>';
	foreach($innerArray as $value){
		echo $value.'<br>';
	}	
}


?>