<?php

// global variables and functions - this may be what I need to try to
// make my code work

$user_ip = $_SERVER['REMOTE_ADDR']; // this is going to retrieve my local IP address

function echo_ip(){
	global $user_ip; // <- this is key - this is kinda like an access modifier
	$string = 'your ip address is '.$user_ip;
	echo $string;
}

echo_ip();

?>