	<form method="POST">
		<!-- TODO: make all form --> 
		Название <input type="text" name="book_name" value="<?= $book['name']; ?>"> <br>
		Цена <input type="text" name="book_price" value="<?= $book['price']?>" > <br>
		Кол-во стр <input type="text" name="book_count" value="<?= $book['count']?>" > <br>
		Описание <input type="text" name="book_description" value="<?= $book['description']?>" > <br>
		Обложка <input type="text" name="book_coverage" value="<?= $book['coverage']?>" > <br>
		Год <input type="text" name="book_year" value="<?= $book['year']?>" > <br>
		ISBN <input type="text" name="book_isbn" value="<?= $book['isbn']?>" > <br>
		Издатель 
			<select name="book_publisher"> 
				<? foreach ($publishers as $publisher): ?>
					<option value="<?= $publisher['publisher_id']; ?>" <?= ($publisher['publisher_id'] == $book['publisher_id']) ? 'selected': ''?>> <?= $publisher['publisher_name']; ?> </option>
				<? endforeach; ?>
			</select> <br>
		Авторы: 
			<select name="book_authors[]" multiple> 
				<? foreach ($authors as $author): ?>
					<option value="<?= $author['author_id']; ?>" <?= (in_array($author['author_id'], explode(',', $book['author_ids']))) ? 'selected': ''?>> <?= $author['author_name']; ?> </option>
				<? endforeach; ?>
			</select> <br>
		<input type="submit" value="Сохранить"> 
	</form>