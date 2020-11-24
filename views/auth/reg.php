	<? include_once('./views/templates/header.php'); ?>
	<? if (!empty($errors)): ?> 
		<div class="errors" style="color: red;">
			<? foreach ($errors as $error): ?>
				<p> <?= $error; ?></p>
			<? endforeach; ?>	
		</div>
	<? endif; ?>
	
	<form method="POST">
		<div class="form-group">
			<label for="exampleInputEmail1">Email</label>
			<input type="email" class="form-control" name="email" aria-describedby="emailHelp">
			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>
		Пароль: <input  type="password" name="password"> <br>
		Повторите пароль: <input type="password" name="repeat_password"> <br>
		<input type="submit" value="Зарегистрироваться">
	</form>
	
	<? include_once('./views/templates/footer.php'); ?>