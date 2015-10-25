<?php
	require_once("/../usuario/usuario.php");  
	require_once("/../cotacao/cotacao.php");  
	require_once("/../veiculo/veiculo.php");  
	
  class Coleta {
    private $id;  
    private $codCarga;
	private $codMotorista;  	
	private $codVeiculo;  
	private $data;   
	private $hora;   
	private $statusCarga;  	
	private $telefone;  	 
	private $logradouro;   
	private $bairro; 
	private $numero;   
	private $estado;  	
	private $cidade;
	private $observacao;  	  	
            
    public function setId($l) {
      $this->id = trim($l);
    }
    
    public function getId() {
      return $this->id;
    }	


    public function setCodCarga($codCarga) {
		   $this->codCarga = trim($codCarga);
	}
	
	public function CodCarga() {     //da uma olhada depois
		if($this->codCarga == null){
			$this->codCarga = new Cotacao();
		}		
		return $this->codCarga;
	}

    public function setCodMotorista($codMotorista) {
		   $this->codMotorista = trim($codMotorista);
	}
	
	public function CodMotorista() {     //da uma olhada depois
		if($this->codMotorista == null){
			$this->codMotorista = new Usuario();
		}		
		return $this->codMotorista;
	}

	 public function setCodVeiculo($codVeiculo) {
		   $this->codVeiculo = trim($codVeiculo);
	}
	
	public function CodVeiculo() {     //da uma olhada depois
		if($this->codVeiculo == null){
			$this->codVeiculo = new Veiculo();
		}		
		return $this->codVeiculo;
	}

	public function setData($data) {
      $this->data = trim($data);
    }
    
    public function getData() {
      return $this->data;
    }	

    public function setHora($hora) {
      $this->hora = trim($hora);
    }
    
    public function getHora() {
      return $this->hora;
    }	

    public function setStatusCarga($statusCarga) {
      $this->statusCarga = trim($statusCarga);
    }
    
    public function getStatusCarga() {
      return $this->statusCarga;
    }	

    public function setTelefone($telefone) {
      $this->telefone = trim($telefone);
    }
    
    public function getTelefone() {
      return $this->telefone;
    }	

    public function setLogradouro($logradouro) {
      $this->logradouro = trim($logradouro);
    }
    
    public function getLogradouro() {
      return $this->logradouro;
    }

    public function setBairro($bairro) {
      $this->bairro = trim($bairro);
    }
    
    public function getBairro() {
      return $this->bairro;
    }

    public function setNumero($numero) {
      $this->numero = trim($numero);
    }
    
    public function getNumero() {
      return $this->numero;
    }

    public function setEstado($estado) {
      $this->estado = trim($estado);
    }
    
    public function getEstado() {
      return $this->estado;
    }

    public function setCidade($cidade) {
      $this->cidade = trim($cidade);
    }
    
    public function getCidade() {
      return $this->cidade;
    }

    public function setObservacao($observacao) {
      $this->observacao = trim($observacao);
    }
    
    public function getObservacao() {
      return $this->observacao;
    }

	/*
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
	*/  
  }
?>