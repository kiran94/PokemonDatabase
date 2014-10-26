<?php 

	include 'getData.php'; 
	$move_url = $_GET['move_url']; 

	$output = getRaw("http://pokeapi.co/" . $move_url); 

	$move_data_raw = parseJSON($output, ''); 



	$move_name = $move_data_raw['name']; 

?>

<!DOCTYPE html> 
<html>
<head>
	<title><?php echo ucfirst($move_name) . "Pokemon Database" ?>></title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
	<meta charset="UTF-8">
</head>
<body>

	<?php 
		include 'navbar.php'; 
		echo "<h1>" . $move_name . "</h1>"; 

		echo $move_data_raw['description']; 


		echo "<div class='attr_title'>"; 
		echo "<table>"; 
			echo "<tr>";
			echo "<th>Power</th>"; 
			echo "<td>" . $move_data_raw['power'] . "</td>"; 
			echo "</tr>";  

			echo "<tr>";
			echo "<th>PP</th>"; 
			echo "<td>" . $move_data_raw['pp'] . "</td>"; 
			echo "</tr>";  

			echo "<tr>";
			echo "<th>Accuracy</th>"; 
			echo "<td>" . $move_data_raw['accuracy'] . "</td>"; 
			echo "</tr>";  
		echo "</table>"; 
		echo "</div>"; 


	?>

</body>
</html>