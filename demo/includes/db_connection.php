<?php
/**
 * Get the database connection
 * 
 * @return bool|mysqli  Connection to a MySQL server
 */
function getDB()
{
	$db_host = "host.docker.internal";
	$port = 3306;
	$db_name = "demo";
	$db_user = "root";
	$db_password = "123456";

	$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name, $port);

	if (mysqli_connect_error()) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}

	return $conn;
}
?>