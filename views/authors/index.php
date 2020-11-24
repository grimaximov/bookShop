	<? include_once('./views/templates/admin_header.php'); ?>
	<div class="container"> 
		<table class="table table-stripped table-bordered table-dark"> 
			<thead> 
				<tr> 
					<td> ID </td>
					<td> ФИО </td>
					<td colspan="2"> Действия </td>
				</tr>
			</thead> 
			<tbody>
				<? foreach ($authors as $author): ?>
					<tr> 
						<td> <?= $author['author_id']; ?></td>
						<td> <?= $author['author_name']; ?> </td>
						<td> 
							<button class="btn btn-light" href="<?= FULL_SITE_PATH . 'author/edit/' . $author['author_id']; ?>"> 
								Редактировать 
							</button> 
						</td>
						<td> 
							<button class="btn btn-light" href="<?= FULL_SITE_PATH . 'author/delete/' . $author['author_id']; ?>"> 
								Удалить 
							</button>
						</td>
					</tr>
				<? endforeach; ?>
			</tbody>
		</table>
	</div>
	<? include_once('./views/templates/footer.php'); ?>