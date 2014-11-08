<?php 

	include 'getData.php'; 

	$url = 'assets/data/pokedex.json';

	$output = get($url); 

	echo $output; 

?>

 