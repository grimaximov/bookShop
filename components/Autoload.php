<?php

	spl_autoload_register(function ($class) {
		$directories = array('controllers', 'components', 'models');
		foreach ($directories as $dir) {
			$path = './' . $dir . '/' . $class . '.php';
			if (file_exists($path)) {
				include_once($path);
				return;
			}
		}
	});


?>