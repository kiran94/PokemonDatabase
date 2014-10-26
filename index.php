<!DOCTYPE html>
<html>
<head>
	<title>Pokemon Database</title>
	<!-- <link rel="stylesheet" type="text/css" href="/global.css" /> -->
	<link rel="stylesheet" type="text/css" href="style/style.css" />

	<meta charset="UTF-8">
</head>
<body>
	<?php include 'navbar.php'; ?>

	

	<!-- CONTENT -->
	<div class='search'>
		<form method='POST' action='pokemon_get_data.php'>

			<select name='pokemon' id='searchbar'>
				<?php 
					include 'getData.php'; 

					$output = getRaw("http://pokeapi.co/api/v1/pokedex/1/"); 
					$pokemon = parseJSON($output, "pokemon"); 
					$urls = storeKeys($pokemon); 

					$counter = 0; 

					foreach($urls as $name => $url)
					{
						if($counter==1)
						{
							echo "<option selected='selected' value=". $url . ">" . ucfirst($name) . "</option>";
						}
						else
						{
							echo "<option value=". $url . ">" . ucfirst($name) . "</option>";
						}

						$counter++; 



				?>
			</select>




			<input type='submit' value='Submit' id='searchbar_submit'/>
		</form>
		
	</div>
	<!-- END CONTENT -->

	<!-- FOOTER -->
	<div class='footer'>

	</div>
	<!-- END FOOTER -->

</body>
</html>