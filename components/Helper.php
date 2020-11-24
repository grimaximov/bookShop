<?php

	class Helper {
	
		public function generateToken($size = 32) {
			// TODO: расширить символьный класс  
			$symbols = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
			$symbols_length = count($symbols);
			$token = '';
			for ($i = 0; $i < $size; $i++) {
				$token .= $symbols[rand(0, $symbols_length - 1)];
			}
			return $token;
		}
		
		
	
	}




?>