<?php
  require_once("/../banco.php");  
  require_once("carga.php");  

 class CargaSql {  
  
     /*public static function adicionar(Carga $carga) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $idPerfil = mysql_real_escape_string($usuario->getPerfil(), $conexao);      
	  $idStatus = mysql_real_escape_string($usuario->getStatus(), $conexao);      
	  $nomeCompleto = mysql_real_escape_string($usuario->getNomeCompleto(), $conexao);      
	  $razaoSocial = mysql_real_escape_string($usuario->getRazaoSocial(), $conexao);      
	  $nomeFantasia = mysql_real_escape_string($usuario->getnomeFantasia(), $conexao);      
	  $tipoEmpresa = mysql_real_escape_string($usuario->getTipoEmpresa(), $conexao);     
	  $rg = mysql_real_escape_string($usuario->getRg(), $conexao);      
	  $orgaoExpedidor = mysql_real_escape_string($usuario->getOrgaoExpedidor(), $conexao);
	  $cpf = mysql_real_escape_string($usuario->getCpf(), $conexao);
	  $cnpj = mysql_real_escape_string($usuario->getCnpj(), $conexao);

	  $email = mysql_real_escape_string($usuario->getEmail(), $conexao);      
	  $telefone1 = mysql_real_escape_string($usuario->getTelefone1(), $conexao);     
	  $telefone2 = mysql_real_escape_string($usuario->getTelefone2(), $conexao); 

	  $logradouro = mysql_real_escape_string($usuario->getLogradouro(), $conexao);     
	  $bairro = mysql_real_escape_string($usuario->getBairro(), $conexao);
	  $numero = mysql_real_escape_string($usuario->getNumero(), $conexao);
	  $complemento = mysql_real_escape_string($usuario->getComplemento(), $conexao);
	  $cep = mysql_real_escape_string($usuario->getCep(), $conexao);  
	  $estado = mysql_real_escape_string($usuario->getEstado(), $conexao); 
	  $cidade = mysql_real_escape_string($usuario->getCidade(), $conexao); 
	  //$codCidade = mysql_real_escape_string($usuario->getCodCidade(), $conexao);

	  //Login e senha do usuário    
	  $login = mysql_real_escape_string($usuario->getLogin(), $conexao);     
	  $senha = mysql_real_escape_string($usuario->getSenha(), $conexao);    
  
  	  //Insert para a tabela de Usuários do banco de dados
	  $sql = "insert into usuarios (status ,perfil, nomeCompleto, razaoSocial, nomeFantasia, tipoEmpresa, rg, orgaoExpedidor, cpf, cnpj, email, telefone1, telefone2, logradouro, bairro, numero, complemento, cep, estado, cidade, login, senha) values ('$idStatus', '$idPerfil', '$nomeCompleto', '$razaoSocial', '$nomeFantasia', '$tipoEmpresa', '$rg', '$orgaoExpedidor', '$cpf','$cnpj', '$email', '$telefone1', '$telefone2', '$logradouro', '$bairro', '$numero', '$complemento', '$cep','$estado', '$cidade', '$login', '$senha')";	  
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);
    }*/

     public static function alterarCargaCliente(Carga $carga) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $codCarga = mysql_real_escape_string($carga->getCodCarga(), $conexao); 
	  $statusCarga = mysql_real_escape_string($carga->getStatusCarga(), $conexao);
	  $coletada = mysql_real_escape_string($carga->getColetada(), $conexao); 

   
  	  //Update para a tabela de Usuários do banco de dados
	  $sql = "update cargas set statusCarga='$statusCarga',coletada='$coletada'  where codCarga=$codCarga";

	  $sqlDois = "insert into coleta (codCarga,codMotorista,codVeiculo) values(1,2,1)";
      //echo($sql);
      $resultado = @mysql_query($sql, $conexao);
      
      //Cria o registro de Coleta Automatica
      mysql_query($sqlDois, $conexao);

      return ($resultado === true);
    }

    public static function alterarCargaAtendente(Carga $carga) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $codCarga = mysql_real_escape_string($carga->getCodCarga(), $conexao); 
	  $statusCarga = mysql_real_escape_string($carga->getStatusCarga(), $conexao);
	  $frete = mysql_real_escape_string($carga->getFrete(), $conexao);
	  $distancia = mysql_real_escape_string($carga->getDistancia(), $conexao);
	  $prazo = mysql_real_escape_string($carga->getPrazo(), $conexao);
   
  	  //Update para a tabela de Usuários do banco de dados
	  $sql = "update cargas set statusCarga='$statusCarga',prazo='$prazo',distancia=$distancia,frete=$frete  where codCarga=$codCarga";
      echo($sql);
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);
    }

	
    public static function carregarLista(Carga $carga) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select * from cargas';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$carga = new Carga();
				$carga->setCodCarga($row["codCarga"]);

				$carga->setAltura($row["altura"]);
				$carga->setLargura($row["largura"]);
				$carga->setPeso($row["peso"]);
				$carga->setComprimento($row["comprimento"]);
				$carga->setQuantidade($row["quantidade"]);
				$carga->setValor($row["valor"]);

				$carga->setTelefone($row["telefone"]);
				$carga->setLogradouro($row["logradouro"]);
				$carga->setBairro($row["bairro"]);
				$carga->setUf($row["uf"]);
				$carga->setCidade($row["cidade"]);
				$carga->setNumero($row["numero"]);
				$carga->setObservacao($row["observacao"]);

				$carga->setNaturezaCarga($row["naturezaCarga"]);
				$carga->setDataPedido($row["dataPedido"]);
				$carga->setDistancia($row["distancia"]);
				$carga->setPrazo($row["prazo"]);
				$carga->setFrete($row["frete"]);

				$carga->setColetada($row["coletada"]);
				$carga->setStatusCarga($row["statusCarga"]);
				
				$retorno[] = $carga;
         }
        return ($retorno);
      } 
      else
        return null;
    }

    public static function carregarListaAtendimento(Carga $carga) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select * from cargas where statusCarga = "Atendimento"';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$carga = new Carga();
				$carga->setCodCarga($row["codCarga"]);

				$carga->setAltura($row["altura"]);
				$carga->setLargura($row["largura"]);
				$carga->setPeso($row["peso"]);
				$carga->setComprimento($row["comprimento"]);
				$carga->setQuantidade($row["quantidade"]);
				$carga->setValor($row["valor"]);

				$carga->setTelefone($row["telefone"]);
				$carga->setLogradouro($row["logradouro"]);
				$carga->setBairro($row["bairro"]);
				$carga->setUf($row["uf"]);
				$carga->setCidade($row["cidade"]);
				$carga->setNumero($row["numero"]);
				$carga->setObservacao($row["observacao"]);

				$carga->setNaturezaCarga($row["naturezaCarga"]);
				$carga->setDataPedido($row["dataPedido"]);
				$carga->setDistancia($row["distancia"]);
				$carga->setPrazo($row["prazo"]);
				$carga->setFrete($row["frete"]);

				$carga->setColetada($row["coletada"]);
				$carga->setStatusCarga($row["statusCarga"]);
				
				$retorno[] = $carga;
         }
        return ($retorno);
      } 
      else
        return null;
    }

    public static function carregarListaAprovados(Carga $carga) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select * from cargas where statusCarga = "Aprovado Atendente"';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$carga = new Carga();
				$carga->setCodCarga($row["codCarga"]);

				$carga->setAltura($row["altura"]);
				$carga->setLargura($row["largura"]);
				$carga->setPeso($row["peso"]);
				$carga->setComprimento($row["comprimento"]);
				$carga->setQuantidade($row["quantidade"]);
				$carga->setValor($row["valor"]);

				$carga->setTelefone($row["telefone"]);
				$carga->setLogradouro($row["logradouro"]);
				$carga->setBairro($row["bairro"]);
				$carga->setUf($row["uf"]);
				$carga->setCidade($row["cidade"]);
				$carga->setNumero($row["numero"]);
				$carga->setObservacao($row["observacao"]);

				$carga->setNaturezaCarga($row["naturezaCarga"]);
				$carga->setDataPedido($row["dataPedido"]);
				$carga->setDistancia($row["distancia"]);
				$carga->setPrazo($row["prazo"]);
				$carga->setFrete($row["frete"]);

				$carga->setColetada($row["coletada"]);
				$carga->setStatusCarga($row["statusCarga"]);
				
				$retorno[] = $carga;
         }
        return ($retorno);
      } 
      else
        return null;
    }

            public static function carregarListaConcluidos(Carga $carga) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select * from cargas where statusCarga = "Aprovado Cliente"';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$carga = new Carga();
				$carga->setCodCarga($row["codCarga"]);

				$carga->setAltura($row["altura"]);
				$carga->setLargura($row["largura"]);
				$carga->setPeso($row["peso"]);
				$carga->setComprimento($row["comprimento"]);
				$carga->setQuantidade($row["quantidade"]);
				$carga->setValor($row["valor"]);

				$carga->setTelefone($row["telefone"]);
				$carga->setLogradouro($row["logradouro"]);
				$carga->setBairro($row["bairro"]);
				$carga->setUf($row["uf"]);
				$carga->setCidade($row["cidade"]);
				$carga->setNumero($row["numero"]);
				$carga->setObservacao($row["observacao"]);

				$carga->setNaturezaCarga($row["naturezaCarga"]);
				$carga->setDataPedido($row["dataPedido"]);
				$carga->setDistancia($row["distancia"]);
				$carga->setPrazo($row["prazo"]);
				$carga->setFrete($row["frete"]);

				$carga->setColetada($row["coletada"]);
				$carga->setStatusCarga($row["statusCarga"]);
				
				$retorno[] = $carga;
         }
        return ($retorno);
      } 
      else
        return null;
    }
  }
?>
