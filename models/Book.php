<?php

	class Book {
	
		public function getAll($options = []) {
			$connect = DB::getInstance();
			if (empty($options)) {
				$query = (new Select('books'))
					->build(); // SELECT * FROM `books`;
			} else {
				$query = (new Select('books'))
					->where($options['where'])
					->build();
			}

			$result = $connect->query($query);
			return $result;
		}
	
		public function getBookById($id) {
			$connect = DB::getInstance();
			$query = (new Select('books'))
						->what(array(
							'id' => '`book_id`',
							'name' => '`book_name`',
							'publisher_id' => '`book_publisher_id`',
							'publisher' => '`publisher_name`',
							'language_id' => '`book_language_id`',
							'language' => '`language_name`',
							'restriction_id' => '`book_restriction_id`',
							'restriction' => '`restriction_name`',
							'price' => '`book_price`',
							'pages' => '`book_pages`',
							'count' => '`book_count`',
							'description' => '`book_description`',
							'coverage' => '`book_coverage`',
							'year' => '`book_year`',
							'isbn' => '`book_isbn`',
							'avg_mark' => 'book_avg_mark',
							'author_ids' => 'GROUP_CONCAT(DISTINCT `author_id`)',
							'author_names' => 'GROUP_CONCAT(DISTINCT `author_name`)',
							'genre_ids' => 'GROUP_CONCAT(DISTINCT `genre_id`)',
							'genre_names' => 'GROUP_CONCAT(DISTINCT `genre_name`)',
						))
						->joins(array(
							array('LEFT', 'publishers', 'publisher_id', 'book_publisher_id'),
							array('LEFT', 'languages', 'language_id', 'book_language_id'),
							array('LEFT', 'restrictions', 'restriction_id', 'book_restriction_id'),
							array('LEFT', 'books_authors', 'book_author_book_id', 'book_id'),
							array('LEFT', 'authors', 'book_author_author_id', 'author_id'),
							array('LEFT', 'books_genres', 'book_genre_book_id', 'book_id'),
							array('LEFT', 'genres', 'book_genre_genre_id', 'genre_id')
						))
						->where("WHERE `book_id`  = $id")
						->groups('book_id')
						->build();
				$result = $connect->query($query);
				$book = $result->fetch(PDO::FETCH_ASSOC);
				return $book;
		}
	
		
	}

?>