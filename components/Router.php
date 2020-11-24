<?php

	class Router {
	
		private $routes = array(); 
		
		public function __construct() {
			require_once('./configs/routes.php');
			$this->routes = $routes; 
		}
		
		public function run() {
			// получаем строку, которую ввел пользователь
			$requestedUri = $_SERVER['REQUEST_URI'];
			if (strpos($requestedUri, 'admin')) {
				if (!AuthController::isAdmin()) {
					// TODO: make error page : 40(?) Not enough rights
					exit('У вас для просмотра нет прав!');
				} 
			}
			foreach ($this->routes as $controller => $paths) {
				foreach ($paths as $pattern => $action) {
					// подгоняем шаблоны из путей к строке, которую ввел пользователь
					$patternUri = RELATIVE_SITE_PATH . $pattern;
					if (preg_match("~$patternUri~", $requestedUri)) {
						// заменяем $1 и прочие маски регулярных выражений и отсекаем строчку до action и параметров
						$replacedAction  = preg_replace("~$patternUri~", $action, $requestedUri);
						// Создаем контроллер
						$requestedController = $controller . 'Controller';
						// Создаем массив из строки вида edit/5 => ['edit', 5];
						$urlParts = explode('/', $replacedAction);
						// Создаем action
						$requestedAction = 'action' . ucfirst(array_shift($urlParts)) ;
						// Создаем экземпляр класса
						$objController = new $requestedController();
						// Вызываем соответствующий метод соответствующего контроллера
						$objController->$requestedAction($urlParts);
						return;
					}
				}
			}
			// TO DO : make error page (404: Not found) 
		}
	
	}


?>