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
	  $codCidade = mysql_real_escape_string($usuario->getCodCidade(), $conexao);

	  //Login e senha do usuário    
	  $login = mysql_real_escape_string($usuario->getLogin(), $conexao);     
	  $senha = mysql_real_escape_string($usuario->getSenha(), $conexao);    
  
  	  //Insert para a tabela de Usuários do banco de dados
	  $sql = "insert into usuarios (idStatus ,idPerfil, nomeCompleto, razaoSocial, nomeFantasia, tipoEmpresa, rg, orgaoExpedidor, cpf, cnpj, email, telefone1, telefone2, logradouro, bairro, numero, complemento, cep, codCidade, login, senha) values ($idStatus, $idPerfil, '$nomeCompleto', '$razaoSocial', '$nomeFantasia', '$tipoEmpresa', '$rg', '$orgaoExpedidor', '$cpf','$cnpj', '$email', '$telefone1', '$telefone2', '$logradouro', '$bairro', '$numero', '$complemento', '$cep',$codCidade, '$login', '$senha')";	  
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
	  $codCidade = mysql_real_escape_string($usuario->getCodCidade(), $conexao);

	  //Login e senha do usuário    
	  $login = mysql_real_escape_string($usuario->getLogin(), $conexao);     
	  $senha = mysql_real_escape_string($usuario->getSenha(), $conexao);    
  
  	  //Update para a tabela de Usuários do banco de dados
	  $sql = "update usuarios set idStatus=$idStatus,idPerfil=$idPerfil,nomeCompleto='$nomeCompleto',razaoSocial='$razaoSocial',nomeFantasia='$nomeFantasia',tipoEmpresa='$tipoEmpresa',rg='$rg',orgaoExpedidor='$orgaoExpedidor',cpf='$cpf',cnpj='$cnpj',email='$email',telefone1='$telefone1',telefone2='$telefone2',logradouro='$logradouro',bairro='$bairro',numero='$numero',complemento='$complemento',codCidade=$codCidade,cep='$cep',login='$login',senha='$senha'  where id=$id";
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

		$rs = mysql_query('select * from usuarios');
		$result = array();
		while($row = mysql_fetch_object($rs)){
			array_push($result, $row);
		}
		echo json_encode($result);
    }

  }
?>
