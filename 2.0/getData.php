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
			echo "<div class='col-xs-12 col-sm-1 pokemon_profile'>";
			echo $currentPokemon['ename']; 
			echo "<div class='pokemon_proile_id'>" . $currentPokemon['id'] . "</div>"; 
			//echo "assets/data/sprites/". ltrim($currentPokemon['id'])  . ".png";
			echo "<img src=assets/data/sprites/". ltrim($currentPokemon['id'], '0')  . ".png class='img-responsive'></img>"; 
			echo "</div>"; 
			
		}
	}

	//Function gets data from the poke api to get the image of the pokemon. 
	function getImg($pokemonID)
	{
		$url = "http://pokeapi.co/api/v1/sprite/" . $pokemonID; 

		$mediaJson = file_get_contents($url); 

		$mediaJson = json_decode($mediaJson, true); 

		$imageLocation = $mediaJson['image']; 

		$imgTagData = "<img src=http://pokeapi.co/" . $imageLocation  ." class='img-responsive'></img>";

		return $imgTagData; 
	}


	


	
?>