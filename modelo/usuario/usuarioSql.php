<?php
  require_once("/../banco.php");  
  require_once("usuario.php");  

 class UsuarioSql {  
  
     public static function adicionar(Usuario $usuario) {
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
	  $sql = "insert into usuarios (idStatus ,idPerfil, nomeCompleto, razaoSocial, nomeFantasia, tipoEmpresa, rg, orgaoExpedidor, cpf, cnpj, email, telefone1, telefone2, logradouro, bairro, numero, complemento, cep, estado, cidade, login, senha) values ($idStatus, $idPerfil, '$nomeCompleto', '$razaoSocial', '$nomeFantasia', '$tipoEmpresa', '$rg', '$orgaoExpedidor', '$cpf','$cnpj', '$email', '$telefone1', '$telefone2', '$logradouro', '$bairro', '$numero', '$complemento', '$cep','$estado', '$cidade', '$login', '$senha')";	  
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
	  $sql = "update usuarios set idStatus=$idStatus,idPerfil=$idPerfil,nomeCompleto='$nomeCompleto',razaoSocial='$razaoSocial',nomeFantasia='$nomeFantasia',tipoEmpresa='$tipoEmpresa',rg='$rg',orgaoExpedidor='$orgaoExpedidor',cpf='$cpf',cnpj='$cnpj',email='$email',telefone1='$telefone1',telefone2='$telefone2',logradouro='$logradouro',bairro='$bairro',numero='$numero',complemento='$complemento',estado='$estado',cidade='$cidade',cep='$cep',login='$login',senha='$senha'  where id=$id";
      echo($sql);
      
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
      
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);

    }
	
    public static function carregarLista() {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 

		/*$rs = mysql_query('select * from usuarios');
		$result = array();
		while($row = mysql_fetch_object($rs)){
			array_push($result, $row);
		}

		echo json_encode($result);
		*/

		//$rs = mysql_query('select * from usuarios');
		$rs = mysql_query('select usuarios.id, usuarioperfil.descricao as perfilstatus, usuariostatus.descricao as statususuario, usuariostatus.descricao as status,
		 usuarioperfil.descricao,  usuarios.estado, usuarios.cidade,
		 usuarios.nomeCompleto , usuarios.razaoSocial , usuarios.nomeFantasia , usuarios.tipoEmpresa , usuarios.rg , 
		 usuarios.orgaoExpedidor , usuarios.cpf , usuarios.cnpj , usuarios.email , usuarios.telefone1 , usuarios.telefone2 , 
		 usuarios.logradouro , usuarios.bairro , usuarios.numero , usuarios.complemento , usuarios.cep , 
		 usuarios.login , usuarios.senha from usuarios 
		 inner join usuarioperfil on usuarios.idPerfil = usuarioperfil.id 
		 inner join usuariostatus on usuariostatus.id = usuarios.idStatus'); 		

			$result = array();

			while($row = mysql_fetch_array($rs)){
				$usuario = new Usuario();
				$usuario->setId($row["id"]);
				$usuario->setPerfil($row["perfilstatus"]);
				$usuario->setStatus($row["statususuario"]);
				$usuario->setEstado($row["estado"]);
				$usuario->setCidade($row["cidade"]);
				$usuario->setNomeCompleto($row["nomeCompleto"]);
				$usuario->setRazaoSocial($row["razaoSocial"]);
				$usuario->setnomeFantasia($row["nomeFantasia"]);
				$usuario->setTipoEmpresa($row["tipoEmpresa"]);
				$usuario->setRg($row["rg"]);
				$usuario->setOrgaoExpedidor($row["orgaoExpedidor"]);
				$usuario->setCpf($row["cpf"]);
				$usuario->setCnpj($row["cnpj"]);
				$usuario->setEmail($row["email"]);
				$usuario->setTelefone1($row["telefone1"]);
				$usuario->setTelefone2($row["telefone2"]);
				$usuario->setLogradouro($row["logradouro"]);
				$usuario->setBairro($row["bairro"]);
				$usuario->setNumero($row["numero"]);
				$usuario->setComplemento($row["complemento"]);
				$usuario->setCep($row["cep"]);
				$usuario->setLogin($row["login"]);
				$usuario->setSenha($row["senha"]);

				$result[] = $usuario;
				//array_push($result, $objVeiculo);
			}
			return $result;

    }

  }
?>
