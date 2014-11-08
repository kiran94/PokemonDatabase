<?php 

	function get($filename)
	{
		//Open the file.
		$data = fopen($filename, 'r'); 
		//Read from the file. 
		$data_output = fread($data, filesize($filename)); 
		return $data_output; 

	}

	function decode_local_file($data_output)
	{
		$data = json_decode($data_output, true); 

		foreach($data as $currentPokemon)
		{
			echo $currentPokemon['ename']; 
			echo "<br />"; 
		}
	}

	//Function gets data from the poke api to get the image of the pokemon. 
	function getImg($pokemonID)
	{
		$url = "http://pokeapi.co/api/v1/sprite/" . $pokemonID; 

		$mediaJson = file_get_contents($url); 

		$mediaJson = json_decode($mediaJson, true); 

		$imageLocation = $mediaJson['image']; 

		$imgTagData = "<img src=http://pokeapi.co/" . $imageLocation  ."></img>";

		return $imgTagData; 
	}


	


	
?>