<?php

	$hostname="localhost";
	$username="root";
	$password="";
	$db_name="dentist1";

	$mysqli=new mysqli($hostname,$username,$password,$db_name);

	//check connection
	if($mysqli->connect_errno){
		print"Failed to connect to MYSQL:(".$mysqli->connect_errno.")" .$mysqli->connect_errno;
	}
		// echo"DB connection Successful";
?>