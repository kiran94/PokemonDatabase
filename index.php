<!DOCTYPE html>
<html>
<head>
	<title>Pokemon Database</title>
	<!-- <link rel="stylesheet" type="text/css" href="/global.css" /> -->
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>

	<!-- HEADER -->
	<div class='header'>
		<h1 class='title'>Pokemon Database<span>By Kiran Patel</span></h1>
	</div>
	<!-- END HEADER -->

	<!-- CONTENT -->
	<div class='search'>
		<form method='POST' action='pokemon_get_data.php'>
			<select name='pokemon'>
				<?php 
					include 'getData.php'; 

					$output = getRaw("http://pokeapi.co/api/v1/pokedex/1/"); 
					$pokemon = parseJSON($output, "pokemon"); 
					$urls = storeKeys($pokemon); 


					foreach($urls as $name => $url)
					{
						echo "<option value=". $url . ">" . $name . "</option>";
					}

				?>
			</select>

			<input type='submit' value='Submit' />
		</form>
		
	</div>
	<!-- END CONTENT -->

	<!-- FOOTER -->
	<div class='footer'>

	</div>
	<!-- END FOOTER -->

</body>
</html>