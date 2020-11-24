<?php

	final class DB extends PDO {
		static private $instance; 
		
		private function __construct() {
			include_once('./configs/database.php');
			$dsn = "$db_const[engine]:host=$db_const[host];dbname=$db_const[dbname];charset=$db_const[charset]";
			$user = $db_const['user_name'];
			$password = $db_const['user_password'];
			$dbc = parent::__construct($dsn, $user, $password);
			return $dbc;
		}
		
		static public function getInstance() {
			if (!self::$instance) {
				self::$instance = new self();
			}
			return self::$instance;
		}
	
	}
	
?>