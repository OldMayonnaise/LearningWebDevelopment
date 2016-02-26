<?php

	$number = 4;
	
	switch ($number) {
		case 1:
			echo 'one';
		break;
		
		case 2:
			echo 'two';
		break;
		
		case 3:
			echo 'three';
		break;
		
		default:
			echo 'number not found';
		break;
	}

	echo'<br>';
	
	$day = 'Monday';
	
	switch ($day){
		case 'Saturday':
		case 'Sunday':
			echo 'It\'s a weekend';
		break;
		
		default:
			echo 'Not a weekend.';
		break;
	}
	
?>