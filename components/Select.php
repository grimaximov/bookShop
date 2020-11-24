<?php

	class Select {
	
		private $what = '*';
		private $from; 
		private $joins = '';
		private $where = '';
		private $group = '';
		private $having = '';
		private $order = '';
		private $limit = '';
		
		public function __construct($table) {
			$this->from = $table;
			return $this;
		}
		
		public function what($data = []) {
			$what = '';
			foreach ($data as $key => $value) {
				if (is_numeric($key)) {
					$what .= "$value, ";
				} else {
					$what .= "$value AS $key, ";
				}
			}
			// убираем последнюю запятую с пробелом
			$what = rtrim($what, ', ');
			$this->what = $what;
			return $this;
		}
		
		public function joins($data = []) {
			$joins = '';
			foreach ($data as $join) {
				$joins .= "$join[0] JOIN `$join[1]` ON `$join[2]` = `$join[3]`";
			} 
			$this->joins = $joins;
			return $this;
		}
		
		// TODO: перевести строку в массив
		// 'WHERE id = 5 OR id > 10'; array( 'id > ' => 5, 'or' => array('id > ' => 10)) 
		public function where($str = '') {
			
			$this->where = $str;
			return $this;
		} 
		
		public function groups($str = '') {
			$this->group = "GROUP BY `$str`";
			return $this;
		}
		
		// TODO: перевести строку в массив
		public function having($str = '') {
			$this->having = $str;
			return $this;
		}
		
		// ORDER BY `book_id` ASC =>  `book_id` true 
		public function orders($field, $reversive = false) {
			$sort = ($reversive) ? 'DESC' : 'ASC';
			$this->order = "ORDER BY `$field` $sort";
			return $this;
		}
		
		// LIMIT 5 => LIMIT 0, 5
		public function limit($count, $offset = 0) {
			$this->limit = "LIMIT $offset, $count";
			return $this;
		}
		
		public function build() {
			$str = "
				SELECT {$this->what}
				FROM {$this->from}
				{$this->joins}
				{$this->where}
				{$this->group}
				{$this->having}
				{$this->order}
				{$this->limit};
			";
			return $str;
		}
		
		
	
	}




?>