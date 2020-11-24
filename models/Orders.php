<?php

	class Orders {
	
		public function addNew() {
			$connect = DB::getInstance();
			$query = "
				INSERT INTO `orders`
					SET `order_status_id` = 1, 
						`order_number` = 101;
			";
			$result = $connect->query($query);
			$orderId = $connect->lastInsertId();
			return $orderId;
		}
		
		
	
	}

?>