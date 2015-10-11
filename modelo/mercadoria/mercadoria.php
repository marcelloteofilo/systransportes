<?php

require_once("/../modelo/cotacao/cotacao.php");

class Mercadoria {

    //Atributos
    private $id;
    private $descricaoMercadoria;
    private $pesoMercadoria;
    private $objCotacao;

    //Id Mercadoria
    public function setId($l) {
        $this->id = trim($l);
    }

    public function getId() {
        return $this->id;
    }

    //Descricao Mercadoria
    public function setDescricaoMercadoria($descricaoMercadoria) {
        $this->descricaoMercadoria = trim($descricaoMercadoria);
    }

    public function getDescricaoMercadoria() {
        return $this->descricaoMercadoria;
    }

    //pesoMercadoria Mercadoria
    public function setPeso($pesoMercadoria) {
        $this->pesoMercadoria = trim($pesoMercadoria);
    }

    public function getPeso() {
        return $this->pesoMercadoria;
    }

    //Id Cotacao
    public function setObjCotacao($objCotacao) {
        $this->objCotacao = trim($objCotacao);
    }

    public function getObjCotacao() {
        if ($this->objCotacao == null) {
            $this->objCotacao = new Cotacao();
        }
        return $this->objCotacao;
    }

}

?>
