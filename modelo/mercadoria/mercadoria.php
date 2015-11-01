<?php

//require_once("/opt/lampp/htdocs/systransportes/modelo/carga/carga.php");
    require_once("/../../modelo/carga/carga.php");

    class Mercadoria
    {
        //Atributos
        private $id;
        private $descricaoMercadoria;
        private $pesoMercadoria;
        private $objCarga;
        private $quantidade;
        private $valorMercadoria;

        //Id
        public function setId($l)
        {
            $this->id = trim($l);
        }

        public function getId()
        {
            return $this->id;
        }

        //Descricao
        public function setDescricaoMercadoria($descricaoMercadoria)
        {
            $this->descricaoMercadoria = trim($descricaoMercadoria);
        }

        public function getDescricaoMercadoria()
        {
            return $this->descricaoMercadoria;
        }

        //Peso
        public function setPeso($pesoMercadoria)
        {
            $this->pesoMercadoria = trim($pesoMercadoria);
        }

        public function getPeso()
        {
            return $this->pesoMercadoria;
        }

        //Id Cotacao
        public function setObjCarga($objCarga)
        {
            $this->objCarga = trim($objCarga);
        }

        public function getObjCarga()
        {
            if($this->objCarga == null)
            {
                $this->objCarga = new Carga();
            }
            return $this->objCarga;
        }

        //Valor
        public function getValorMercadoria()
        {
            return $this->valorMercadoria;
        }

        public function setValorMercadoria($valorMercadoria)
        {
            $this->valorMercadoria = trim($valorMercadoria);
        }

        //Qunatidade
        public function getQuantidade()
        {
            return $this->quantidade;
        }

        public function setQuantidade($quantidade)
        {
            $this->quantidade = trim($quantidade);
        }
    }

?>
