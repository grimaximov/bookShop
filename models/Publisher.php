<?php

	class Publisher {
	
		public function getAll() {
			$connect = DB::getInstance();
			$query = (new Select('publishers'))
						->build();
			$result = $connect->query($query);
			return $result;
		}
	
	
	}

?>