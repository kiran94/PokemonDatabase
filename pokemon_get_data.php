<?php

	$pokemon_url = $_POST['pokemon']; 

	include 'getData.php'; 

	//Get the data from the site. 
	$output = getRaw("http://pokeapi.co/" . $pokemon_url); 
	//Parse into a JSON object. 
	$jsonObj = parseJSON($output, 'descriptions'); 

	$descriptions = $jsonObj[0]['resource_uri']; 

	echo $descriptions; 


?>