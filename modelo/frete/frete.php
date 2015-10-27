<?php
  class Frete {

  //Atributos
  private $codFrete;    
  private $codVeiculo;
  private $codMotorista;
  private $origem;  
  private $destino;  
    
  private $statusFrete; 
  private $codTransp;

  //Id Usuário     
  public function setCodFrete($codFrete) {
    $this->codFrete = trim($codFrete);
  }
    
  public function getCodFrete() {
    return $this->codFrete;
  }

  // GET/SET
  public function setCodVeiculo($codVeiculo) {
       $this->codVeiculo = trim($codVeiculo);
  }

  public function getCodVeiculo() {     
    if($this->codVeiculo == null){
      $this->codVeiculo = new Veiculo();
    }   
    return $this->codVeiculo;
  }

  // GET/SET
  public function setCodMotorista($codMotorista) {
       $this->codMotorista = trim($codMotorista);
  }

  public function getCodMotorista() {     
    if($this->codMotorista == null){
      $this->codMotorista = new Usuario();
    }   
    return $this->codMotorista;
  }  

  // GET/SET
  public function setOrigem($origem) {
       $this->origem = trim($origem);
  }
  
  public function getOrigem() {     
    if($this->origem == null){
      $this->origem = new Cidade();
    }   
    return $this->origem;
  } 

  // GET/SET
  public function setDestino($destino) {
       $this->destino = trim($destino);
  }

  public function getDestino() {     
    if($this->destino == null){
      $this->destino = new Cidade();
    }   
    return $this->destino;
  }
//////////////////////////////////////////////////////////////////////
  // GET/SET
  public function setStatusFrete($statusFrete) {
      $this->statusFrete = trim($statusFrete);
    }
    
    public function getStatusFrete() {
      return $this->statusFrete;
    }

  // GET/SET
  public function setCodTransp($codTransp) {
      $this->codTransp = trim($codTransp);
    }
    
    public function getCodTransp() {
      return $this->codTransp;
    }

  

  }
?>