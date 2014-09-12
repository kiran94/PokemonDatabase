<?php

	function getRaw($url)
	{
		$output = file_get_contents($url); 
		return $output; 
	}

	function parseJSON($output, $extracter)
	{
		$data = json_decode($output, true); 
		$pokemon = $data[$extracter]; 
		return $pokemon; 
	}

	function storeKeys($pokemon)
	{
		$urls = array(); 
		for($currentPokemon=0; $currentPokemon<sizeof($pokemon); $currentPokemon++)
		{
			$urls[$pokemon[$currentPokemon]["name"]] = $pokemon[$currentPokemon]["resource_uri"];

		}
		return $urls; 
	}

?>