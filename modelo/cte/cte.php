<?php
  class Cte {

  //Atributos
  private $id;    
  private $idUsuario;
  private $idVeiculo;
  private $cotacao;
  private $manifesto;
  private $faturamento;
  private $emissao;
  private $status;
  private $dataEntrega;
  private $horaEntrega;
   
      
  public function setId($l) {
    $this->id = trim($l);
  }
    
  public function getId() {
    return $this->id;
  }
   public function setUsuario($usuario) {
       $this->usuario = trim($usuario);
  }
  
  public function getUsuario() {     
    if($this->usuario == null){
      $this->usuario = new Usuario();
    }   
    return $this->usuario;
  } 
  public function setVeiculo($veiculo) {
       $this->veiculo = trim($veiculo);
  }
  
  public function getVeiculo() {     
    if($this->veiculo == null){
      $this->veiculo = new Veiculo();
    }   
    return $this->veiculo;
  } 

  public function setCotacao($cotacao) {
       $this->cotacao = trim($cotacao);
  }
  
  public function getCotacao() {     
    if($this->cotacao == null){
      $this->cotacao = new Cotacao();
    }   
    return $this->cotacao;
  } 

  public function setManifesto($manifesto) {
       $this->manifesto = trim($manifesto);
  }
  
  public function getManifesto() {     
    if($this->manifesto == null){
      $this->manifesto = new Manifesto();
    }   
    return $this->manifesto;
  } 

  public function setFaturamento($faturamento) {
       $this->faturamento = trim($faturamento);
  }
  
  public function getFaturamento() {     
    if($this->faturamento == null){
      $this->faturamento = new Manifesto();
    }   
    return $this->faturamento;
  } 
  public function setEmissao($emissao) {
    $this->id = trim($emissao);
  }
    
  public function getEmissao() {
    return $this->emissao;
  }

  public function setStatus($status) {
    $this->id = trim($status);
  }
    
  public function getStatus() {
    return $this->status;
  }

	public function setDataEntrega($dataEntrega) {
    $this->id = trim($dataEntrega);
  }
    
  public function getDataEntrega() {
    return $this->dataEntrega;
  }

  public function setHoraEntrega($horaEntrega) {
    $this->id = trim($horaEntrega);
  }
    
  public function getHoraEntrega() {
    return $this->horaEntrega;
  }	

  }

?>