<?php

	class Auth {
	
		public function reg($arr = []) {
			$connect = DB::getInstance();
			$query = "
				INSERT INTO `users`
					SET `user_email` = '$arr[email]', 
						`user_password` = '$arr[hashed_password]'
			";
			$result = $connect->query($query);
			$user_id = $connect->lastInsertId();
			return $user_id;
		}
		
		public function checkIfExists($email) {
			$connect = DB::getInstance();
			$query = (new Select('users'))
						->what(array('count' => 'count(*)'))
						->where("WHERE `user_email` = '$email'")
						->build();
			$result = $connect->query($query);
			$result = $result->fetch(PDO::FETCH_ASSOC);
			return $result['count'];
		}
		
		public function registerConnect($arr = []) {
			$connect = DB::getInstance();
			$query = "
				INSERT INTO `connects`
					SET `connect_token` = '$arr[token]', 
						`connect_session` = '$arr[session_id]',
						`connect_user_id` = $arr[user_id], 
						`connect_token_time` = FROM_UNIXTIME($arr[token_time]);
			";
			$connect->query($query);
			return;
		}
		
		public function getConnectInfo($user_id, $token) {
			$connect = DB::getInstance();
			$query = (new Select('connects'))
						->what(array('token_time' => 'UNIX_TIMESTAMP(connect_token_time)', 'id' => 'connect_id'))
						->where("WHERE `connect_token` = '$token' AND `connect_user_id` = $user_id")
						->build();
			$result = $connect->query($query);
			$connect_info = $result->fetch(PDO::FETCH_ASSOC);
			return $connect_info;
		}
		
		public function updateConnectInfo($id, $token, $token_time) {
			$connect = DB::getInstance();
			$query = "
				UPDATE `connects`
					SET `connect_token` = '$token', 
						`connect_token_time` = FROM_UNIXTIME($token_time)
					WHERE `connect_id` = $id;
			";
			$connect->query($query);
		}
	
	}

?>