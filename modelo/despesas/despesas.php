<?php
	class Despesas {
		//Atributos da classe Veículo
		private $id;
		private $descricao;
		private $valor;
		private $data;
		

		
		public function setId($id) {
			$this -> id = trim($id);
		}

		
		public function getId() {
			return $this -> id;
		}

		
		public function setDescricao($descricao) {
			$this -> descricao = trim($descricao);
		}

		
		public function getDescricao() {
			return $this -> descricao;
		}	

		
		public function setValor($valor) {
			$this -> valor = trim($valor);
		}

		
		public function getValor() {
			return $this -> valor;
		}		

		
		public function setData($data) {
			$this -> data = trim($data);
		}

		
		public function getData() {
			return $this -> data;
		}
	}
?>