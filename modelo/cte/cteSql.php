<?php
  require_once("/../banco.php");  
  require_once("cte.php");  

 class UsuarioSql {  
  
     public static function adicionar(Usuario $usuario) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $idPerfil = mysql_real_escape_string($cte->getPerfil(), $conexao);      
	  $idStatus = mysql_real_escape_string($cte->getStatus(), $conexao);      
	  $nomeCompleto = mysql_real_escape_string($cte->getNomeCompleto(), $conexao);      
	  $razaoSocial = mysql_real_escape_string($cte->getRazaoSocial(), $conexao);      
	  $nomeFantasia = mysql_real_escape_string($cte->getnomeFantasia(), $conexao);      
	  $tipoEmpresa = mysql_real_escape_string($cte->getTipoEmpresa(), $conexao);     
	  $rg = mysql_real_escape_string($usuario->cte(), $conexao);      
	     
  
  	  //Insert para a tabela de Usuários do banco de dados
	  $sql = "insert into cte (idStatus ,idPerfil, nomeCompleto, razaoSocial, nomeFantasia, tipoEmpresa, rg, orgaoExpedidor, cpf, cnpj, email, telefone1, telefone2, logradouro, bairro, numero, complemento, cep, codCidade, login, senha) values ($idStatus, $idPerfil, '$nomeCompleto', '$razaoSocial', '$nomeFantasia', '$tipoEmpresa', '$rg', '$orgaoExpedidor', '$cpf','$cnpj', '$email', '$telefone1', '$telefone2', '$logradouro', '$bairro', '$numero', '$complemento', '$cep',$codCidade, '$login', '$senha')";	  
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);
    }

     public static function alterar(Cte $cte) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $id = mysql_real_escape_string($cte->getId(), $conexao); 
	  $idPerfil = mysql_real_escape_string($cte->getPerfil(), $conexao);      
	  $idStatus = mysql_real_escape_string($cte->getStatus(), $conexao);      
	  $nomeCompleto = mysql_real_escape_string($cte->getNomeCompleto(), $conexao);      
	  $razaoSocial = mysql_real_escape_string($cte->getRazaoSocial(), $conexao);      
	  $nomeFantasia = mysql_real_escape_string($cte->getnomeFantasia(), $conexao);      
	  $tipoEmpresa = mysql_real_escape_string($cte->getTipoEmpresa(), $conexao);     
	 
  
  	  //Update para a tabela de Usuários do banco de dados
	  $sql = "update cte set idStatus=$idStatus,idPerfil=$idPerfil,nomeCompleto='$nomeCompleto',razaoSocial='$razaoSocial',nomeFantasia='$nomeFantasia',tipoEmpresa='$tipoEmpresa',rg='$rg',orgaoExpedidor='$orgaoExpedidor',cpf='$cpf',cnpj='$cnpj',email='$email',telefone1='$telefone1',telefone2='$telefone2',logradouro='$logradouro',bairro='$bairro',numero='$numero',complemento='$complemento',codCidade=$codCidade,cep='$cep',login='$login',senha='$senha'  where id=$id";
      echo($sql);
      
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);
    }

    public static function deletar(Cte $cte) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $id = mysql_real_escape_string($cte->getId(), $conexao);

  	  //Delet para a tabela de Usuários do banco de dados
	  $sql = "delete from cte where id=$id";
      
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);

    }
	
    public static function carregarLista() {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     

		$rs = mysql_query('select * from cte');
		$result = array();
		while($row = mysql_fetch_object($rs)){
			array_push($result, $row);
		}
		echo json_encode($result);
    }

  }
?>
