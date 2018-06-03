<?php
	define("MYSQLI_HOST", "localhost");
	define("MYSQLI_USER", "root");
	define("MYSQLI_PASS", "");
	define("MYSQLI_DB", "Veb2");
    mysql_query("SET CHARACTER SET utf8");
 	
	function connect(){
		global $link;
		$link = mysqli_connect(MYSQLI_HOST, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB) or die("Doslo je do greske pilikom povezivanja na bazu!" . mysqli_connect_error());	
	}
?>