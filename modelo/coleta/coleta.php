<?php
	require_once("/../usuario/usuario.php");  
	require_once("/../cotacao/cotacao.php");  
	require_once("/../veiculo/veiculo.php");  
	
  class Coleta {
    private $codColeta;
	private $emissao;  	
	private $objRemetente;  	
	private $objDestinatario;  	
	private $objMotorista;  	
	private $objCotacao;  	
	private $objVeiculo;  	
	private $dataAgendada;  	
	private $horaAgendada;  	
	private $obs;  	
	private $status;  	
            
    public function setId($l) {
      $this->id = trim($l);
    }
    
    public function getId() {
      return $this->id;
    }	
           
    public function setEmissao($l) {
      $this->emissao = trim($l);
    }
    
    public function getEmissao() {
      return $this->emissao;
    }	
	
	public function setObjRemetente($objRemetente) {
		   $this->objRemetente = trim($objRemetente);
	}
	
	public function getObjRemetente() {     
		if($this->objRemetente == null){
			$this->objRemetente = new Usuario();
		}		
		return $this->objRemetente;
	}	
	
	public function setObjDestinatario($objDestinatario) {
		   $this->objDestinatario = trim($objDestinatario);
	}
	
	public function getObjDestinatario() {     
		if($this->objDestinatario == null){
			$this->objDestinatario = new Usuario();
		}		
		return $this->objDestinatario;
	}	
	
	
	public function setObjMotorista($objMotorista) {
		   $this->objMotorista = trim($objMotorista);
	}
	
	public function getObjMotorista() {     
		if($this->objMotorista == null){
			$this->objMotorista = new Usuario();
		}		
		return $this->objMotorista;
	}	
	
	
	public function setObjCotacao($objCotacao) {
		   $this->objCotacao = trim($objCotacao);
	}
	
	public function getObjCotacao() {     
		if($this->objCotacao == null){
			$this->objCotacao = new Cotacao();
		}		
		return $this->objCotacao;
	}	
	
	
	public function setObjVeiculo($objVeiculo) {
		   $this->objVeiculo = trim($objVeiculo);
	}
	
	public function getObjVeiculo() {     
		if($this->objVeiculo == null){
			$this->objVeiculo = new Veiculo();
		}		
		return $this->objVeiculo;
	}	
	
	public function setDataAgendada($l) {
      $this->dataAgendada = trim($l);
    }
    
    public function getDataAgendada() {
      return $this->dataAgendada;
    }	
	
	public function setHoraAgendada($l) {
      $this->horaAgendada = trim($l);
    }
    
    public function getHoraAgendada() {
      return $this->horaAgendada;
    }	
		
	public function setObs($l) {
      $this->obs = trim($l);
    }
    
    public function getObs() {
      return $this->obs;
    }	
	
	public function setStatus($l) {
      $this->status = trim($l);
    }
    
    public function getStatus() {
      return $this->status;
    }	
	
	

    
  }
?>