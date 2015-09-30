<?php
  class usuarioPerfil {
    private $id;
    private $descricao;  
        
    public function setId($id) {
      $this->id = trim($id);
    }
    
    public function getId() {
      return $this->id;
    }	
	
    public function setDescricao($descricao) {
      $this->descricao = trim($descricao);
    }

    public function getDescricao() {
      return $this->descricao;
    }
  }
?>