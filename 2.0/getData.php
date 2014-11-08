<?php 

	function get($filename)
	{
		//Open the file.
		$data = fopen($filename, 'r'); 
		//Read from the file. 
		$data_output = fread($data, filesize($filename)); 
		return $data_output; 

	}
?>