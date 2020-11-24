<?php

	class Author {
	
		public function getAll() {
			$connect = DB::getInstance();
			$result = $connect->query("SELECT * FROM `authors`");
			return $result;
		}
		
		public function add($author_name) {
			$connect = DB::getInstance();
			$query = "INSERT INTO `authors` SET `author_name` = '$author_name';";
			$result = $connect->query($query);
			return true;
		}
	
	}

?>