<!DOCTYPE html>
<html> 
	<head>
		<title> </title>
		<link rel="stylesheet" href="<?= LIBS . 'bootstrap/css/bootstrap.css'?>" />
	</head>
	<body> 
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			  <li class="nav-item <?= ($title == 'Книги') ? 'active': ''?>">
				<a class="nav-link" href="<?= FULL_SITE_PATH . 'books'; ?>">Книги</a>
			  </li>
			  <? if (AuthController::isAdmin()) : ?>
				  <li class="nav-item">
					<a class="nav-link" href="<?= FULL_SITE_PATH . 'authors/admin'; ?>">Админ панель</a>
				  </li>
			  <? endif; ?>
			  <li  class="nav-item"> 
				<a class="nav-link" href="<?= FULL_SITE_PATH . 'cart/view'; ?>">Корзина</a>
			  </li>
			  <? if (!AuthController::isAuthorized()): ?>
				  <li class="nav-item <?= ($title == 'Регистрация') ? 'active': ''?>">
					<a class="nav-link" href="<?= FULL_SITE_PATH . 'user/reg'; ?>">Регистрация</a>
				  </li>
			  <? else: ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= FULL_SITE_PATH . 'user/logout'; ?>">Выход</a>
				</li>
			  <? endif; ?>
			</ul>
		  </div>
		</nav>
	<?php 	// TODO: header ?>
	