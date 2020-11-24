<?php

	class AuthorController {
		
		public function actionIndex() {
			$objAuthor = new Author();
			$authors = $objAuthor->getAll();
			$title = 'Авторы';
			include_once('./views/authors/index.php');
			return;
		}
		
		public function actionAdd() {
			if (isset($_POST['name'])) {
				$author_name = htmlentities($_POST['name']);
				$errors = array();

				if (strlen($author_name) < 2 || strlen($author_name) > 255) {
					$errors[] = 'Имя автора указано не верно. Длина строки должна быть от 2 до 255';
				}

				if (empty($errors)) {
					$objAuthor = new Author();
					$result = $objAuthor->add($author_name);
					if ($result) {
						header('Location: ../../authors');
					} else {
						$errors[] = 'Автор не был добавлен';
					}
				}
			}
			include_once('./views/authors/add.php');
		}
	
	}

?>