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
	$getMoves = parseJSON($output, 'moves')
?>
<!DOCTYPE html> 
<html>
<head>
	<title><?php echo ucfirst($name_data_parsed['name']) . "| Pokemon Look Up";  ?></title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
	<?php 
		echo "<h1>" . ucfirst($name_data_parsed['name']) . "</h1>";  
		echo $description_data_parsed; 

		echo "<table class='moves-table'>"; 
		echo "<th> Moves </th>"; 
		for($i=0; $i<sizeof($getMoves);$i++)
		{
			echo "<tr>"; 
			echo "<td><a href=/move_get_data?" . $getMoves[$i]['resource_uri'] . ">" . $getMoves[$i]['name'] . "</a></td>";
			echo "</tr>";  
		}
		echo "</table>"
	?>
</body>
</html>