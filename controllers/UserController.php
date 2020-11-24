<?php

	class UserController {
		
		public function actionCartView() {
			if (isset($_COOKIE['cart'])) {
				$cookieCart = $_COOKIE['cart'];
				$cookieCart = json_decode($cookieCart, true);
				$book_ids = array_keys($cookieCart);
				$bookObj = new Book();
				$books = $bookObj->getAll(array('where' => 'WHERE `book_id` IN (' . implode(',',$book_ids) . ')'));
			} 
			include_once('./views/carts/view.php');
		}
		
		public function actionCartOrder() {
			$cookieCart = $_COOKIE['cart'];
			$cookieCart = json_decode($cookieCart, true);
			$orderObj = new Orders();
			$order_id = $orderObj->addNew();
			$cartObj = new Cart();
			foreach ($cookieCart as $bookId => $bookCount) {
				$cartObj->addNew($order_id, $bookId, $bookCount);
			}
		}

		
	
	}

?>