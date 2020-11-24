<?php

	class Cart {
	
		public function addNew($order_id, $book_id, $book_count) {
			$connect = DB::getInstance();
			$query = "
				INSERT INTO `carts`
					SET `cart_order_id` = $order_id, 
						`cart_book_id` = $book_id, 
						`cart_book_count` = $book_count;
			";
			$result = $connect->query($query);
			return;
		}
		
		
	
	}

?>