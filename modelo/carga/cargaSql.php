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
    }

     public static function alterar(Usuario $usuario) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $id = mysql_real_escape_string($usuario->getId(), $conexao); 
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
  
  	  //Update para a tabela de Usuários do banco de dados
	  $sql = "update usuarios set status='$idStatus',perfil='$idPerfil',nomeCompleto='$nomeCompleto',razaoSocial='$razaoSocial',nomeFantasia='$nomeFantasia',tipoEmpresa='$tipoEmpresa',rg='$rg',orgaoExpedidor='$orgaoExpedidor',cpf='$cpf',cnpj='$cnpj',email='$email',telefone1='$telefone1',telefone2='$telefone2',logradouro='$logradouro',bairro='$bairro',numero='$numero',complemento='$complemento',estado='$estado',cidade='$cidade',cep='$cep',login='$login',senha='$senha'  where id=$id";
      
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);
    }

    public static function deletar(Usuario $usuario) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $id = mysql_real_escape_string($usuario->getId(), $conexao);

  	  //Delet para a tabela de Usuários do banco de dados
	  $sql = "delete from usuarios where id=$id";
      echo($sql);
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);

    }*/
	
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
  }
?>
