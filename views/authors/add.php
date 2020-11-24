	<?php // include_once('header.php'); ?>
	<div class="errors" style="color: red;">
		<? if (!empty($errors)): ?>
			<? foreach ($errors as $error): ?>
				<p> <?= $error; ?></p>
			<? endforeach; ?>
		<? endif; ?>
	</div>
	<form method="POST"> 
		<input type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name']: '' ?>"/> <br>
		<input type="submit" value="Добавить" />
	</form>
	<?php // include_once('footer.php'); ?>