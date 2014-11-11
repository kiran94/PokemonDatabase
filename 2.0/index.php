<!DOCTYPE html> 
<html lang='en'>
<head>
	<title>Pokemon Database</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- STYLE -->
		<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
	<!-- END STYLE -->


</head>
<body>

	

	<div class='container-fluid'>

		<div class='row'>
			<div class='col-xs-12'><h1 id='title'>Pokemon Database</h1></div>
			<hr class='rule' />
		</div>

		<div class='row' id='marginleft'>

			<?php 

				include 'getData.php'; 

				$url = 'assets/data/pokedex.json';

				$output = get($url); 

				decode_local_file($output); 
				
			?>


		<!-- END ROW -->
		</div>


		<div class='row'>
			
			<hr class='rule' />
		</div>

	<!-- END CONTAINER -->
	</div>



	<!-- SCRIPTS -->
		<!-- //<script type="text/javascript"></script> -->
		<script type="text/javascript" src='//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
		<script type="text/javascript" src='assets/scripts/hover_profile.js'></script>
	<!-- END SCRIPTS -->

</body>
</html>