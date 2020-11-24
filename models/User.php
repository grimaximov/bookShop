<?php

	class User {
	
		public function getUserInfoById($id) {
			$connect = DB::getInstance();
			$query =  (new Select('users'))
						->where("WHERE `user_id` = $id")
						->build();
			$result = $connect->query($query);
			$user_info = $result->fetch(PDO::FETCH_ASSOC);
			return $user_info;
		}
		
		
	
	}

?>