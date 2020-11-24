<?php

	$routes = array(
		'Book' => array(
			'book/view/([0-9]+)' => 'view/$1',
			'book/admin/edit/([0-9]+)' => 'edit/$1',
			'book/admin/add' => 'add',
			'book/admin/delete/([0-9]+)' => 'delete/$1',
			'books' => 'index'
		),
		'Author' => array(
			'author/admin/view/([0-9]+)' => 'view/$1',
			'author/admin/edit/([0-9]+)' => 'edit/$1',
			'author/admin/add' => 'add',
			'author/admin/delete/([0-9]+)' => 'delete/$1',
			'authors/admin' => 'index'
		),
		'Auth' => array(
			'user/reg' => 'reg',
			'user/auth' => 'auth',
			'user/logout' => 'logout'
		),
		'User' => array(
			'cart/view' => 'cartView',
			'cart/order' => 'cartOrder'
		)
	)
	// 1 - ый ключ - название контроллера, т.е. значение Books, Authors ...
	// 2 - ой ключ - url пользователя, т.е. адрес страницы
	// значение - название метода + дополнительные параметры
	// пример localhost/pavp/oop/books => 'BooksController', 'actionIndex'
?>