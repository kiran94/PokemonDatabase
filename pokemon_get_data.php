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
	$getSprite = parseJSON($output, 'sprites')[0]['resource_uri']; 
	$sprite_url = getRaw("http://pokeapi.co/" . $getSprite); 
	$json_sprite_url = parseJSON($sprite_url,'')['image']; 
	

?>
<!DOCTYPE html> 
<html>
<head>
	<title><?php echo ucfirst($name_data_parsed['name']) . "| Pokemon Look Up";  ?></title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
	<?php 
		echo "<div class='sprite_name'>"; 
			echo "<img src='http://pokeapi.co/" . $json_sprite_url . "' alt='image' />"; 
			echo "<h1>" . ucfirst($name_data_parsed['name']) . "</h1>"; 
		echo "</div>"; 
		echo $description_data_parsed; 

		//MOVE TABLE. 
		echo "<table class='moves-table'>"; 
			echo "<th> Moves </th>"; 
			for($i=0; $i<sizeof($getMoves);$i++)
			{
				echo "<tr>"; 
				echo "<td><a href=/move_get_data?" . $getMoves[$i]['resource_uri'] . ">" . $getMoves[$i]['name'] . "</a></td>";
				echo "</tr>";  
			}
		echo "</table>"; 

		//ABILITIES 
		echo "<h3>Abilities</h3>";
		echo "<ul>"; 
			for($i=0;$i<sizeof($getAbilities);$i++)
			{
				echo "<li><a href=" . $getAbilities[$i]['resource_uri'] . ">" . $getAbilities[$i]['name'] . "</a></li>"; 
			}
		echo "</ul>"; 

		//Image Sprite

	?>
</body>
</html>