<?php
  require_once("/../banco.php");  
  require_once("carga.php");  

 class CargaSql {  
  

     public static function alterarCargaCliente(Carga $carga) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $codCarga = mysql_real_escape_string($carga->getCodCarga(), $conexao); 
	  $statusCarga = mysql_real_escape_string($carga->getStatusCarga(), $conexao);
	  $coletada = mysql_real_escape_string($carga->getColetada(), $conexao); 

   
  	  //Update para a tabela de Usuários do banco de dados
	  $sql = "update cargas set statusCarga='$statusCarga',coletada='$coletada' where codCarga=$codCarga";

	  $sqlDois = "insert into coleta (codCarga,codMotorista,codVeiculo) values($codCarga,2,1)";
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
	  $sql = "update cargas set statusCarga='$statusCarga',prazo='$prazo',distancia=$distancia,frete=$frete where codCarga=$codCarga";
      echo($sql);
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);
    }

	
    public static function carregarLista(Carga $carga) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select cg.*,
cidOrigem.descricao as origem,cidDestino.descricao as destino,
clientePF.nomeCompleto as pessoaFisicaNome,clientePJ.razaoSocial as pessoaJuridicaNome 
from cargas as cg
INNER JOIN usuarios as clientePF ON cg.codUsuario = clientePF.id
INNER JOIN usuarios as clientePJ ON cg.codUsuario = clientePJ.id
INNER JOIN cidades as cidOrigem ON cg.origem = cidOrigem.codigo
INNER JOIN cidades as cidDestino ON cg.destino = cidDestino.codigo;';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$carga = new Carga();
				$carga->setCodCarga($row["codCarga"]);

				$carga->setObjCidadeOrigem($row["origem"]);
				$carga->setObjCidadeDestino($row["destino"]);

				$carga->setPessoaFisicaNome($row["pessoaFisicaNome"]);
				$carga->setPessoaJuridicaNome($row["pessoaJuridicaNome"]);

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
		
$sql = 'select cg.*,
cidOrigem.descricao as origem,cidDestino.descricao as destino,
clientePF.nomeCompleto as pessoaFisicaNome,clientePJ.razaoSocial as pessoaJuridicaNome 
from cargas as cg
INNER JOIN usuarios as clientePF ON cg.codUsuario = clientePF.id
INNER JOIN usuarios as clientePJ ON cg.codUsuario = clientePJ.id
INNER JOIN cidades as cidOrigem ON cg.origem = cidOrigem.codigo
INNER JOIN cidades as cidDestino ON cg.destino = cidDestino.codigo
where statusCarga = "Atendimento"';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$carga = new Carga();
				$carga->setCodCarga($row["codCarga"]);

				$carga->setObjCidadeOrigem($row["origem"]);
				$carga->setObjCidadeDestino($row["destino"]);

				$carga->setPessoaFisicaNome($row["pessoaFisicaNome"]);
				$carga->setPessoaJuridicaNome($row["pessoaJuridicaNome"]);

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
		
		$sql = 'select cg.*,
cidOrigem.descricao as origem,cidDestino.descricao as destino,
clientePF.nomeCompleto as pessoaFisicaNome,clientePJ.razaoSocial as pessoaJuridicaNome 
from cargas as cg
INNER JOIN usuarios as clientePF ON cg.codUsuario = clientePF.id
INNER JOIN usuarios as clientePJ ON cg.codUsuario = clientePJ.id
INNER JOIN cidades as cidOrigem ON cg.origem = cidOrigem.codigo
INNER JOIN cidades as cidDestino ON cg.destino = cidDestino.codigo
where statusCarga = "Aprovado Atendente"';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$carga = new Carga();
				$carga->setCodCarga($row["codCarga"]);

				$carga->setObjCidadeOrigem($row["origem"]);
				$carga->setObjCidadeDestino($row["destino"]);

				$carga->setPessoaFisicaNome($row["pessoaFisicaNome"]);
				$carga->setPessoaJuridicaNome($row["pessoaJuridicaNome"]);

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
		
		$sql = 'select cg.*,
cidOrigem.descricao as origem,cidDestino.descricao as destino,
clientePF.nomeCompleto as pessoaFisicaNome,clientePJ.razaoSocial as pessoaJuridicaNome 
from cargas as cg
INNER JOIN usuarios as clientePF ON cg.codUsuario = clientePF.id
INNER JOIN usuarios as clientePJ ON cg.codUsuario = clientePJ.id
INNER JOIN cidades as cidOrigem ON cg.origem = cidOrigem.codigo
INNER JOIN cidades as cidDestino ON cg.destino = cidDestino.codigo 
where statusCarga = "Aprovado Cliente"';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$carga = new Carga();
				$carga->setCodCarga($row["codCarga"]);

				$carga->setObjCidadeOrigem($row["origem"]);
				$carga->setObjCidadeDestino($row["destino"]);

				$carga->setPessoaFisicaNome($row["pessoaFisicaNome"]);
				$carga->setPessoaJuridicaNome($row["pessoaJuridicaNome"]);

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
