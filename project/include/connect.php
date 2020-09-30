<?php
	session_start();
	$con = mysqli_connect("localhost","root","","db_project");
	if(!$con)
	{
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		exit;
	}
	
?>