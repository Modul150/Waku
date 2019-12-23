<?php
	$host = 'localhost';
	$username = 'wakoUser';
	$password = 'wakoUser';
	$database = 'wako_neu';

	$connection = mysqli_connect($host, $username, $password, $database) or die("Fehler beim Verbinden mit der Datenbank");
	$db = mysqli_select_db($connection, $database) or die("Fehler biem Ausw&auml;hlen der Datenbank");
?>