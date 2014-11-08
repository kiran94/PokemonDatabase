<?php 

	include 'getData.php'; 

	$url = 'assets/data/pokedex.json';

	$output = get($url); 

	decode_local_file($output); 

	$test = getImg("500");

	echo $test; 

?>

 