<?php

/**
 * Database
 * 
 * A connection to the database
 */
class Database
{

	/**
	 * Get the database connection
	 * 
	 * @return PDO object Connection to the database server
	 */
	public function getConn()
	{
		$db_host = "host.docker.internal";
		$port = 3306;
		$db_name = "demo";
		$db_user = "root";
		$db_password = "123456";

		$dsn = "mysql:host=$db_host;port=$port;dbname=$db_name;charset=UTF8";

		try {
			$db = new PDO($dsn, $db_user, $db_password);

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $db;
		} catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
}