<?php

	class BookController {
		
		public function actionIndex() {
			$objBook = new Book();
			$books = $objBook->getAll();
			$title = 'Книги';
			include_once('./views/books/index.php');
			return;
		}
		
		public function actionEdit($arr) {
			$book_id = $arr[0];
			if (isset($_POST['book_name'])) {
				
			
			}
			$objBook = new Book();
			$book = $objBook->getBookById($book_id);
			$objPublisher = new Publisher();
			$publishers = $objPublisher->getAll();
			$objAuthor = new Author();
			$authors = $objAuthor->getAll();
			//print_r($book);
			include_once('./views/books/edit.php');
		}
	
	}

?>