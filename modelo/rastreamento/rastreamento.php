<?php

//require_once("/../modelo/cotacao/cotacao.php");

class Rastreamento {

    //Atributos
    private $id;
    private $rota;

    //Id Rastreamento
    public function setId($l) {
        $this->id = trim($l);
    }

    public function getId() {
        return $this->id;
    }

    //Descricao Rastreamento
    public function setDescricaoRastreamento($rotaRastreamento) {
        $this->rotaRastreamento = trim($rotaRastreamento);
    }

    public function getDescricaoRastreamento() {
        return $this->rotaRastreamento;
    }
}

?>

