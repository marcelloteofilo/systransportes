<?php
	class Cheque {
		//Atributos da classe Cheque
		private $id;
		private $parcela; 
		private $numero;
		private $valor;
		private $vencimento;

		//Método responsável para definir o id do cheque
		public function setId($id) {
			$this->id = trim($id);
		}

		//Método responsável para obter o id do cheque
		public function getId() {
			return $this->id;
		}

		//Método responsável para definir a parcela do cheque
		public function setParcela($parcela) {
			$this->parcela = trim($parcela);
		}

		//Método responsável para obter a parcela do cheque
		public function getParcela() {
			return $this->parcela;
		}

		//Método responsável para definir o número do cheque
		public function setNumero($numero) {
			$this->numero = trim($numero);
		}

		//Método responsável para obter o número do cheque
		public function getNumero() {
			return $this->numero;
		}

		//Método responsável para definir o valor do cheque
		public function setValor($valor) {
			$this->valor = trim($valor); 
		}

		//Método responsável para obter o valor do cheque
		public function getValor() {
			return $this->valor;
		}

		//Método responsável para definir o vencimento do cheque
		public function setVencimento($vencimento) {
			$this->vencimento = trim($vencimento);
		}

		//Método responsável para obter o vencimento do cheque
		public function getVencimento() {
			return $this->vencimento;
		}
	}
?>