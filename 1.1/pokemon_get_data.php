
<?php
	if(!isset($_POST['pokemon']))
	{
		header('Location: index.php'); 
	}


	<?php


	$pokemon_url = $_POST['pokemon']; 
	
	include 'getData.php'; 

	//Get the data from the site. 
	$output = getRaw("http://pokeapi.co/" . $pokemon_url); 
	//Parse into a JSON object. 
	$jsonObj = parseJSON($output, 'descriptions'); 

	$descriptions_url = $jsonObj[0]['resource_uri']; 

	//echo $descriptions_url; 

	$description_data = getRaw("http://pokeapi.co/" . $descriptions_url); 

	$name_data_parsed = parseJSON($description_data, 'pokemon'); 
	

	$description_data_parsed = parseJSON($description_data, 'description'); 


	//GET MOVES
	$getMoves = parseJSON($output, 'moves'); 

	//GET Abilities
	$getAbilities = parseJSON($output, 'abilities'); 

	//GET Image 

	$getSprite_data_1 = parseJSON($output, 'sprites');
	$getSprite_data = $getSprite_data_1[0]; 

	$getSprite = $getSprite_data['resource_uri']; 

	$sprite_url = getRaw("http://pokeapi.co/" . $getSprite); 
	$json_sprite_url_data = parseJSON($sprite_url,''); 
	$json_sprite_url = $json_sprite_url_data['image']; 

	// $getSprite = parseJSON($output, 'sprites')[0]['resource_uri']; 
	// $sprite_url = getRaw("http://pokeapi.co/" . $getSprite); 
	// $json_sprite_url = parseJSON($sprite_url,'')['image']; 

	
	//GET STAT 
	$getStats = parseJSON($output, '');
	$hp = $getStats['hp'];   
	$attack = $getStats['attack'];
	$defense = $getStats['defense']; 
	$spAtk = $getStats['sp_atk']; 
	$spDef = $getStats['sp_def']; 
	$speed = $getStats['speed']; 

	$pokedex_id = $getStats['national_id']; 
	$weight = $getStats['weight']; 
	$height = $getStats['height']; 


	$type_data_1 = parseJSON($output, 'types');
	$type_data = $type_data_1[0]; 

	$type = ucfirst($type_data['name']); 

	



?>

<!DOCTYPE html> 
<html>
<head>
	<title><?php echo ucfirst($name_data_parsed['name']) . "| Pokemon Look Up";  ?></title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />

	<meta charset="UTF-8" />
</head>
<body>

	
	<?php 
		include 'navbar.php'; 
		
		echo "<div class='sprite_name'>"; 
			echo "<img src='http://pokeapi.co/" . $json_sprite_url . "' alt='image' />"; 
			echo "<h1>" . ucfirst($name_data_parsed['name']) . "</h1><span><em>[" . $type . "]</em></span>"; 
		echo "</div>"; 

		echo "<div class='attr_title'>"; 
			echo "<h3>Description</h3>";
			echo $description_data_parsed; 

			echo "<br/>"; 
			echo "<br/>"; 
			echo "Pokedex ID: " . $pokedex_id;
			echo "<br/>"; 

			echo "Height: " . $weight; 
			echo "<br/>"; 

			echo "Weight: " . $height;  
		echo "</div>"; 

		echo "<div class='attr_title'>"; 
			echo "<h3>Stats</h3>";

			echo "<table>"; 

			echo "<tr>";
			echo "<th>Attack</th>"; 
			echo "<td>" . $attack . "</td>"; 
			echo "</tr>"; 

			echo "<tr>";
			echo "<th>Defense</th>"; 
			echo "<td>" . $defense . "</td>"; 
			echo "</tr>"; 

			echo "<tr>";
			echo "<th>Special Attack</th>"; 
			echo "<td>" . $spAtk . "</td>"; 
			echo "</tr>"; 

			echo "<tr>";
			echo "<th>Special Defense</th>"; 
			echo "<td>" . $spDef . "</td>"; 
			echo "</tr>"; 

			echo "<tr>";
			echo "<th>Speed</th>"; 
			echo "<td>" . $speed . "</td>"; 
			echo "</tr>"; 


			echo "</table>"; 

			
		echo "</div>"; 


		//MOVE TABLE. 
		// echo "<table class='moves-table'>"; 
		echo "<div class='attr_title'>"; 
			echo "<h3> Moves </h3>"; 
			for($i=0; $i<sizeof($getMoves);$i++)
			{
				// echo "<tr>"; 
				if($i%2==0)
				{
					echo "<span class='stand_out_text'>"; 
				}
				echo "<td><a href=move_get_data.php?move_url=" . $getMoves[$i]['resource_uri'] . ">" . $getMoves[$i]['name'] . "</a></td>";
				
				if($i%2==0)
				{
					echo "<span>"; 
				}

				if($i!=sizeof($getMoves)-1)
				{
					echo ","; 
				}
				
				// echo "</tr>";  
			}
		// echo "</table>";
		echo "</div>";  

		//ABILITIES 
		echo "<div class='attr_title'>"; 
			echo "<h3>Abilities</h3>";
			echo "<ul>"; 
				for($i=0;$i<sizeof($getAbilities);$i++)
				{
					echo "<li><a href=" . $getAbilities[$i]['resource_uri'] . ">" . $getAbilities[$i]['name'] . "</a></li>"; 
				}
			echo "</ul>"; 
		echo "</div>"; 

		//Image Sprite

	?>
</body>
</html>