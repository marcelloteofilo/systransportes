<?php
  require_once("/../usuario/usuario.php");  
  require_once("/../cidade/cidade.php");  
  
  class Cotacao {
	private $id;    
	private $objUsuario;  	
	private $objCidadeOrigem;  	
	private $objCidadeDestino;  	
	private $valorCarga;  
	private $valorFrete;  
	private $altura;  
	private $largura;  
	private $peso;  
	private $comprimento;  	
	private $quantidadeCaixas;  	
	private $prazo;
	private $distancia;
	private $descricao;
	private $aprovadoCliente;
	private $aprovadoAtendente;
	private $status;
        
    public function setId($l) {
      $this->id = trim($l);
    }
    
    public function getId() {
      return $this->id;
    }	
	
	public function setObjUsuario($objUsuario) {
		   $this->objUsuario = trim($objUsuario);
	}
	
	public function getObjUsuario() {     
		if($this->objUsuario == null){
			$this->objUsuario = new Usuario();
		}		
		return $this->objUsuario;
	}	
	
	
	public function setObjCidadeOrigem($objCidadeOrigem) {
		   $this->objCidadeOrigem = trim($objCidadeOrigem);
	}
	
	public function getObjCidadeOrigem() {     
		if($this->objCidadeOrigem == null){
			$this->objCidadeOrigem = new Cidade();
		}		
		return $this->objCidadeOrigem;
	}	
	
	public function setObjCidadeDestino($objCidadeDestino) {
		   $this->objCidadeDestino = trim($objCidadeDestino);
	}

	public function getObjCidadeDestino() {     
		if($this->objCidadeDestino == null){
			$this->objCidadeDestino = new Cidade();
		}		
		return $this->objCidadeDestino;
	}	
	
	
	public function setValorCarga($l) {
      $this->valorCarga = trim($l);
    }
    
    public function getValorCarga() {
      return $this->valorCarga;
    }	
	
	public function setValorFrete($l) {
      $this->valorFrete = trim($l);
    }
    
    public function getValorFrete() {
      return $this->valorFrete;
    }	
	
	public function setAltura($l) {
      $this->altura = trim($l);
    }
    
    public function getAltura() {
      return $this->altura;
    }	
	
	public function setLargura($l) {
      $this->largura = trim($l);
    }
    
    public function getLargura() {
      return $this->largura;
    }	
	
	public function setPeso($l) {
      $this->peso = trim($l);
    }
    
    public function getPeso() {
      return $this->peso;
    }	
	
	public function setComprimento($l) {
      $this->comprimento = trim($l);
    }
    
    public function getComprimento() {
      return $this->comprimento;
    }	
	
	public function setQuantidadeCaixas($l) {
      $this->quantidadeCaixas = trim($l);
    }
    
    public function getQuantidadeCaixas() {
      return $this->quantidadeCaixas;
    }	
	
	public function setPrazo($l) {
      $this->prazo = trim($l);
    }
    
    public function getPrazo() {
      return $this->prazo;
    }	
	
	public function setDistancia($l) {
      $this->distancia = trim($l);
    }
    
    public function getDistancia() {
      return $this->distancia;
    }	
	
	public function setDescricao($l) {
      $this->descricao = trim($l);
    }
    
    public function getDescricao() {
      return $this->descricao;
    }	
		
	public function setAprovadoCliente($l) {
      $this->aprovadoCliente = trim($l);
    }
    
    public function getAprovadoCLiente() {
      return $this->aprovadoCliente;
    }	
	
	public function setAprovadoAtendente($l) {
      $this->aprovadoAtendente = trim($l);
    }
    
    public function getAprovadoAtendente() {
      return $this->aprovadoAtendente;
    }	
	
	public function setStatus($l) {
      $this->status = trim($l);
    }
    
    public function getStatus() {
      return $this->status;
    }		
	
  }
?>