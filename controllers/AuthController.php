<?php

	class AuthController {
		
		public function actionReg() {
			if (isset($_POST['email'])) {
				$email = htmlentities($_POST['email']);
				$password = htmlentities($_POST['password']);
				$repeat_password = htmlentities($_POST['repeat_password']);
				$errors = array();
				// TODO: проверить корректность email, пароля по регуляркам
				if ($password != $repeat_password) {
					$errors[] = 'Пароли должны совпадать!';
				}
				$objAuth = new Auth();
				if ($objAuth->checkIfExists($email)) {
					$errors[] = 'Такой email уже зарегистрирован';
				}
				if (empty($errors)) {
					$hashed_password = md5($password);
					$user_id = $objAuth->reg(compact('email', 'hashed_password'));
					$this->userAuth($user_id);
					header('Location: ../books');
				}
			}
			include_once('./views/auth/reg.php');
			return;
		}
		
		private function userAuth($user_id) {
			// Задаем переменные для добавления в таблицу connects 
			session_start();
			$helper = new Helper();
			$token = $helper->generateToken();
			$token_time = time() + 15*60;
			$session_id = session_id();
			$objAuth = new Auth();
			// Добавляем данные в connects 
			$objAuth->registerConnect(compact('token', 'session_id', 'user_id', 'token_time'));
			// Устанавливаем cookie
			setcookie('token', $token, time() + 30*24*60*60, '/');
			setcookie('user_id', $user_id, time() + 30*24*60*60, '/');
		}
		
		static public function isAuthorized() {
			if (isset($_COOKIE['user_id']) && isset($_COOKIE['token'])) {
				$user_id = $_COOKIE['user_id'];
				$token = $_COOKIE['token'];
				$objAuth = new Auth();
				$connect_info = $objAuth->getConnectInfo($user_id, $token);
				if ($connect_info) {
					if (time() > $connect_info['token_time']) {
						$helper = new Helper();
						$new_token = $helper->generateToken();
						$new_token_time = time() + 15 * 60;
						$objAuth->updateConnectInfo($connect_info['id'], $new_token, $new_token_time);
						setcookie('token', $new_token, time() + 30*24*60*60, '/');
					}
					return true;
				}
			} 
			return false;
		}
		
		public function actionAuth() {
			// TODO реализовать авторизацию
		
		}
		
		public function actionLogout() {
			// TODO реализовать выход
		}
		
		static public function isAdmin() {
			if (self::isAuthorized()) {
				$user_id = $_COOKIE['user_id'];
				$objUser = new User();
				$user_info = $objUser->getUserInfoById($user_id);
				if ($user_info['user_role_id'] == 4) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			
			}
		
		}
	
	}

?>