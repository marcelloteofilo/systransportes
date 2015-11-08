<?php

//    define("BASEPATH", dirname(dirname(dirname(__FILE__))));
//
//    require_once (BASEPATH."/funcoes.php");
    require_once (BASEPATH.MODELO."/carga/carga.php");

//    require_once("/../../modelo/carga/carga.php");

    class Mercadoria
    {
        //Atributos
        private $id;
        private $descricaoMercadoria;
        private $pesoMercadoria;
        private $objCarga;
        private $quantidade;
        private $valorMercadoria;
        private $codCarga;
        private $numPedido;
        private $nomeCompleto;
        private $telefone;
        private $email;
        private $logradouro;
        private $bairro;
        private $numero;
        private $cep;
        private $estado;
        private $cidade;

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

//////////////////////////////////////////////////////////////////////////////////////////////

        public function setCodCarga($codCarga)
        {
            $this->codCarga = trim($codCarga);
        }

        public function getCodCarga()
        {
            return $this->codCarga;
        }

        public function setNumPedido($numPedido)
        {
            $this->numPedido = trim($numPedido);
        }

        public function getNumPedido()
        {
            return $this->numPedido;
        }

        public function setNomeCompleto($nomeCompleto)
        {
            $this->nomeCompleto = trim($nomeCompleto);
        }

        public function getNomeCompleto()
        {
            return $this->nomeCompleto;
        }

        public function setTelefone($telefone)
        {
            $this->telefone = trim($telefone);
        }

        public function getTelefone()
        {
            return $this->telefone;
        }

        public function setEmail($email)
        {
            $this->email = trim($email);
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setLogradouro($logradouro)
        {
            $this->logradouro = trim($logradouro);
        }

        public function getLogradouro()
        {
            return $this->logradouro;
        }

        public function setBairro($bairro)
        {
            $this->bairro = trim($bairro);
        }

        public function getBairro()
        {
            return $this->bairro;
        }

        public function setNumero($numero)
        {
            $this->numero = trim($numero);
        }

        public function getNumero()
        {
            return $this->numero;
        }

        public function setCep($cep)
        {
            $this->cep = trim($cep);
        }

        public function getCep()
        {
            return $this->cep;
        }

        public function setEstado($estado)
        {
            $this->estado = trim($estado);
        }

        public function getEstado()
        {
            return $this->estado;
        }

        public function setCidade($cidade)
        {
            $this->cidade = trim($cidade);
        }

        public function getCidade()
        {
            return $this->cidade;
        }
    }

?>
