<?php     require_once("/../modelo/cotacao/cotacaoSql.php");

	class Mercadoria
	{
		//Atributos
		private $id;
		private $descricaoMercadoria;
		private $peso;
		private $objCotacao;


		//Id Mercadoria
		public function setId($l)
		{
			$this -> id = trim($l);
		}

		public function getId()
		{
		  return $this -> id;
		}

		//Descricao Mercadoria
		public function setDescricaoMercadoria($descricaoMercadoria)
		{
			$this -> descricaoMercadoria = trim($descricaoMercadoria);
		}

		public function getDescricaoMercadoria()
		{
			return $this -> descricaoMercadoria;
		}

		//peso Mercadoria
		public function setPeso($peso)
		{
			$this -> peso = trim($peso);
		}

		public function getPeso()
		{
			return $this -> peso;
		}

		//Id Cotacao
		public function setObjCotacao($objCotacao)
		{
		   $this->objCotacao = trim($objCotacao);
		}

		public function getObjCotacao()
		{
			if($this->objCotacao == null)
			{
				$this->objCotacao = new Cotacao();
			}
			return $this->objCotacao;
		}
	}

?>
