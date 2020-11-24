	<table border="1"> 
		<thead> 
			<tr> 
				<th> Название </th>
				<th> Цена </th>
				<th> Количество </th>
			</tr>
		</thead> 
		<tbody>
			<? foreach ($books as $book): ?>
				<tr> 
					<td> <?= $book['book_name']; ?></td>
					<td> <?= $book['book_price']; ?> </td>
					<td> <?= $cookieCart[$book['book_id']]; ?> </td>
				</tr>
			<? endforeach; ?>
		</tbody>
	</table>
	
	<button onclick="orderItems()"> Заказать </button>
	
	<script> 
	
		function orderItems() {
			window.location.href ="./order";
		}
		
	</script>
	