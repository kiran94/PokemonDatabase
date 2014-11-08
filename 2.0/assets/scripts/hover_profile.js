$(document).ready(function()
{

	$('.pokemon_profile').on('mouseover', function()
	{

		$(this).css( "backgroundColor", "red" );
	}); 

	$('.pokemon_profile').on('mouseout', function()
	{

		$(this).css( "backgroundColor", "white" );
	}); 
	

}); 